<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mstr_coa extends CI_Controller
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
        $this->old_db->from('coa');
        // $this->old_db->where('enable',0);
        $query1 = $this->old_db->get();
        $dt_coa = $query1->result();

        foreach($dt_coa as $row){
            if($row->no_coa != ''){
                $arr_insert = array(
                    'no_coa'=>$row->no_coa,
                    'gol1'=>$row->gol1,
                    'gol2'=>$row->gol2,
                    'gol3'=>$row->gol3,
                    'gol4'=>$row->gol4,
                    'gol5'=>$row->gol5,
                    'nama'=>$row->nama_lkp,
                    'alokasi'=>$row->alokasi,
                    'normal'=>$row->normal,
                    'enable'=>intval($row->enable),
                    'kode_thp'=>intval($row->kode_thp),
                    'created_at'=> date('Y-m-d H:i:s'),
                    'created_by'=>'programmer',
                    'updated_at'=> date('Y-m-d H:i:s'),
                    'updated_by'=>'programmer',
                    'n1'=>$row->n1,
                    'n2'=>$row->n2,
                    'n3'=>$row->n3,
                    'n4'=>$row->n4,
                    'n5'=>$row->n5,
                );
                $masukkan_data = $this->global_model->insert_table('default','mstr_coa',$arr_insert);

                $data['status'] = 200;
                $data['msg'][$row->no_coa] = 'berhasil simpan';
                if($masukkan_data['status'] != 200){
                    $data['status'] = 500;
                    $data['msg'][$row->no_coa] = $masukkan_data['msg'];
                }
                
            }
        }
        return $this->output
            ->set_content_type('application/json')
            ->set_status_header($data['status'])
            ->set_output(json_encode($data));
    }
}