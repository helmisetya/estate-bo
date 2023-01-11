<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mstr_sales extends CI_Controller
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
        $this->old_db->from('salesman');
        $query1 = $this->old_db->get();
        $dt_sales = $query1->result();

        foreach($dt_sales as $row){
            if($row->kode_sales != ''){
                $arr_insert = array(
                    'kode'=>$row->kode_sales,
                    'nama'=>$row->nama_sales,
                    'alamat'=>$row->alamat,
                    'telp'=>'',
                    'status'=>0,
                    'created_at'=> date('Y-m-d H:i:s'),
                    'created_by'=>'programmer',
                    'updated_at'=> date('Y-m-d H:i:s'),
                    'updated_by'=>'programmer'
                );
                $masukkan_data = $this->global_model->insert_table('default','mstr_sales',$arr_insert);

                $data['status'] = 200;
                $data['msg'][$row->kode_sales] = 'berhasil simpan';
                if($masukkan_data['status'] != 200){
                    $data['status'] = 500;
                    $data['msg'][$row->kode_sales] = $masukkan_data['msg'];
                }
                
            }
        }
        return $this->output
            ->set_content_type('application/json')
            ->set_status_header($data['status'])
            ->set_output(json_encode($data));
    }
}