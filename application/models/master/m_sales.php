<?php
class m_sales extends CI_Model
{
    
    function show_all()
    {
        $this->db->from('mstr_sales');
        $query = $this->db->get();
        return $query->result();
        
    }
    function find_by_kode($kode){
        $this->db->from('mstr_sales');
        $this->db->where('kode',$kode);
        $query = $this->db->get();
        return $query->result();
    }
    function find_one($id){
        $this->db->from('mstr_sales');
        $this->db->where('id',$id);
        $query = $this->db->get();
        return $query->row();
    }
}