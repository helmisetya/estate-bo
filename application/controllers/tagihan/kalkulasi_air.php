<?php
defined('BASEPATH') or exit('No direct script access allowed');

class kalkulasi_air extends CI_Controller
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
        $this->load->model('tagihan/m_kalkulasi_air');
        $this->load->helper('bulan_tahun');
        $this->load->model('global_model');
    }
    public function index()
    {
        $data = [];
        $data['kalkulasi'] = $this->m_kalkulasi_air->show_all();
        $this->load->view('header');
        $this->load->view('tagihan/v_kalkulasi',$data);
        $this->load->view('footer');
    }
    public function show_one()
    {
        $data['kalkulasi'] = $this->m_kalkulasi_air->find_by_periode($_GET['periode']);

        return $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode($data));
    }
    public function edit(){
        $data=[];
        $data['status'] = 200;
        $data['msg'] = '';

        $arr_update = array(
            'sewa'=>floatval($_POST['sewa']),
            'retribusi'=>floatval($_POST['retribusi']),
            'tarif1'=>floatval($_POST['tarif1']),
            'tarif2'=>floatval($_POST['tarif2']),
            'tarif3'=>floatval($_POST['tarif3']),
            'tarif4'=>floatval($_POST['tarif4']),
            'tarif1_kubik'=>floatval($_POST['tarif1_kubik']),
            'tarif2_kubik'=>floatval($_POST['tarif2_kubik']),
            'tarif3_kubik'=>floatval($_POST['tarif3_kubik']),
            'tarif4_kubik'=>floatval($_POST['tarif4_kubik']),
            'updated_at'=>date('Y-m-d'),
            'updated_by'=>$_SESSION['username'],
            'datestamp'=>date('Y-m-d'),
        );
        $where = "periode = '" . $_POST['periode']."'";
        $edit_data = $this->global_model->update_table('mstr_kalkulasi_air',$arr_update,$where);
        if($edit_data['msg'] != ''){
            $data['status'] = 500;
            $data['msg'] = $edit_data['msg'];
        }
        // $do_validasi = $this->validasi($_POST,'edit');
        // if($do_validasi['status'] == 200){
        //     $arr_update = array(
        //         'lokasi_kav'=>$_POST['lokasi_kav'],
        //         'updated_at'=>date('Y-m-d'),
        //         'updated_by'=>$_SESSION['username'],
        //     );
        //     $edit_data = $this->global_model->update_table('mstr_lokasi_kav',$arr_update,"id = " . $_POST['id']);
        // }else{
        //     $data['status'] = $do_validasi['status'];
        //     $data['msg'] = $do_validasi['msg'];
        // }
        return $this->output
            ->set_content_type('application/json')
            ->set_status_header($data['status'])
            ->set_output(json_encode($data));
    }
}