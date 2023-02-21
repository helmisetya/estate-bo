<?php
defined('BASEPATH') or exit('No direct script access allowed');

class closing extends CI_Controller
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
        $this->load->model('m_periode');
        $this->load->helper('bulan_tahun');
        $this->load->model('global_model');
    }
    public function index(){
        $data = [];
        if($_SESSION['role'] != 'Programmer' && $_SESSION['role'] != 'Admin Tagihan'){
            redirect('Akses_user');
            return;
        }
        $data['bulan'] = show_bulan();
        $data['tahun'] = show_tahun();

        $this->load->view('header');
        $this->load->view('tagihan/v_closing',$data);
        $this->load->view('footer');
    }
    function validasi($bulan,$tahun){
        $data['status'] = 200;
        $data['msg'] = '';

        $ck_periode = $this->m_periode->show_one($bulan,$tahun);
        if(count((array)$ck_periode)>0){
            if($ck_periode->is_closing_tagihan == 1){
                $data['status'] = 500;
                $data['msg'] = 'Periode Sudah di Closing';
            }
        }else{
            // $data['periode'] = $ck_periode;
            $data['status'] = 500;
            $data['msg'] = 'Periode tidak ditemukan';
        }
        return $data;
    }
    public function close(){
        $bulan = get_bulan_periode($_POST['bulan']);
        $periode = $bulan.'/'.$_POST['tahun'];
        $do_valid = $this->validasi($_POST['bulan'],$_POST['tahun']);

        
        $data['status'] = $do_valid['status'];
        $data['msg'] = $do_valid['msg'];
        if($data['status'] == 200){
            $where_update = "tahun = '".$_POST['tahun']. "' and bulan = '".$_POST['bulan']."'";
            $edit_periode = $this->global_model->update_table('mstr_periode',array('is_closing_tagihan'=>1),$where_update);
            if($edit_periode['status'] == 200){
                $data['msg'] = "Bisa update periode";
                $do_copy = $this->copy_tagihan($periode);
                $data['hasil-copy-tagihan'] = $do_copy;
            }else{
                $data['status'] = 500;
                $data['msg'] = $edit_periode['msg'];
            }
        }
        // $data['periode'] = $periode;
        return $this->output
            ->set_content_type('application/json')
            ->set_status_header($data['status'])
            ->set_output(json_encode($data));
    }
    function copy_tagihan($periode){
        $data['status'] = 200;
        $data['msg'] = '';
        $data['msg-input'] = [];

        $next_bulan = ($_POST['bulan'] == 12) ? 1 : $_POST['bulan'] + 1;
        $text_nextBulan = get_bulan_periode($next_bulan);
        $next_tahun = ($_POST['bulan'] == 12) ? $_POST['tahun'] + 1 : $_POST['tahun'];
        $next_periode = $text_nextBulan.'/'.$next_tahun;

        $prev_tagihan = $this->m_tagihan_kav->tagihan_by_periode($periode);
        
        if(count($prev_tagihan)>0){
            foreach($prev_tagihan as $row){
                $total = $row->biaya_taman+$row->biaya_fasum+$row->biaya_keamanan+$row->biaya_sampah;
                $arr_insert = array(
                    'no_transaksi'=>'INV-TG-'.$next_periode.$row->kode_kavling,
                    'periode'=>$next_periode,
                    'biaya_telp'=>0,
                    'biaya_listrik'=>0,
                    'meteran_air_prev'=>$row->meteran_air_now,
                    'meteran_air_now'=>0,
                    'jml_pemakaian_air'=>$row->meteran_air_now,
                    'biaya_admin'=>0,
                    'biaya_taman'=>$row->biaya_taman,
                    'biaya_fasum'=>$row->biaya_fasum,
                    'biaya_keamanan'=>$row->biaya_keamanan,
                    'biaya_sampah'=>$row->biaya_sampah,
                    'biaya_pbb'=>0,
                    'biaya_lain'=>0,
                    'minus'=>0,
                    'koreksi'=>0,
                    'payment_tunai'=>0,
                    'payment_tf'=>0,
                    'total_tagihan'=>$total,
                    'saldo_awal'=>$row->saldo_akhir,
                    'saldo_akhir'=>0,
                    'old_kode'=>$next_periode.$row->kode_kavling,
                    'id_kav'=>$row->id_kav,
                    'created_at'=> date('Y-m-d H:i:s'),
                    'created_by'=>'programmer',
                    'updated_at'=> date('Y-m-d H:i:s'),
                    'updated_by'=>'programmer',
                    'status'=>  0//tagihan belum dibuat
                );
                $masukkan_data = $this->global_model->insert_table('default','tagihan_kavling',$arr_insert);
                if($masukkan_data['status'] != 200){
                    // $data['status'] = 500;
                    $data['msg-input'][$row->id] = $masukkan_data['msg'];
                }
            }
        }
        return $data;
    }
}