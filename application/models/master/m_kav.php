<?php
class m_kav extends CI_Model
{
    
    function fetch_data($lok)
    {
        $this->db = $this->load->database('default', true);
        // $this->db->select('kav.id,kav.kode_kavling,kav.nama,kav.type,kav.luas_tanah,kav.luas_bangunan,kav.harga_jual,kav.nama_pemilik,kav.telp_pemilik,kav.status,kav.created_at,kav.created_by,t_coa1.no_coa as coabh,t_coa1.nama as nama_coabh,t_coa2.no_coa as coajl,t_coa2.nama as nama_coajl,t_coa3.no_coa as coahp,t_coa3.nama as nama_coahp,t_coa4.no_coa as coapiutang,t_coa4.nama as nama_coapiutang,t_coa5.no_coa as coatitipan,t_coa5.nama as nama_coatitipan,t_coa6.no_coa as coacadangan,t_coa6.nama as nama_coacadangan,lok_kav.lokasi_kav');

        $this->db->select('kav.id,kav.kode_kavling,kav.nama,lok_kav.lokasi_kav,kav.nama_pemilik,kav.telp_pemilik,kav.created_at,kav.created_by');
        $this->db->from('mstr_kavling as kav');
        // $this->db->join('mstr_coa as t_coa1','kav.coa_bh = t_coa1.no_coa','left');
        // $this->db->join('mstr_coa as t_coa2','kav.coa_jl = t_coa2.no_coa','left');
        // $this->db->join('mstr_coa as t_coa3','kav.coa_hp = t_coa3.no_coa','left');
        // $this->db->join('mstr_coa as t_coa4','kav.coa_piutang = t_coa4.no_coa','left');
        // $this->db->join('mstr_coa as t_coa5','kav.coa_titipan = t_coa5.no_coa','left');
        // $this->db->join('mstr_coa as t_coa6','kav.coa_cadangan = t_coa6.no_coa','left');
        $this->db->join('mstr_lokasi_kav as lok_kav','kav.lokasi_kavling = lok_kav.id','left');
        if($lok != ""){
            $this->db->where('kav.lokasi_kavling', $lok);
        }
        $this->db->order_by('kav.nama', 'ASC');
        $query = $this->db->get();
        $error = $this->db->error();
        if(!empty($error['message'])){
            $dt_respon['status'] = $error['code'];
            $dt_respon['msg'] = $error['message'];
        }else{
            $dt_respon['status']=200;
            $dt_respon['datanya'] = $query->result();
        }
        return $dt_respon;
        
    }
    function find_by_kode($kav){
        $this->db->from('mstr_kavling');
        $this->db->where('kode_kavling',$kav);
        $query = $this->db->get();
        return $query->result();
    }
    function show_detail($kav){
        $this->db = $this->load->database('default', true);
        $this->db->select('kav.id,kav.kode_kavling,kav.nama,kav.type,kav.lokasi_kavling as id_kav,kav.luas_tanah,kav.luas_bangunan,kav.harga_jual,kav.nama_pemilik,kav.telp_pemilik,kav.status_tagihan,kav.created_at,kav.created_by,t_coa1.no_coa as coabh,t_coa1.nama as nama_coabh,t_coa2.no_coa as coajl,t_coa2.nama as nama_coajl,t_coa3.no_coa as coahp,t_coa3.nama as nama_coahp,t_coa4.no_coa as coapiutang,t_coa4.nama as nama_coapiutang,t_coa5.no_coa as coatitipan,t_coa5.nama as nama_coatitipan,t_coa6.no_coa as coacadangan,t_coa6.nama as nama_coacadangan,lok_kav.lokasi_kav');
        $this->db->from('mstr_kavling as kav');
        $this->db->join('mstr_coa as t_coa1','kav.coa_bh = t_coa1.no_coa','left');
        $this->db->join('mstr_coa as t_coa2','kav.coa_jl = t_coa2.no_coa','left');
        $this->db->join('mstr_coa as t_coa3','kav.coa_hp = t_coa3.no_coa','left');
        $this->db->join('mstr_coa as t_coa4','kav.coa_piutang = t_coa4.no_coa','left');
        $this->db->join('mstr_coa as t_coa5','kav.coa_titipan = t_coa5.no_coa','left');
        $this->db->join('mstr_coa as t_coa6','kav.coa_cadangan = t_coa6.no_coa','left');
        $this->db->join('mstr_lokasi_kav as lok_kav','kav.lokasi_kavling = lok_kav.id','left');
        
        $this->db->where('kav.id', $kav);
        
        $this->db->order_by('kav.nama', 'ASC');
        $query = $this->db->get();
        $error = $this->db->error();
        if(!empty($error['message'])){
            $dt_respon['status'] = $error['code'];
            $dt_respon['msg'] = $error['message'];
        }else{
            $dt_respon['status']=200;
            $dt_respon['datanya'] = $query->row();
        }
        return $dt_respon;
    }
}