<?php
defined('BASEPATH') or exit('No direct script access allowed');

class kavling extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        ini_set('max_execution_time', 0);
        if ($this->session->userdata('login_sukses') == FALSE) {
            redirect('login');
            return;
        }
        $this->load->model('master/m_kav');
        $this->load->model('master/m_coa');
        $this->load->model('master/m_lok_kav');
        $this->load->model('global_model');
    }
    public function index()
    {
        $data = [];
        $data['lok_kav'] = $this->m_lok_kav->show_all();
        // $data['coa_aktif'] = $this->m_coa->show_all('');
        // print_r($data['coa_aktif']);
        // $data['kota'] = $this->m_kota->fetch_data(1);
        $this->load->view('header');
        $this->load->view('master/v_kavling',$data);
        $this->load->view('footer');
    }
    public function show_data()
    {
        $data['status'] = 200;
        $data['msg'] = 'OK';
        $dt_kav = $this->m_kav->fetch_data(($_POST['lok']));
        if($dt_kav['status'] == 200){
            $data['html'] = '';
            $no = 1;
            foreach($dt_kav['datanya'] as $row){
                $data['html'] .= '<tr>';
                $data['html'] .= '<td>'.$no.'</td>';
                $data['html'] .= '<td>'.$row->kode_kavling.'<br><span class="badge badge-primary">Created By : '.$row->created_by.'</span>';
                $data['html'] .= '<br><span class="badge badge-primary">Created At: '.date('d-m-Y',strtotime($row->created_at)).'</span></td>';
                $data['html'] .= '<td>'.$row->nama.'</td>';
                $data['html'] .= '<td>'.$row->lokasi_kav.'</td>';
                $data['html'] .= '<td>'.$row->nama_pemilik.'</td>';
                $data['html'] .= '<td>'.$row->telp_pemilik.'</td>';
                $data['html'] .= '<td>';
                $data['html'] .= '<button type="button" class="btn btn btn-info" data-idkav="' . $row->id . '" onclick="openModalEdit(this)" data-toggle="modal" data-target=".edit-modal">Detail / Edit</button>';
                $data['html'] .= '</td>';
                $data['html'] .= '</tr>';
                $no++;
            }
        }
        // $data['kav'] = $dt_kav;
        return $this->output
            ->set_content_type('application/json')
            ->set_status_header($data['status'])
            ->set_output(json_encode($data));
    }
    function validasi_save($data_post,$action){
        $data = [];
        $data['status'] = 200;
        $data['msg'] = '';

        if($data_post['kode_kavling'] == ''){
            $data['status'] = 500;
            $data['msg'] = 'Kode Kavling tidak boleh kosong <br>';
        }
        if($data_post['nama_pemilik'] == ''){
            $data['status'] = 500;
            $data['msg'] .= 'Nama Pemilik tidak boleh kosong';
        }
        if($action == 'save'){
            $exist_name = $this->m_kav->find_by_kode($data_post['kode_kavling']);
            if(count($exist_name) > 0){
                $data['status'] = 500;
                $data['msg'] .= 'Kode Kavling sudah digunakan <br>';
            }
        }
        return $data; 
    }
    public function save(){
        $data=[];
        $data['status'] = 200;
        $data['msg'] = '';
        $do_validasi = $this->validasi_save($_POST,'save');
        if($do_validasi['status'] == 200){
            $val_sts_tagihan = isset($_POST['sts_tagihan']) ? 1 : 0;
            // if($_POST['sts_tagihan'] == 'on'){
            //     $val_sts_tagihan = 1;
            // }
            $arr_insert = array(
                'kode_kavling'=>$_POST['kode_kavling'],
                'nama'=>$_POST['nama'],
                'type'=>$_POST['type'],
                'luas_tanah'=>floatval($_POST['lt']),
                'luas_bangunan'=>floatval($_POST['lb']),
                'harga_jual'=>floatval(str_replace('.', '', $_POST['harga_jual'])),
                // 'coa_bh'=>$_POST['coa_bh'],
                'coa_retur'=>$_POST['coa_retur'],
                'coa_jl'=>$_POST['coa_jl'],
                'coa_piutang'=>$_POST['coa_piutang'],
                'coa_hp'=>$_POST['coa_hp'],
                'coa_titipan'=>$_POST['coa_titipan'],
                'coa_cadangan'=>$_POST['coa_cadangan'],
                'lokasi_kavling'=>$_POST['lok_kav'],
                'status_tagihan'=>$val_sts_tagihan,
                'nama_pemilik'=>$_POST['nama_pemilik'],
                'telp_pemilik'=>$_POST['telp_pemilik'],
                'created_at'=>date('Y-m-d H:i:s'),
                'created_by'=>$_SESSION['username'],
                'updated_at'=>date('Y-m-d H:i:s'),
                'updated_by'=>$_SESSION['username'],
            );
            $masukkan_data = $this->global_model->insert_table('default','mstr_kavling',$arr_insert);
            $data['msg'] = 'Berhasil simpan';
            if($masukkan_data['status'] != 200){
                $data['status'] = 500;
                $data['respon_save']=$masukkan_data;
                $data['msg'] = $masukkan_data['msg'];
            }
        }else{
            $data['status'] = $do_validasi['status'];
            $data['msg'] = $do_validasi['msg'];
        }
        return $this->output
            ->set_content_type('application/json')
            ->set_status_header($data['status'])
            ->set_output(json_encode($data));
    }
    public function edit(){
        $data=[];
        $data['status'] = 200;
        $data['msg'] = '';

        $do_validasi = $this->validasi_save($_POST,'edit');
        if($do_validasi['status'] == 200){
            $arr_update = array(
                'nama'=>$_POST['nama'],
                'type'=>$_POST['type'],
                'luas_tanah'=>floatval($_POST['lt']),
                'luas_bangunan'=>floatval($_POST['lb']),
                'harga_jual'=>floatval(str_replace('.', '', $_POST['harga_jual'])),
                // 'coa_bh'=>$_POST['coa_bh'],
                'coa_retur'=>$_POST['coa_retur'],
                'coa_jl'=>$_POST['coa_jl'],
                'coa_piutang'=>$_POST['coa_piutang'],
                'coa_hp'=>$_POST['coa_hp'],
                'coa_titipan'=>$_POST['coa_titipan'],
                'coa_cadangan'=>$_POST['coa_cadangan'],
                'lokasi_kavling'=>$_POST['lok_kav'],
                'status_tagihan'=>isset($_POST['sts_tagihan']) ? 1 : 0,
                'nama_pemilik'=>$_POST['nama_pemilik'],
                'telp_pemilik'=>$_POST['telp_pemilik'],
                'updated_at'=>date('Y-m-d'),
                'updated_by'=>$_SESSION['username'],
            );
            $edit_data = $this->global_model->update_table('mstr_kavling',$arr_update,"id = " . $_POST['id_kav']);
            $data['msg'] = 'Berhasil diedit';

            if($edit_data['status'] != 200){
                $data['status'] = 500;
                $data['respon_save']=$edit_data;
                $data['msg'] = $edit_data['msg'];
            }
        }else{
            $data['status'] = $do_validasi['status'];
            $data['msg'] = $do_validasi['msg'];
        }
        return $this->output
            ->set_content_type('application/json')
            ->set_status_header($data['status'])
            ->set_output(json_encode($data));
    }
    public function show_one()
    {
        $data=[];
        $data['status'] = 200;
        $data['msg'] = '';

        $kav = $_POST['kav'];
        $lok_kav = $this->m_lok_kav->show_all();
        $coa_aktif = $this->m_coa->show_all('',1);
        $dt_kav = $this->m_kav->show_detail($kav);
        
        $data['detail_kav'] = $dt_kav['datanya'];
        $data['lok_kav'] = $lok_kav;
        $data['coa_aktif'] = $coa_aktif;
    
        return $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode($data));
    }
}