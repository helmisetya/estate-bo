<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mstr_customer extends CI_Controller
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
        $this->old_db->from('customer');
        $query1 = $this->old_db->get();
        $dt_coa = $query1->result();

        foreach($dt_coa as $row){
            if($row->kode_cust != ''){
                $arr_insert = array(
                    'kode_cust'=>$row->kode_cust,
                    'nama'=>$row->nama_cust,
                    'kontak'=>$row->kontak,
                    'alamat'=>$row->alamat,
                    'kota'=>$row->kota,
                    'telp'=>$row->telepon,
                    'fax'=>$row->fax,
                    'coa_piutang'=>$row->Coa_piutang,
                    'coa_hutang'=>$row->Coa_hutang,
                    'kode_pos'=>$row->kode_pos,
                    'created_at'=> date('Y-m-d H:i:s'),
                    'created_by'=>'programmer',
                    'updated_at'=> date('Y-m-d H:i:s'),
                    'updated_by'=>'programmer',
                );
                $masukkan_data = $this->global_model->insert_table('default','mstr_customer',$arr_insert);

                $data['status'] = 200;
                $data['msg'][$row->kode_cust] = 'berhasil simpan';
                if($masukkan_data['status'] != 200){
                    $data['status'] = 500;
                    $data['msg'][$row->kode_cust] = $masukkan_data['msg'];
                }
                
            }
        }
        return $this->output
            ->set_content_type('application/json')
            ->set_status_header($data['status'])
            ->set_output(json_encode($data));
    }
}