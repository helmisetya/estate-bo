<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mstr_barang extends CI_Controller
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
        $this->old_db->from('barang');
        $query1 = $this->old_db->get();
        $dt_brg = $query1->result();

        foreach($dt_brg as $row){
            if($row->kode_brg != ''){
                $val_aktif = 0;
                if($row->aktif == 'Y'){
                    $val_aktif = 1;
                }
                $arr_insert = array(
                    'kode_brg'=>$row->kode_brg,
                    'gol'=>$row->gol,
                    'jenis'=>$row->jenis,
                    'nama'=>$row->nama_lkp,
                    'satuan'=>$row->satuan,
                    'coa_no'=>$row->no_coa,
                    'aktif'=>$val_aktif,
                    'baru'=>intval($row->baru),
                    'created_at'=> date('Y-m-d H:i:s'),
                    'created_by'=>'programmer',
                    'updated_at'=> date('Y-m-d H:i:s'),
                    'updated_by'=>'programmer',
                );
                $masukkan_data = $this->global_model->insert_table('default','mstr_barang',$arr_insert);

                $data['status'] = 200;
                $data['msg'][$row->kode_brg] = 'berhasil simpan';
                if($masukkan_data['status'] != 200){
                    $data['status'] = 500;
                    $data['msg'][$row->kode_brg] = $masukkan_data['msg'];
                }
                
            }
        }
        return $this->output
            ->set_content_type('application/json')
            ->set_status_header($data['status'])
            ->set_output(json_encode($data));
    }
}