<?php
class m_coa extends CI_Model
{
    
    function show_all($sts_enable)
    {
        $this->db->from('mstr_coa');
        if($sts_enable != ''){
            $this->db->where('enable',$sts_enable);
        }
        // $this->db->limit(10);
        $query = $this->db->get();
        return $query->result_array();
        
    }
    function find_by_coa($coa){
        $this->db->from('mstr_coa');
        $this->db->where('no_coa',$coa);
        $query = $this->db->get();
        return $query->result();
    }
}