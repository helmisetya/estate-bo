<?php
class m_supplier extends CI_Model
{
    
    function show_all()
    {
        $this->db->select('t_supp.*, t_coa.nama as nama_hutang');
        $this->db->from('mstr_supplier as t_supp');
        $this->db->join('mstr_coa as t_coa','t_supp.coa_hutang = t_coa.no_coa','left');
        $query = $this->db->get();
        return $query->result();
        
    }
    function find_by_kode($kode){
        $this->db->from('mstr_supplier');
        $this->db->where('kode_supp',$kode);
        $query = $this->db->get();
        return $query->result();
    }
}