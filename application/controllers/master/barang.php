<?php
defined('BASEPATH') or exit('No direct script access allowed');

class barang extends CI_Controller
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
        $this->load->model('master/m_barang');
        $this->load->model('global_model');
        // $this->load->model('auth');
    }
    public function index()
    {
        $data = [];
        $data['barang'] = $this->m_barang->show_all();
        // $data['kota'] = $this->m_kota->fetch_data(1);
        $this->load->view('header');
        $this->load->view('master/v_barang',$data);
        $this->load->view('footer');
    }
    function validasi_save($data_post){
        $data = [];
        $data['status'] = 200;
        $data['msg'] = '';

        if($data_post['kode'] == ''){
            $data['status'] = 500;
            $data['msg'] .= 'Kode Barang tidak boleh kosong';
        }
        if($data_post['nama'] == ''){
            $data['status'] = 500;
            $data['msg'] .= '<br>Nama Barang tidak boleh kosong';
        }
        if($data['status'] == 200){
            $exist_name = $this->m_barang->find_by_kode($data_post['kode']);
            if(count($exist_name) > 0){
                $data['status'] = 500;
                $data['msg'] = '<br>Kode Barang sudah digunakan';
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
                'kode_brg'=>$_POST['kode'],
                'jenis'=>$_POST['jenis'],
                'nama'=>$_POST['nama'],
                'satuan'=>$_POST['satuan'],
                'coa_no'=>$_POST['coa'],
                'aktif'=>isset($_POST['aktif'])?1:0,
                'baru'=>isset($_POST['baru'])?1:0,
                'created_at'=>date('Y-m-d H:i:s'),
                'created_by'=>$_SESSION['username'],
                'updated_at'=>date('Y-m-d H:i:s'),
                'updated_by'=>$_SESSION['username'],
            );
            $masukkan_data = $this->global_model->insert_table('default','mstr_barang',$arr_insert);
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