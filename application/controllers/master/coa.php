<?php
defined('BASEPATH') or exit('No direct script access allowed');

class coa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        ini_set('max_execution_time', 0);
        if ($this->session->userdata('login_sukses') == FALSE) {
            redirect('login');
            return;
        }
        $this->load->model('master/m_coa');
        $this->load->model('global_model');
    }
    public function index()
    {
        $data = [];
        $data['coa'] = $this->m_coa->show_all('',0);
        // $data['kota'] = $this->m_kota->fetch_data(1);
        $this->load->view('header');
        $this->load->view('master/v_coa',$data);
        $this->load->view('footer');
    }
    public function fetch_coa(){
        $data = [];
        $data['coa'] = $this->m_coa->show_all('',0);
        return $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode($data));
    }
    public function fetch_coa_estate(){
        $data = [];
        $data['coa'] = $this->m_coa->show_all('',1,'');
        $data['coa_penjualan'] = $this->m_coa->show_all('',1,'penjualan');
        $data['coa_hutang'] = $this->m_coa->show_all('',1,'hutang');
        $data['coa_piutang'] = $this->m_coa->show_all('',1,'piutang');
        $data['coa_cadangan'] = $this->m_coa->show_all('',1,'cadangan');
        return $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode($data));
    }
    function validasi_save($data_post){
        $data = [];
        $data['status'] = 200;
        $data['msg'] = 'OK';

        $exist_name = $this->m_coa->find_by_coa($data_post['no_coa']);
        if(count($exist_name) > 0){
            $data['status'] = 500;
            $data['msg'] = 'No COA sudah digunakan';
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
                'no_coa'=>$_POST['no_coa'],
                'gol1'=>$_POST['gol1'],
                'gol2'=>$_POST['gol2'],
                'gol3'=>$_POST['gol3'],
                'gol4'=>$_POST['gol4'],
                'gol5'=>$_POST['gol5'],
                'nama'=>$_POST['nama'],
                'alokasi'=>$_POST['alokasi'],
                'normal'=>$_POST['normal'],
                'kode_thp'=>$_POST['kode_thp'],
                'n1'=>$_POST['n1'],
                'n2'=>$_POST['n2'],
                'n3'=>$_POST['n3'],
                'n4'=>$_POST['n4'],
                'n5'=>$_POST['n5'],
                'enable'=>isset($_POST['enable'])?1:0,
                'created_at'=>date('Y-m-d H:i:s'),
                'created_by'=>$_SESSION['username'],
                'updated_at'=>date('Y-m-d H:i:s'),
                'updated_by'=>$_SESSION['username'],
            );
            $masukkan_data = $this->global_model->insert_table('default','mstr_coa',$arr_insert);
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