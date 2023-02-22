<?php
class m_rekap extends CI_Model
{
    function tag_perperiode($periode){
        $this->db->select('tag.*,kav.kode_kavling,kav.nama_pemilik');
        $this->db->from('tagihan_kavling as tag');
        $this->db->join('mstr_kavling as kav','tag.id_kav = kav.id');
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
}