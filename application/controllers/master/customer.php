<?php
defined('BASEPATH') or exit('No direct script access allowed');

class customer extends CI_Controller
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
        $this->load->model('master/m_customer');
        $this->load->model('global_model');
    }
    public function index()
    {
        $data = [];
        $data['cust'] = $this->m_customer->show_all();
        // $data['kota'] = $this->m_kota->fetch_data(1);
        $this->load->view('header');
        $this->load->view('master/v_customer',$data);
        $this->load->view('footer');
    }
    public function fetch_coa(){
        $data = [];
        $data['coa'] = $this->m_coa->show_all('',1);
        return $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode($data));
    }
    function validasi_save($data_post){
        $data = [];
        $data['status'] = 200;
        $data['msg'] = 'OK';

        $exist_name = $this->m_customer->find_by_kode($data_post['kode']);
        if(count($exist_name) > 0){
            $data['status'] = 500;
            $data['msg'] = 'Kode Customer sudah digunakan';
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
                'kode_cust'=>$_POST['kode'],
                'nama'=>$_POST['nama'],
                'kontak'=>$_POST['kontak'],
                'alamat'=>$_POST['alamat'],
                'kota'=>$_POST['kota'],
                'telp'=>$_POST['telp'],
                'coa_piutang'=>$_POST['coa_piutang'],
                'coa_hutang'=>$_POST['coa_hutang'],
                'created_at'=>date('Y-m-d H:i:s'),
                'created_by'=>$_SESSION['username'],
                'updated_at'=>date('Y-m-d H:i:s'),
                'updated_by'=>$_SESSION['username'],
            );
            $masukkan_data = $this->global_model->insert_table('default','mstr_customer',$arr_insert);
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