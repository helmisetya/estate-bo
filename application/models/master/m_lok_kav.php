<?php
class m_lok_kav extends CI_Model
{
    
    function show_all()
    {
        $this->db->from('mstr_lokasi_kav');
        $query = $this->db->get();
        return $query->result();
        
    }
    function find_by_name($nama_kav){
        $this->db->from('mstr_lokasi_kav');
        $this->db->where('lokasi_kav',$nama_kav);
        $query = $this->db->get();
        return $query->result();
    }
}