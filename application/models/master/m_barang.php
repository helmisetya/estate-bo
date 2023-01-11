<?php
class m_barang extends CI_Model
{
    
    function show_all()
    {
        $this->db->select('t_barang.*, t_coa.nama as nama_coa');
        $this->db->from('mstr_barang as t_barang');
        $this->db->join('mstr_coa as t_coa','t_barang.coa_no = t_coa.no_coa','left');
        $query = $this->db->get();
        return $query->result();
        
    }
    function find_by_kode($kode){
        $this->db->from('mstr_barang');
        $this->db->where('kode_brg',$kode);
        $query = $this->db->get();
        return $query->result();
    }
}