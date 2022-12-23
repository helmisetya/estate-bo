<?php
class m_customer extends CI_Model
{
    
    function show_all()
    {
        $this->db->select('t_cust.*, t_coa.nama as nama_piutang,t_coa2.nama as nama_hutang');
        $this->db->from('mstr_customer as t_cust');
        $this->db->join('mstr_coa as t_coa','t_cust.coa_piutang = t_coa.no_coa','left');
        $this->db->join('mstr_coa as t_coa2','t_cust.coa_hutang = t_coa2.no_coa','left');
        $query = $this->db->get();
        return $query->result();
        
    }
    function find_by_kode($kode){
        $this->db->from('mstr_customer');
        $this->db->where('kode_cust',$kode);
        $query = $this->db->get();
        return $query->result();
    }
}