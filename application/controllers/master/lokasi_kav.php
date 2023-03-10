<?php
defined('BASEPATH') or exit('No direct script access allowed');

class lokasi_kav extends CI_Controller
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
        $this->load->model('master/m_lok_kav');
        // $this->load->model('master/m_kota');
        $this->load->model('global_model');
        // $this->load->model('auth');
    }
    public function index()
    {
        $data = [];
        $data['lok_kav'] = $this->m_lok_kav->show_all();
        // $data['kota'] = $this->m_kota->fetch_data(1);
        $this->load->view('header');
        $this->load->view('master/v_lokasi_kav',$data);
        $this->load->view('footer');
    }
    public function show_one()
    {
        $data['lok_kav'] = $this->m_lok_kav->find_one($_GET['id']);

        return $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode($data));
    }
    function validasi($data_post,$action){
        $data = [];
        $data['status'] = 200;
        $data['msg'] = '';

        if($data_post['lokasi_kav'] == ''){
            $data['status'] = 500;
            $data['msg'] = 'Nama Kavling tidak boleh kosong';
        }
        if($action == 'save'){
            $exist_name = $this->m_lok_kav->find_by_name($data_post['lokasi_kav']);
            if(count($exist_name) > 0){
                $data['status'] = 500;
                $data['msg'] .= 'Nama Kavling sudah digunakan';
            }
        }
        
        return $data; 
    }
    public function save(){
        $data=[];
        $data['status'] = 200;
        $data['msg'] = '';
        $do_validasi = $this->validasi($_POST,'save');
        if($do_validasi['status'] == 200){
            $arr_insert = array(
                'lokasi_kav'=>$_POST['lokasi_kav'],
                'created_at'=>date('Y-m-d H:i:s'),
                'created_by'=>$_SESSION['username'],
                'updated_at'=>date('Y-m-d H:i:s'),
                'updated_by'=>$_SESSION['username'],
            );
            $masukkan_data = $this->global_model->insert_table('default','mstr_lokasi_kav',$arr_insert);
            // $masukkan_data = $this->global_model->insert_table('tes_posgre','mstr_lokasi_kav',$arr_insert);
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
    public function edit(){
        $data=[];
        $data['status'] = 200;
        $data['msg'] = '';
        $do_validasi = $this->validasi($_POST,'edit');
        if($do_validasi['status'] == 200){
            $arr_update = array(
                'lokasi_kav'=>$_POST['lokasi_kav'],
                'updated_at'=>date('Y-m-d'),
                'updated_by'=>$_SESSION['username'],
            );
            $edit_data = $this->global_model->update_table('mstr_lokasi_kav',$arr_update,"id = " . $_POST['id']);
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