<?php
class m_kalkulasi_air extends CI_Model
{
    public function show_all(){
        $this->db->from('mstr_kalkulasi_air');
        $query = $this->db->get();
        return $query->result();
    }
    public function find_by_periode($periode){
        $this->db->from('mstr_kalkulasi_air');
        $this->db->where('periode',$periode);
        $query = $this->db->get();
        return $query->row();
    }
}