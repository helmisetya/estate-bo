<?php
defined('BASEPATH') or exit('No direct script access allowed');

class pesentase_income extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('global_model');
    }
    
    public function move_db(){
        $data = [];
        $data['status'] = 200;
        $data['msg'] = [];

        $this->old_db = $this->load->database("old_default", true);
        $this->old_db->from('pesentase_income');
        $query1 = $this->old_db->get();
        $pesentase = $query1->result();

        foreach($pesentase as $row){
            if($row->id != ''){

                $arr_insert = array(
                    'adjustment'=>floatval($row->adjusment),
                    'dept'=>$row->dept,
                    'subdept'=>$row->subdept,
                    'periode'=>$row->periode,
                    'rapb'=>floatval($row->rapb)
                );
                $masukkan_data = $this->global_model->insert_table('default','pesentase_income',$arr_insert);

                $data['status'] = 200;
                $data['msg'][$row->id] = 'berhasil simpan';
                if($masukkan_data['status'] != 200){
                    $data['status'] = 500;
                    $data['msg'][$row->id] = $masukkan_data['msg'];
                }
            }
        }
        return $this->output
            ->set_content_type('application/json')
            ->set_status_header($data['status'])
            ->set_output(json_encode($data));
    }
}