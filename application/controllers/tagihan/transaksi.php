<?php
defined('BASEPATH') or exit('No direct script access allowed');

class transaksi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        ini_set('max_execution_time', 0);
        date_default_timezone_set('Asia/Jakarta');
        if ($this->session->userdata('login_sukses') == FALSE) {
            redirect('login');
            return;
        }
        // $this->load->model('master/m_supplier');
        $this->load->model('tagihan/m_tagihan_kav');
        $this->load->helper('bulan_tahun');
        $this->load->model('global_model');
    }
    public function index()
    {
        $data = [];
        // $data['supp'] = $this->m_supplier->show_all();
        $data['bulan'] = show_bulan();
        $data['tahun'] = show_tahun();
        // $data['kota'] = $this->m_kota->fetch_data(1);
        $this->load->view('header');
        $this->load->view('tagihan/transaksi/v_transaksi',$data);
        $this->load->view('footer');
    }
    public function show_data(){
        $data = [];
        $data['status'] = 200;
        $data['msg'] = 'OK';
        $bulan = $_POST['bulan'];
        $periode = $bulan.'/'.$_POST['tahun'];
        if($bulan == "all"){
            $periode = "all";
        }
        
        $dt_tagihan_kav = $this->m_tagihan_kav->search_data_home($periode,$_POST['tahun']);
        if($dt_tagihan_kav['status'] == 200){
            $data['html'] = '';
            // if(count((array)$dt_tagihan_kav['datanya'])>0){
                foreach($dt_tagihan_kav['datanya'] as $row){
                    $data['html'] .= '<tr>';
                    $data['html'] .= '<td>'.$row->no_transaksi.'<br><span class="badge badge-primary">Created By : '.$row->created_by.'</span>  <span class="badge badge-primary">Created At : '.$row->created_at.'</span></td>';
                    $data['html'] .= '<td>'.$row->kode_kavling.'</td>';
                    $data['html'] .= '<td>'.$row->periode.'</td>';
                    $data['html'] .= '<td>Rp '.number_format($row->total_tagihan,0,',','.').'</td>';
                    $data['html'] .= '<td>Rp '.number_format($row->saldo_awal,0,',','.').'</td>';
                    $data['html'] .= '<td>Rp '.number_format($row->saldo_akhir,0,',','.').'</td>';
                    $data['html'] .= '<td>';
                    $data['html'] .= '<button type="button" class="btn btn btn-info" data-notrans="' . $row->no_transaksi . '" onclick="openModalDetail(this)" data-toggle="modal" data-target=".edit-modal">Detail / Edit</button>';
                    $data['html'] .= '</td>';
                    $data['html'] .= '</tr>';
                    
                }
            // }else{
            //     $data['html'] .= '<tr>';
            //     $data['html'] .= '<td colspan="7">Data Tidak Ada</td>';
            //     $data['html'] .= '</tr>';
            // }
            
        }
        return $this->output
        ->set_content_type('application/json')
        ->set_status_header($data['status'])
        ->set_output(json_encode($data));
    }
    public function get_data_modal(){
        $data = [];
        $data['status'] = 200;
        $data['msg'] = '';

        $kav_tagihan = $this->m_tagihan_kav->kav_tagihan();
        if($kav_tagihan['status'] == 200){
            $data['kav_tagihan'] = $kav_tagihan['datanya'];
        }
        if($_GET['saldo'] == 1){
            $prev_bulan = date('n');
            $tahun = date('Y');
            if($prev_bulan == 1){
                $prev_bulan = 12;
                $tahun--;
            }else{
                $prev_bulan--;
            }
            $text_prevBulan = get_bulan_periode($prev_bulan);
            $prev_periode = $text_prevBulan . '/' . $tahun;
            $data['prev'] = $prev_periode;
            $data['last_tagihan'] = $this->m_tagihan_kav->get_tagihan($_GET['kav'],$prev_periode);
        }
        

        return $this->output
        ->set_content_type('application/json')
        ->set_status_header($data['status'])
        ->set_output(json_encode($data));
    }
    public function insert(){
        $kav_tagihan = $this->m_tagihan_kav->kav_tagihan();
        $data['kav_tagihan'] = $kav_tagihan['datanya'];
        
        $this->load->view('header');
        $this->load->view('tagihan/transaksi/v_insert',$data);
        $this->load->view('footer');
    }
    public function show_one(){
        $data['tagihan'] = $this->m_tagihan_kav->get_tagihan_by_notransaksi($_GET['no_trans']);
        return $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode($data));
    }
    function validasi_save($data_post){
        $data = [];
        $data['status'] = 200;
        $data['msg'] = '';

        if($data_post['no_kav'] == ''){
            $data['status'] = 500;
            $data['msg'] = 'Kavling tidak boleh kosong <br>';
        }
        if($data_post['tgl_bayar']==''){
            $data['status'] = 500;
            $data['msg'] .= 'Tanggal Bayar tidak boleh kosong <br>';
        }
        if($data['status'] == 200){
            $cek_double = $this->m_tagihan_kav->get_tagihan($data_post['no_kav'],$data_post['periode']);
            if(count((array)$cek_double)>0){
                $data['status'] = 500;
                $data['msg'] .= 'Kavling ini sudah melakukan tagihan, di periode terpilih <br>';
            }
        }
        return $data;
        
    }
    public function save(){
        $data=[];
        $data['status'] = 200;
        $data['msg'] = '';

        $do_validasi = $this->validasi_save($_POST);
        if($do_validasi['status'] == 200){
            $arr_insert = array(
                'no_transaksi'=>$_POST['no_transaksi'],
                'periode'=>$_POST['periode'],
                'tgl_bayar'=>date('Y-m-d',strtotime($_POST['tgl_bayar'])),
                'biaya_telp'=>floatval(str_replace('.', '', $_POST['biaya_telp'])),
                'biaya_listrik'=>floatval(str_replace('.', '', $_POST['biaya_listrik'])),
                'meteran_air_prev'=>floatval($_POST['meterain_air_prev']),
                'meteran_air_now'=>floatval($_POST['meterain_air_now']),
                'jml_pemakaian_air'=>floatval($_POST['penggunaan_air']),
                'biaya_air'=>floatval(str_replace('.', '', $_POST['biaya_air'])),
                'biaya_admin'=>floatval(str_replace('.', '', $_POST['biaya_admin'])),
                'biaya_taman'=>floatval(str_replace('.', '', $_POST['biaya_taman'])),
                'biaya_fasum'=>floatval(str_replace('.', '', $_POST['biaya_fasum'])),
                'biaya_keamanan'=>floatval(str_replace('.', '', $_POST['biaya_keamanan'])),
                'biaya_sampah'=>floatval(str_replace('.', '', $_POST['biaya_sampah'])),
                'biaya_pbb'=>floatval(str_replace('.', '', $_POST['biaya_pbb'])),
                'biaya_lain'=>floatval(str_replace('.', '', $_POST['biaya_lain'])),
                'minus'=>isset($_POST['minus'])?1:0,
                'koreksi'=>floatval(str_replace('.', '', $_POST['biaya_koreksi'])),
                'keterangan'=>$_POST['keterangan'],
                'payment_tunai'=>floatval(str_replace('.', '', $_POST['tunai'])),
                'payment_tf'=>floatval(str_replace('.', '', $_POST['tf'])),
                'total_tagihan'=>floatval(str_replace('.', '', $_POST['total'])),
                'saldo_awal'=>floatval(str_replace('.', '', $_POST['saldo_awal'])),
                'saldo_akhir'=>floatval(str_replace('.', '', $_POST['saldo_akhir'])),
                'old_kode'=>substr($_POST['no_transaksi'],7),
                'id_kav'=>$_POST['no_kav'],
                'created_at'=>date('Y-m-d H:i:s'),
                'created_by'=>$_SESSION['username'],
                'updated_at'=>date('Y-m-d H:i:s'),
                'updated_by'=>$_SESSION['username'],
            );
            $masukkan_data = $this->global_model->insert_table('default','tagihan_kavling',$arr_insert);
            $data['msg'] = 'Berhasil simpan';
            if($masukkan_data['status'] != 200){
                $data['status'] = 500;
                $data['respon_save']=$masukkan_data;
                $data['msg'] = $masukkan_data['msg'];
            }
        }else{
            $data['status'] = $do_validasi['status'];
            $data['msg'] = $do_validasi['msg'];
        }
        return $this->output
            ->set_content_type('application/json')
            ->set_status_header($data['status'])
            ->set_output(json_encode($data));
    }
}