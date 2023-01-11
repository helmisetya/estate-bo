<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mstr_kavling extends CI_Controller
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
        $this->old_db->from('kavling');
        $query1 = $this->old_db->get();
        $dt_kav = $query1->result();

        foreach($dt_kav as $row){
            if($row->No_kavling != ''){

                $val_lokasi = 0;
                $this->new_db = $this->load->database("default", true);
                $this->new_db->from('mstr_lokasi_kav');
                $this->new_db->where('lokasi_kav',$row->lokasi_kav);
                // $this->new_db->order_by('created_at','DESC');
                $query2 = $this->new_db->get();
                $dt_lok_kav = $query2->row();
                if(count((array)$dt_lok_kav) > 0){
                    $val_lokasi = $dt_lok_kav->id;
                }

                $arr_insert = array(
                    'kode_kavling'=>$row->No_kavling,
                    'nama'=>$row->No_kavling,
                    'type'=>$row->TYPE,
                    'luas_tanah'=>floatval($row->LS_TANAH),
                    'luas_bangunan'=>floatval($row->LS_BNG),
                    'harga_jual'=>floatval($row->HRG_JUAL),
                    'coa_bh'=>$row->BH_COA,
                    'coa_jl'=>$row->JL_COA,
                    'coa_hp'=>$row->HP_COA,
                    'coa_piutang'=>$row->PIUTANG_COA,
                    'coa_titipan'=>$row->TITIPAN_COA,
                    'coa_cadangan'=>$row->CADANGAN_COA,
                    'lokasi_kavling'=>intval($val_lokasi),
                    'status_tagihan'=>intval($row->status_tagihan),
                    'nama_pemilik'=>$row->Nama,
                    'telp_pemilik'=>$row->Telepon,
                    'status'=>intval($row->status),
                    'created_at'=> date('Y-m-d H:i:s'),
                    'created_by'=>'programmer',
                    'updated_at'=> date('Y-m-d H:i:s'),
                    'updated_by'=>'programmer',
                );
                $masukkan_data = $this->global_model->insert_table('default','mstr_kavling',$arr_insert);

                $data['status'] = 200;
                $data['msg'][$row->No_kavling] = 'berhasil simpan';
                if($masukkan_data['status'] != 200){
                    $data['status'] = 500;
                    $data['msg'][$row->No_kavling] = $masukkan_data['msg'];
                }
                
            }
        }
        return $this->output
            ->set_content_type('application/json')
            ->set_status_header($data['status'])
            ->set_output(json_encode($data));
    }
    public function move_lok_kav(){
        $data = [];
        $data['status'] = 200;
        $data['msg'] = [];

        $this->old_db = $this->load->database("old_default", true);
        $this->old_db->from('lokasi_kavling');
        $query1 = $this->old_db->get();
        $dt_kav = $query1->result();

        foreach($dt_kav as $row){
            if($row->lokasi_kav != ''){

                // $val_lokasi = 0;
                // $this->new_db = $this->load->database("default", true);
                // $this->new_db->from('mstr_lokasi_kav');
                // $this->new_db->where('lokasi_kav',$row->lokasi_kav);
                // // $this->new_db->order_by('created_at','DESC');
                // $query2 = $this->new_db->get();
                // $dt_lok_kav = $query2->row();
                // if(count((array)$dt_lok_kav) > 0){
                //     $val_lokasi = $dt_lok_kav->id;
                // }

                $arr_insert = array(
                    'lokasi_kav'=>$row->lokasi_kav,
                    'created_at'=>date('Y-m-d'),
                    'updated_at'=>date('Y-m-d'),
                    'created_by'=>'programmer',
                    'updated_by'=>'programmer',
                );
                $masukkan_data = $this->global_model->insert_table('default','mstr_lokasi_kav',$arr_insert);

                $data['status'] = 200;
                $data['msg'][$row->lokasi_kav] = 'berhasil simpan';
                if($masukkan_data['status'] != 200){
                    $data['status'] = 500;
                    $data['msg'][$row->lokasi_kav] = $masukkan_data['msg'];
                }
                
            }
        }
        return $this->output
            ->set_content_type('application/json')
            ->set_status_header($data['status'])
            ->set_output(json_encode($data));
    }
}