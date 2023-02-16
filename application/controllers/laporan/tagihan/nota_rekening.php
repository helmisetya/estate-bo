<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once(BASEPATH . 'libraries\fpdf\fpdf.php');

class nota_rekening extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        ini_set('max_execution_time', 0);
        date_default_timezone_set('Asia/Jakarta');
        if ($this->session->userdata('login_sukses') == FALSE) {
            redirect('login');
            return;
        }
        $this->load->model('master/m_lok_kav');
        $this->load->model('laporan/tagihan/m_nota');
        $this->load->helper('bulan_tahun');
        $this->load->model('global_model');
    }
    public function index(){
        $data = [];
        // if($_SESSION['role'] != 'Programmer' && $_SESSION['role'] != 'Accounting Direksi'){
        //     redirect('Akses_user');
        //     return;
        // }
        $data['bulan'] = show_bulan();
        $data['tahun'] = show_tahun();
        $data['lok_kav'] = $this->m_lok_kav->show_all();

        $this->load->view('header');
        $this->load->view('laporan/tagihan/v_nota',$data);
        $this->load->view('footer');
    }
    public function list_tagihan(){
        $data[]='';
        $data['status'] = 200;
        $data['html'] = '';
        $modulo = 1;
        $classTr = "odd";

        $periode = $_POST['bulan'].'/'.$_POST['tahun'];
        $list = $this->m_nota->daftar_tagihan($_POST['kav'],$periode);
        if($list['status'] == 200){
            $data['list'] = $list['datanya'];
            $data['jml_data'] = count($list['datanya']);
            foreach($list['datanya'] as $row){
                if ($modulo % 2 == 0) {
                    $classTr = "even";
                }
                $data['html'] .= '<tr class>="' . $classTr . '">';
                $data['html'] .= '<td><input type="checkbox" class="form-control pilih" name="centang[]" value="' . $row->id . '"></td>';
                $data['html'] .= '<td><input type="hidden" name="id_tagihan[]" value="' . $row->id . '">' . $row->kode_kavling . '</td>';
                $data['html'] .= '<td>' . $row->nama_pemilik . '</td>';
                $data['html'] .= '<td>Rp ' . number_format($row->saldo_awal,0,',','.') . '</td>';
                $data['html'] .= '<td>Rp ' . number_format($row->total_tagihan,0,',','.') . '</td>';
                $data['html'] .= '<td>Rp ' . number_format($row->saldo_akhir,0,',','.') . '</td>';
                $data['html'] .= '</tr>';
            }
        }
        return $this->output
        ->set_content_type('application/json')
        ->set_status_header($data['status'])
        ->set_output(json_encode($data));
        
    }
    public function cetak(){
        // print_r($_POST);
        $bulan = get_bulan_periode($_POST['bulan']);
        $pdf = new FPDF('P', 'mm', 'A5');
        $pdf->SetAutoPageBreak(true, 5);
        foreach($_POST['centang'] as $centang){
            // print_r($centang);
            // die();
            $pdf->AddPage();
            $pdf->SetFont('Arial', 'I', 14);
            $pdf->Cell(38, 7, 'KUSUMA ESTATE', 0, 1,'L');
            $pdf->SetFont('Arial', '', 11);
            $pdf->Cell(38, 6, '0341-597901', 0, 1,'L');
            $pdf->Cell(38, 6, 'TAGIHAN UNTUK BULAN '.$bulan.'/'.$_POST['tahun'], 0, 1,'L');
            $pdf->Line(10, 30, $pdf->GetPageWidth()-10, 30);
            $pdf->Cell(38, 4, '', 0, 1,'L');
            //ISI
            $dt_tagihan = $this->m_nota->detail_tagihan($centang);
            if(count((array)$dt_tagihan['datanya'])>0){
                $pdf->Cell(30, 6, 'No. Kavling', 0, 0,'L');
                $pdf->Cell(7, 6, ':', 0, 0,'L');
                $pdf->Cell(30, 6, $dt_tagihan['datanya']->kode_kavling, 0, 1,'L');
                $pdf->Cell(30, 6, 'Nama', 0, 0,'L');
                $pdf->Cell(7, 6, ':', 0, 0,'L');
                $pdf->Cell(30, 6, $dt_tagihan['datanya']->nama_pemilik, 0, 1,'L');
                $pdf->Cell(30, 6, 'Telepon/HP', 0, 0,'L');
                $pdf->Cell(7, 6, ':', 0, 0,'L');
                $pdf->Cell(30, 6, $dt_tagihan['datanya']->telp_pemilik, 0, 1,'L');
                $pdf->Cell(30, 6, 'Saldo Awal', 0, 0,'L');
                $pdf->Cell(7, 6, ':', 0, 0,'L');
                $pdf->Cell(30, 6,'Rp '.number_format($dt_tagihan['datanya']->saldo_awal,0,',','.'), 0, 1,'L');
                //PEMBAYARAN
                $pdf->Cell(30, 6, 'Pembayaran', 0, 1,'L');
                    $pdf->Cell(4, 6, '', 0, 0,'R');//bohongan
                    $pdf->Cell(40, 6, 'Tunai', 0, 0,'L');
                    $pdf->Cell(40, 6, ':', 0, 0,'C');
                    $pdf->Cell(45, 6,'Rp '.number_format($dt_tagihan['datanya']->payment_tunai,0,',','.'), 0, 1,'R');
                    $pdf->Cell(4, 6, '', 0, 0,'R');//bohongan
                    $pdf->Cell(40, 6, 'Transfer', 0, 0,'L');
                    $pdf->Cell(40, 6, ':', 0, 0,'C');
                    $pdf->Cell(45, 6, 'Rp '.number_format($dt_tagihan['datanya']->payment_tf,0,',','.'), 0, 1,'R');
                // PEMAKAIAN
                $pdf->Cell(30, 6, 'Pemakaian', 0, 1,'L');
                    $pdf->Cell(4, 6, '', 0, 0,'R');//bohongan
                    $pdf->Cell(40, 6, 'Telepon', 0, 0,'L');
                    $pdf->Cell(40, 6, ':', 0, 0,'C');
                    $pdf->Cell(45, 6, 'Rp '.number_format($dt_tagihan['datanya']->biaya_telp,0,',','.'), 0, 1,'R');
                    $pdf->Cell(4, 6, '', 0, 0,'R');//bohongan
                    $pdf->Cell(40, 6, 'Listrik', 0, 0,'L');
                    $pdf->Cell(40, 6, ':', 0, 0,'C');
                    $pdf->Cell(45, 6, 'Rp '.number_format($dt_tagihan['datanya']->biaya_listrik,0,',','.'), 0, 1,'R');
                    $pdf->Cell(4, 6, '', 0, 0,'R');//bohongan
                    $pdf->Cell(40, 6, 'Administrasi', 0, 0,'L');
                    $pdf->Cell(40, 6, ':', 0, 0,'C');
                    $pdf->Cell(45, 6, 'Rp '.number_format($dt_tagihan['datanya']->biaya_admin,0,',','.'), 0, 1,'R');
                    $pdf->Cell(4, 6, '', 0, 0,'R');//bohongan
                    $pdf->Cell(40, 6, 'Air', 0, 0,'L');
                    $pdf->Cell(40, 6, ':', 0, 0,'C');
                    $pdf->Cell(45, 6, 'Rp '.number_format($dt_tagihan['datanya']->biaya_air,0,',','.'), 0, 1,'R');
                        $pdf->Cell(8, 6, '', 0, 0,'R');//bohongan
                        $pdf->Cell(36, 6, 'Meteran Bulan Lalu', 0, 0,'L');
                        $pdf->Cell(40, 6, ':', 0, 0,'C');
                        $pdf->Cell(45, 6, $dt_tagihan['datanya']->meteran_air_prev, 0, 1,'R');
                        $pdf->Cell(8, 6, '', 0, 0,'R');//bohongan
                        $pdf->Cell(36, 6, 'Meteran Bulan Ini', 0, 0,'L');
                        $pdf->Cell(40, 6, ':', 0, 0,'C');
                        $pdf->Cell(45, 6, $dt_tagihan['datanya']->meteran_air_now, 0, 1,'R');
                        $pdf->Cell(8, 6, '', 0, 0,'R');//bohongan
                        $pdf->Cell(36, 6, 'Meteran Pemakaian', 0, 0,'L');
                        $pdf->Cell(40, 6, ':', 0, 0,'C');
                        $pdf->Cell(45, 6, $dt_tagihan['datanya']->jml_pemakaian_air, 0, 1,'R');
                    $pdf->Cell(4, 6, '', 0, 0,'R');//bohongan
                    $pdf->Cell(40, 6, 'Taman', 0, 0,'L');
                    $pdf->Cell(40, 6, ':', 0, 0,'C');
                    $pdf->Cell(45, 6, 'Rp '.number_format($dt_tagihan['datanya']->biaya_taman,0,',','.'), 0, 1,'R');
                    $pdf->Cell(4, 6, '', 0, 0,'R');//bohongan
                    $pdf->Cell(40, 6, 'Fasilitas Umum', 0, 0,'L');
                    $pdf->Cell(40, 6, ':', 0, 0,'C');
                    $pdf->Cell(45, 6, 'Rp '.number_format($dt_tagihan['datanya']->biaya_fasum,0,',','.'), 0, 1,'R');
                    $pdf->Cell(4, 6, '', 0, 0,'R');//bohongan
                    $pdf->Cell(40, 6, 'Keamanan', 0, 0,'L');
                    $pdf->Cell(40, 6, ':', 0, 0,'C');
                    $pdf->Cell(45, 6, 'Rp '.number_format($dt_tagihan['datanya']->biaya_keamanan,0,',','.'), 0, 1,'R');
                    $pdf->Cell(4, 6, '', 0, 0,'R');//bohongan
                    $pdf->Cell(40, 6, 'Sampah', 0, 0,'L');
                    $pdf->Cell(40, 6, ':', 0, 0,'C');
                    $pdf->Cell(45, 6, 'Rp '.number_format($dt_tagihan['datanya']->biaya_sampah,0,',','.'), 0, 1,'R');
                    $pdf->Cell(4, 6, '', 0, 0,'R');//bohongan
                    $pdf->Cell(40, 6, 'Biaya Lain-lain', 0, 0,'L');
                    $pdf->Cell(40, 6, ':', 0, 0,'C');
                    $pdf->Cell(45, 6, 'Rp '.number_format($dt_tagihan['datanya']->biaya_lain,0,',','.'), 0, 1,'R');
                // KOREKSI    
                $pdf->Cell(44, 6, 'Koreksi', 0, 0,'L');
                $pdf->Cell(40, 6, ':', 0, 0,'C');
                $pdf->Cell(45, 6, 'Rp '.number_format($dt_tagihan['datanya']->koreksi,0,',','.'), 0, 1,'R');
                $pdf->Cell(44, 6, 'Tagihan Bulan Ini', 0, 0,'L');
                $pdf->Cell(40, 6, ':', 0, 0,'C');
                $pdf->Cell(45, 6, 'Rp '.number_format($dt_tagihan['datanya']->total_tagihan,0,',','.'), 0, 1,'R');
                $pdf->Cell(44, 6, 'Saldo Akhir', 0, 0,'L');
                $pdf->Cell(40, 6, ':', 0, 0,'C');
                $pdf->Cell(45, 6, 'Rp '.number_format($dt_tagihan['datanya']->saldo_akhir,0,',','.'), 0, 1,'R');
                $pdf->SetFont('Arial', '', 9);
                $kata = "BCA a/n PT.KUSUMA GRAHAJAYATRISNA "."\r\n"."Rek : 0193789789 \r\nMohon diberi keterangan Nomor Kavling \r\nContact : 0341-599036 / WA : 08883300540";
                $pdf->MultiCell(128, 4, $kata,1);
                $pdf->SetFont('Arial', 'I', 9);
                $pdf->Cell(128,5,'Printed On : '.date('d/m/Y'),0,1,'R');

            }
        }
        
        $pdf->output();
    }
}