<?php
defined('BASEPATH') or exit('No direct script access allowed');

class transaksi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        ini_set('max_execution_time', 0);
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
            foreach($dt_tagihan_kav['datanya'] as $row){
                $data['html'] .= '<tr>';
                $data['html'] .= '<td>'.$row->no_transaksi.'<br><span class="badge badge-primary">Created By : '.$row->created_by.'</span>  <span class="badge badge-primary">Created At : '.$row->created_at.'</span></td>';
                $data['html'] .= '<td>'.$row->kode_kavling.'</td>';
                $data['html'] .= '<td>'.$row->periode.'</td>';
                $data['html'] .= '<td>Rp '.number_format($row->total_tagihan,0,',','.').'</td>';
                $data['html'] .= '<td>Rp '.number_format($row->saldo_awal,0,',','.').'</td>';
                $data['html'] .= '<td>Rp '.number_format($row->saldo_akhir,0,',','.').'</td>';
                $data['html'] .= '<td>';
                $data['html'] .= '<button type="button" class="btn btn btn-info" data-notrans="' . $row->no_transaksi . '" onclick="openModalEdit(this)" data-toggle="modal" data-target=".edit-modal">Detail / Edit</button>';
                $data['html'] .= '</td>';
                $data['html'] .= '</tr>';
                
            }
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
}