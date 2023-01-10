<?php
defined('BASEPATH') or exit('No direct script access allowed');

class supplier extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        ini_set('max_execution_time', 0);
        if ($this->session->userdata('login_sukses') == FALSE) {
            redirect('login');
            return;
        }
        $this->load->model('master/m_supplier');
        $this->load->model('global_model');
    }
    public function index()
    {
        $data = [];
        $data['supp'] = $this->m_supplier->show_all();
        // $data['kota'] = $this->m_kota->fetch_data(1);
        $this->load->view('header');
        $this->load->view('master/v_supplier',$data);
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
        $data['msg'] = '';

        if($data_post['kode'] == ''){
            $data['status'] = 500;
            $data['msg'] = 'Kode Supplier tidak boleh kosong';
        }else{
            $exist_name = $this->m_supplier->find_by_kode($data_post['kode']);
            if(count($exist_name) > 0){
                $data['status'] = 500;
                $data['msg'] = 'Kode Supplier sudah digunakan';
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
                'kode_supp'=>$_POST['kode'],
                'nama'=>$_POST['nama'],
                'kontak'=>$_POST['kontak'],
                'alamat'=>$_POST['alamat'],
                'kota'=>$_POST['kota'],
                'telepon'=>$_POST['telp'],
                'coa_hutang'=>$_POST['coa_hutang'],
                'created_at'=>date('Y-m-d H:i:s'),
                'created_by'=>$_SESSION['username'],
                'updated_at'=>date('Y-m-d H:i:s'),
                'updated_by'=>$_SESSION['username'],
            );
            $masukkan_data = $this->global_model->insert_table('default','mstr_supplier',$arr_insert);
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