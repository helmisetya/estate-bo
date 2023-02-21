<?php
class m_periode extends CI_Model
{
    function show_one($bulan,$tahun){
        $this->db = $this->load->database('default', true);
        $this->db->from('mstr_periode');
        // $this->db->where('periode',$periode);
        $this->db->where('bulan',$bulan);
        $this->db->where('tahun',$tahun);
        $query = $this->db->get();
        
        return $query->row();
    }   
}