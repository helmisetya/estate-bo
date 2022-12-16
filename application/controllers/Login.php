<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    protected $url = "http://10.0.35.8/user/login_auth";
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_auth');
    }
    public function index()
    {
        $this->load->view('v_login');
    }
    function logout()
    {
        $this->session->unset_userdata('login_sukses');
        $this->session->sess_destroy();
        redirect('welcome');
    }
    function check_login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post("password");
        $data = array(
            "username" => $username,
            "password" => $password,
            "application" => "estate_bo", //nanti pakai Payroll_web
            "type" => "json"
        );
        $do_Api_login = $this->send_post($data);
        if ($do_Api_login['status'] == false) {
            $this->session->set_flashdata('login_admin_gagal', $do_Api_login['data']);
            redirect('login');
        }
        $json_data = json_decode($do_Api_login['data']);
        if ($json_data->status == false) {
            $this->session->set_flashdata('login_admin_gagal', $json_data->result);
            redirect('login');
        }
        $data_user = $this->m_auth->cek_akun($json_data->nik);
        if (count($data_user) > 0) {
            $sess_data = array(
                'nik' => $data_user[0]->EMPLOYEEID,
                'nama' => $data_user[0]->EMNAME,
                'username'=>$username,
                'role' => $json_data->result,
                'id_subdept' => $data_user[0]->SUBDEPT,
                'id_dept' => $data_user[0]->DEPTID,
                // 'userlevel' => $userlevel,
                // 'divisi_access' => $divisi_access
            );
            $this->session->set_userdata('login_sukses', TRUE);
            $this->session->set_userdata($sess_data);

            $this->session->set_flashdata('login_berhasil', '' . $data_user[0]->EMNAME);

            redirect('welcome');

            // if (date('Y-m-d') == '') {
            //     redirect('proses');
            // }
            // $user_access_payroll = $this->auth->fetch_user_access($username);
            // // print_r($user_access_payroll);
            // // die();
            // if (isset($user_access_payroll->username) || $json_data->result == 'Programmer') {
            //     $userlevel = 2;
            //     $divisi_access = '00';
            //     if ($json_data->result != 'Programmer') {
            //         $userlevel = $user_access_payroll->userlevel;
            //         $divisi_access = $user_access_payroll->division_id;
            //     }
            //     $sess_data = array(
            //         'nik' => $data_user[0]->EMPLOYEEID,
            //         'nama' => $data_user[0]->EMNAME,
            //         'username'=>$user_access_payroll->username,
            //         'role' => $json_data->result,
            //         'id_subdept' => $data_user[0]->SUBDEPT,
            //         'id_dept' => $data_user[0]->DEPTID,
            //         'userlevel' => $userlevel,
            //         'divisi_access' => $divisi_access
            //     );
            //     $this->session->set_userdata('login_sukses', TRUE);
            //     $this->session->set_userdata($sess_data);

            //     $this->session->set_flashdata('login_berhasil', '' . $data_user[0]->EMNAME);

            //     redirect('dashboard');
            // } else {
            //     $this->session->set_flashdata('login_admin_gagal', "username tidak memiliki hak akses");
            //     redirect('login');
            // }

            // print_r($json_data);
        } else {
            $this->session->set_flashdata('login_admin_gagal', "NIK belum terdaftar");
            redirect('login');
        }
    }
    function send_post($data)
    {
        //$request = new HTTPRequest($this->url, HTTP_METH_POST);
        $ch = curl_init($this->url);
        $postString = http_build_query($data, '', '&');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postString);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        $err = curl_error($ch);
        curl_close($ch);
        if ($err) {
            return array("status" => false, "data" => $err);
        } else {
            return array("status" => true, "data" => $response);
        }
    }
}
