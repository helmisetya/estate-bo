<?php
defined('BASEPATH') or exit('No direct script access allowed');

class tagihan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('global_model');
        $this->load->model('master/m_kav');
    }
    public function move_db(){
        $data = [];
        $data['status'] = 200;
        $data['msg'] = [];

        $this->old_db = $this->load->database("old_default", true);
        $this->old_db->from('tagihan_adm_kavling');
        $this->old_db->where('periode',$_GET['periode']);
        $query1 = $this->old_db->get();
        $tagihan = $query1->result();
        foreach($tagihan as $row){
            if($row->kode != ''){
                $no_trans = 'INV-TG-'.$row->periode.$row->no_kav;
                $dt_kav = $this->m_kav->find_by_kode($row->no_kav);
                $id_kav = 0;
                if(count((array)$dt_kav)>0){
                    $id_kav = $dt_kav[0]->id;
                }
                $arr_insert = array(
                    'no_transaksi'=>$no_trans,
                    'periode'=>$row->periode,
                    'tgl_bayar'=>date('Y-m-d', strtotime($row->tgl_bayar)),
                    // 'telepon'=>'',
                    'biaya_telp'=>floatval($row->pemakaian_telepon),
                    'biaya_listrik'=>floatval($row->pemakaian_listrik),
                    'meteran_air_prev'=>floatval($row->meteran_air_bulan_lalu),
                    'meteran_air_now'=>floatval($row->meteran_air_bulan_ini),
                    'jml_pemakaian_air'=>floatval($row->meteran_air_bulan_ini) - floatval($row->meteran_air_bulan_lalu),
                    'biaya_air'=>floatval($row->Air),
                    'biaya_admin'=>floatval($row->Administrasi),
                    'biaya_taman'=>0,
                    'biaya_fasum'=>floatval($row->Taman),
                    'biaya_keamanan'=>floatval($row->Keamanan),
                    'biaya_sampah'=>floatval($row->Sampah),
                    'biaya_pbb'=>floatval($row->PBB),
                    'biaya_lain'=>floatval($row->Lainlain),
                    'minus'=>floatval($row->minus),
                    'koreksi'=>floatval($row->Koreksi),
                    'payment_tunai'=>floatval($row->tunai),
                    'payment_tf'=>floatval($row->transfer),
                    'total_tagihan'=>floatval($row->tunai) + floatval($row->transfer),
                    'keterangan'=>$row->Keterangan,
                    'old_kode'=>$row->kode,
                    'id_kav'=>$id_kav,
                    'saldo_awal'=>floatval($row->saldo_awal),
                    'saldo_akhir'=>floatval($row->Saldo_akhir),
                    'created_at'=> date('Y-m-d H:i:s'),
                    'created_by'=>'programmer',
                    'updated_at'=> date('Y-m-d H:i:s'),
                    'updated_by'=>'programmer',  
                );
                $masukkan_data = $this->global_model->insert_table('default','tagihan_kavling',$arr_insert);
                $data['status'] = 200;
                $data['msg'][$row->kode] = 'berhasil simpan';
                if($masukkan_data['status'] != 200){
                    $data['status'] = 500;
                    $data['msg'][$row->kode] = $masukkan_data['msg'];
                }
            }
        }
        return $this->output
            ->set_content_type('application/json')
            ->set_status_header($data['status'])
            ->set_output(json_encode($data));
    }
    public function move_kalkulasi_air(){
        $data = [];
        $data['status'] = 200;
        $data['msg'] = [];

        $this->old_db = $this->load->database("old_default", true);
        $this->old_db->from('kalkulasi_air');
        $query1 = $this->old_db->get();
        $kalkulasi = $query1->result();
        foreach($kalkulasi as $row){
            if($row->Periode != ''){
                $arr_insert = array(
                    'periode'=>$row->Periode,
                    'sewa'=>floatval($row->Sewa),
                    'retribusi'=>floatval($row->Retribusi),
                    'tarif1'=>floatval($row->Tarif1),
                    'tarif1_kubik'=>floatval($row->Tarif1M3),
                    'tarif2'=>floatval($row->Tarif2),
                    'tarif2_kubik'=>floatval($row->Tarif2M3),
                    'tarif3'=>floatval($row->Tarif3),
                    'tarif3_kubik'=>floatval($row->Tarif3M3),
                    'tarif4'=>floatval($row->Tarif4),
                    'tarif4_kubik'=>floatval($row->Tarif4M3),
                    'created_at'=> date('Y-m-d H:i:s'),
                    'created_by'=>'programmer',
                    'updated_at'=> date('Y-m-d H:i:s'),
                    'updated_by'=>'programmer',  
                );
                $masukkan_data = $this->global_model->insert_table('default','mstr_kalkulasi_air',$arr_insert);
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