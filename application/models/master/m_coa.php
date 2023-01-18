<?php
class m_coa extends CI_Model
{
    
    function show_all($sts_enable,$is_estate,$jenis_coa)
    {
        $this->db->from('mstr_coa');
        if($sts_enable != ''){
            $this->db->where('enable',$sts_enable);
        }
        if($is_estate == 1){
            $this->db->like('no_coa', '3-', 'both');
        }
        switch($jenis_coa){
            case 'penjualan':
                $this->db->like('no_coa', '3-4', 'both');
                break;
            case 'hutang':
                $this->db->like('no_coa', '3-2', 'both');
                break;
            case 'piutang':
                $this->db->like('no_coa', '3-1', 'both');
                break;
            case 'cadangan':
                $this->db->like('no_coa', '3-5', 'both');
                break;
        }
        $this->db->order_by('no_coa','asc');
        // $this->db->limit(10);
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