<?php
class global_model extends CI_Model
{
    
    function insert_table($koneksi,$table, $data)
    {
        $dt_respon=[];
        $dt_respon['status'] = 200;
        $dt_respon['msg'] = 'Insert data success';
        // $this->db = $this->load->database($koneksi, true);
        $this->db = $this->load->database($koneksi, true);
        $query    = $this->db->insert($table, $data);
        $error = $this->db->error();
        if(!empty($error['message'])){
            $dt_respon['status'] = $error['code'];
            $dt_respon['msg'] = $error['message'];
        }
        return $dt_respon;
    }
    function update_table($table, $data, $where)
    {
        $dt_respon=[];
        $dt_respon['status'] = 200;
        $dt_respon['msg'] = '';
        $this->db->where($where);
        $query    = $this->db->update($table, $data);
        $error = $this->db->error();
        
        if(!empty($error['message'])){
            $dt_respon['status'] = $error['code'];
            $dt_respon['msg'] = $error['message'];
        }
        return $dt_respon;
    }
    function delete_table($table, $where)
    {

        $this->db->where($where);
        $query    = $this->db->delete($table);
        return $query;
    }
    function insert_diff_db($koneksi,$table,$data){
        $this->diffdb = $this->load->database($koneksi, true);
        $query    = $this->diffdb->insert($table, $data);

        return $query;
    }
}
