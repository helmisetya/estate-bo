<?php
class m_lok_kav extends CI_Model
{
    
    function show_all()
    {
        $this->db->from('mstr_lokasi_kav');
        $query = $this->db->get();
        return $query->result();
        
    }
}