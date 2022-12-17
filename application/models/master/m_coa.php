<?php
class m_coa extends CI_Model
{
    
    function show_all()
    {
        $this->db->from('mstr_coa');
        $query = $this->db->get();
        return $query->result();
        
    }
    function find_by_coa($coa){
        $this->db->from('mstr_coa');
        $this->db->where('no_coa',$coa);
        $query = $this->db->get();
        return $query->result();
    }
}