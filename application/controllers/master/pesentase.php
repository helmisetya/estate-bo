<?php
defined('BASEPATH') or exit('No direct script access allowed');

class pesentase extends CI_Controller
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
        $this->load->model('master/m_pesentase');
        $this->load->model('global_model');
        
    }
    public function index()
    {
        $data = [];
        $data['pesentase'] = $this->m_pesentase->show_all();
        
        $this->load->view('header');
        $this->load->view('master/v_pesentase',$data);
        $this->load->view('footer');
    }
    function validasi_save($data_post){
        $data = [];
        $data['status'] = 200;
        $data['msg'] = '';

        //$exist_name = $this->m_lok_kav->find_by_name($data_post['lokasi_kav']);
        // if(!is_numeric(floatval($data_post['rapb']))){
        //     $data['status'] = 500;
        //     $data['msg'] = 'RAPB harus format angka';
        // }
        if($data_post['periode'] == ''){
            $data['status'] = 500;
            $data['msg'] .= 'Periode tidak boleh kosong';
        }
        if($data_post['dept'] == ''){
            $data['status'] = 500;
            $data['msg'] .= '<br> Departemen tidak boleh kosong';
        }
        // if(count($exist_name) > 0){
        //     $data['status'] = 500;
        //     $data['msg'] = 'Nama Kavling sudah digunakan';
        // }
        return $data; 
    }
    public function save(){
        $data=[];
        $data['status'] = 200;
        $data['msg'] = '';
        $do_validasi = $this->validasi_save($_POST);
        if($do_validasi['status'] == 200){
            $arr_insert = array(
                'adjusment'=>$_POST['adjust'],
                'dept'=>$_POST['dept'],
                'subdept'=>$_POST['sub_dept'],
                'periode'=>$_POST['periode'],
                'rapb'=>floatval($_POST['rapb']),
            );
            $masukkan_data = $this->global_model->insert_table('default','pesentase_income',$arr_insert);
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