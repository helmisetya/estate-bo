<?php
defined('BASEPATH') or exit('No direct script access allowed');

class sales extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        ini_set('max_execution_time', 0);
        if ($this->session->userdata('login_sukses') == FALSE) {
            redirect('login');
            return;
        }
        $this->load->model('master/m_sales');
        $this->load->model('master/m_coa');
        $this->load->model('global_model');
    }
    public function index()
    {
        $data = [];
        $data['supp'] = $this->m_sales->show_all();
        // $data['kota'] = $this->m_kota->fetch_data(1);
        $this->load->view('header');
        $this->load->view('master/v_sales',$data);
        $this->load->view('footer');
    }
    function validasi($data_post,$action){
        $data = [];
        $data['status'] = 200;
        $data['msg'] = '';

        if($data_post['kode'] == ''){
            $data['status'] = 500;
            $data['msg'] = 'Kode Sales tidak boleh kosong <br>';
        }
        if($data_post['nama'] == ''){
            $data['status'] = 500;
            $data['msg'] .= 'Nama Sales tidak boleh kosong <br>';
        }
        if($action == 'save'){
            $exist_name = $this->m_sales->find_by_kode($data_post['kode']);
            if(count($exist_name) > 0){
                $data['status'] = 500;
                $data['msg'] .= 'Kode Sales sudah digunakan';
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
                'kode'=>$_POST['kode'],
                'nama'=>$_POST['nama'],
                'telp'=>$_POST['kontak'],
                'alamat'=>$_POST['alamat'],
                'status'=>isset($_POST['sts'])?1:0,
                'created_at'=>date('Y-m-d H:i:s'),
                'created_by'=>$_SESSION['username'],
                'updated_at'=>date('Y-m-d H:i:s'),
                'updated_by'=>$_SESSION['username'],
            );
            $masukkan_data = $this->global_model->insert_table('default','mstr_sales',$arr_insert);
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
    public function show_one()
    {
        $data['sales'] = $this->m_sales->find_one($_GET['id']);
        
        return $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode($data));
    }
    public function edit(){
        $data=[];
        $data['status'] = 200;
        $data['msg'] = '';

        $do_validasi = $this->validasi($_POST,'edit');
        if($do_validasi['status'] == 200){
            $arr_update = array(
                'nama'=>$_POST['nama'],
                'telp'=>$_POST['kontak'],
                'alamat'=>$_POST['alamat'],
                'updated_at'=>date('Y-m-d'),
                'updated_by'=>$_SESSION['username'],
                'datestamp'=>date('Y-m-d H:i:s'),
            );
            $edit_data = $this->global_model->update_table('mstr_sales',$arr_update,"id = " . $_POST['id']);
            $data['msg'] = 'Berhasil diedit';

            if($edit_data['status'] != 200){
                $data['status'] = 500;
                $data['respon_save']=$edit_data;
                $data['msg'] = $edit_data['msg'];
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