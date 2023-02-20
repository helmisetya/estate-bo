<?php
class m_nota extends CI_Model
{
    function daftar_tagihan($lok_kav,$periode){
        $this->db = $this->load->database('default', true);
        $this->db->select('tag.id,tag.saldo_awal,tag.saldo_akhir,tag.total_tagihan,lok_kav.lokasi_kav,kav.kode_kavling,kav.nama_pemilik');
        $this->db->from('tagihan_kavling as tag');
        $this->db->join('mstr_kavling as kav','tag.id_kav = kav.id');
        $this->db->join('mstr_lokasi_kav as lok_kav','kav.lokasi_kavling = lok_kav.id');
        if($lok_kav != 0){
            $this->db->where('lok_kav.id', $lok_kav);
        }
        
        $this->db->where('tag.periode', $periode);
        $this->db->where('kav.status_tagihan', 1);
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
    function detail_tagihan($id){
        $this->db = $this->load->database('default', true);
        $this->db->select('tag.*,,kav.kode_kavling,kav.nama_pemilik,kav.telp_pemilik');
        $this->db->from('tagihan_kavling as tag');
        $this->db->join('mstr_kavling as kav','tag.id_kav = kav.id');
        $this->db->where('tag.id', $id);
        $query = $this->db->get();
        $error = $this->db->error();
        if(!empty($error['message'])){
            $dt_respon['status'] = $error['code'];
            $dt_respon['msg'] = $error['message'];
        }else{
            $dt_respon['status']=200;
            $dt_respon['datanya'] = $query->row();
        }
        return $dt_respon;
    }
}