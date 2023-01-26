<?php
class m_tagihan_kav extends CI_Model
{
    public function search_data_home($periode,$tahun){
        $this->db = $this->load->database('default', true);
        $this->db->select('tagihan.no_transaksi,kav.kode_kavling,tagihan.periode,tagihan.total_tagihan,tagihan.saldo_awal,tagihan.saldo_akhir,tagihan.created_at,tagihan.created_by');
        $this->db->from('tagihan_kavling as tagihan');
        $this->db->join('mstr_kavling as kav','tagihan.id_kav = kav.id','left');
        if($periode != "all"){
            $this->db->where('tagihan.periode', $periode);
        }else{
            // $arr_periode = ['01/'.$tahun,"02/".$tahun,"03/".$tahun,"04/".$tahun,"05/".$tahun,"06/".$tahun,"07/".$tahun,"08/".$tahun,"09/".$tahun,"10/".$tahun,"11/".$tahun,"12/".$tahun"];
            $arr_period = array('01/'.$tahun,"02/".$tahun,"03/".$tahun,"04/".$tahun,"05/".$tahun,"06/".$tahun,"07/".$tahun,"08/".$tahun,"09/".$tahun,"10/".$tahun,"11/".$tahun,"12/".$tahun);
            $this->db->where_in('tagihan.periode', $arr_period);
        }
        $this->db->order_by('tagihan.no_transaksi', 'ASC');
        $query = $this->db->get();
        $error = $this->db->error();
        if(!empty($error['message'])){
            $dt_respon['status'] = $error['code'];
            $dt_respon['msg'] = $error['message'];
        }else{
            $dt_respon['status']=200;
            $dt_respon['datanya'] = $query->result();
        }
        return $dt_respon;
    }
    public function kav_tagihan(){
        $this->db = $this->load->database('default', true);
        $this->db->from('mstr_kavling');
        $this->db->where('mstr_kavling.status_tagihan', 1);
        $this->db->order_by('mstr_kavling.kode_kavling', 'ASC');
        $query = $this->db->get();
        $error = $this->db->error();
        if(!empty($error['message'])){
            $dt_respon['status'] = $error['code'];
            $dt_respon['msg'] = $error['message'];
        }else{
            $dt_respon['status']=200;
            $dt_respon['datanya'] = $query->result();
        }
        return $dt_respon;
    }
    
    public function get_tagihan($kav,$periode){
        $this->db->from('tagihan_kavling');
        $this->db->where('id_kav', $kav);
        $this->db->where('periode', $periode);
        $query = $this->db->get();

        return $query->row();
    }
    public function get_tagihan_by_notransaksi($no_trans){
        $this->db->select('tagihan.*,kav.nama_pemilik,kav.kode_kavling');
        $this->db->from('tagihan_kavling as tagihan');
        $this->db->join('mstr_kavling as kav','tagihan.id_kav = kav.id','left');
        $this->db->where('no_transaksi', $no_trans);
        $query = $this->db->get();

        return $query->row();
    }
}