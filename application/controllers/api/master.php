<?php
defined('BASEPATH') or exit('No direct script access allowed');

class master extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('global_model');
    }
    public function move_barang(){
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
    public function move_coa(){
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
    public function move_cust(){
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
    public function move_kavling(){
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
    public function move_sales(){
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
    public function move_supp(){
        $data = [];
        $data['status'] = 200;
        $data['msg'] = [];

        $this->old_db = $this->load->database("old_default", true);
        $this->old_db->from('supplier');
        $query1 = $this->old_db->get();
        $dt_supp = $query1->result();

        foreach($dt_supp as $row){
            if($row->kode_supl != ''){
                $arr_insert = array(
                    'kode_supp'=>$row->kode_supl,
                    'nama'=>$row->nama_supl,
                    'kontak'=>$row->kontak,
                    'alamat'=>$row->alamat,
                    'kota'=>$row->kota,
                    'kode_pos'=>$row->kode_pos,
                    'telepon'=>$row->telepon,
                    'fax'=>$row->fax,
                    'coa_hutang'=>$row->Coa_hutang,
                    'lama_hutang'=>0,
                    'created_at'=> date('Y-m-d H:i:s'),
                    'created_by'=>'programmer',
                    'updated_at'=> date('Y-m-d H:i:s'),
                    'updated_by'=>'programmer'
                );
                $masukkan_data = $this->global_model->insert_table('default','mstr_supplier',$arr_insert);

                $data['status'] = 200;
                $data['msg'][$row->kode_supl] = 'berhasil simpan';
                if($masukkan_data['status'] != 200){
                    $data['status'] = 500;
                    $data['msg'][$row->kode_supl] = $masukkan_data['msg'];
                }
                
            }
        }
        return $this->output
            ->set_content_type('application/json')
            ->set_status_header($data['status'])
            ->set_output(json_encode($data));
    }
    public function move_pesentase_income(){
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
    public function move_periode(){
        $data = [];
        $data['status'] = 200;
        $data['msg'] = [];

        $this->old_db = $this->load->database("old_default", true);
        $this->old_db->from('periode');
        $query1 = $this->old_db->get();
        $pesentase = $query1->result();

        foreach($pesentase as $row){
            if($row->Periode != ''){

                $arr_insert = array(
                    'periode'=>$row->Periode,
                    'tahun'=>$row->Tahun,
                    'bulan'=>$row->Bulan,
                    'is_closing'=>$row->Status,
                    'is_closing_tagihan'=>$row->closing_tagihan,
                    'status_coa'=>$row->sts_coa
                );
                $masukkan_data = $this->global_model->insert_table('default','periode',$arr_insert);

                $data['status'] = 200;
                $data['msg'][$row->Periode] = 'berhasil simpan';
                if($masukkan_data['status'] != 200){
                    $data['status'] = 500;
                    $data['msg'][$row->periode] = $masukkan_data['msg'];
                }
            }
        }
        return $this->output
            ->set_content_type('application/json')
            ->set_status_header($data['status'])
            ->set_output(json_encode($data));
    }
}