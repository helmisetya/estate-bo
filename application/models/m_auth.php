<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class m_auth extends CI_Model
{
    public function cek_akun($nik)
    {
        $this->db_payroll = $this->load->database("payroll", true);
        $this->db_payroll->from('EMPLOYEE');
        $this->db_payroll->join('DEPARTMENT', 'EMPLOYEE.DEPTID = DEPARTMENT.DEPTID');
        $this->db_payroll->where('EMPLOYEE.EMPLOYEEID', $nik);
        $query = $this->db_payroll->get();
        return $query->result();
    }
    public function get_username($nik){
        $this->db_payroll = $this->load->database("payroll", true);
        $this->db_payroll->from('user');
        $this->db_payroll->where('nik', $nik);
        $query = $this->db_payroll->get();
        return $query->result();
    }
    // public function fetch_user_access($username)
    // {
    //     $this->db->from('payroll_access');
    //     $this->db->where('username', $username);
    //     $query = $this->db->get();
    //     return $query->row();
    // }
}