<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once(BASEPATH . 'libraries\fpdf\fpdf.php');

class rekap extends CI_Controller
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
        $this->load->model('laporan/tagihan/m_rekap');
        $this->load->helper('bulan_tahun');
        $this->load->model('global_model');
    }
    public function index(){
        $data['bulan'] = show_bulan();
        $data['tahun'] = show_tahun();

        $this->load->view('header');
        $this->load->view('laporan/tagihan/v_rekap',$data);
        $this->load->view('footer');
    }
    public function cetak(){
        $bulan = get_bulan_periode($_POST['bulan']);
        $periode = $bulan.'/'.$_POST['tahun'];
        $dt_tagihan = $this->m_rekap->tag_perperiode($periode);
        $data['periode'] = $periode;
        $data['tagihan'] = $dt_tagihan['datanya'];
        $newMpdf = new \Mpdf\Mpdf();
        $newMpdf = new \Mpdf\Mpdf(['orientation' => 'L']);
        $data_print = $this->load->view('laporan/tagihan/cetak_rekap', $data, TRUE);
        $chunks = str_split($data_print,5000);
        foreach($chunks as $chunk){
            $newMpdf->WriteHTML($chunk);
        }
        
        $newMpdf->Output();
    }
    public function cetak_fpdf(){
        $bulan = get_bulan_periode($_POST['bulan']);
        $periode = $bulan.'/'.$_POST['tahun'];
        $dt_tagihan = $this->m_rekap->tag_perperiode($periode);
        $pdf = new FPDF('L', 'mm', 'A4');
        $pdf->SetAutoPageBreak(true,3);
        $pdf->AddPage();
        $pdf->Cell(1, 10, '', 0, 0, '', false);//bohongan
        $url_image = base_url()."/assets/build/images/kag.png";
        $pdf->Image($url_image, $pdf->GetX(), $pdf->GetY(), 40);
        $pdf->SetFont('Arial', '', 13);
        $pdf->Cell(42, 10, '', 0, 0, '', false);//bohongan
        $pdf->Cell(38, 7, 'PT KUSUMANTARA GRAHA JAYATRISNA', 0, 1,'L');
        $pdf->Cell(42, 10, '', 0, 0, '', false);//bohongan
        $pdf->Cell(38, 7, 'JL. ABDUL GANI ATAS BATU - MALANG', 0, 1,'L');
        $pdf->SetFont('Arial', 'B', 14);
        $pdf->Cell(42, 10, '', 0, 0, '', false);//bohongan
        $pdf->Cell(38, 7, 'LAPORAN REKENING AIR', 0, 1,'L');
        $pdf->SetFont('Arial', '', 13);
        $pdf->Cell(42, 10, '', 0, 0, '', false);//bohongan
        $pdf->Cell(38, 7, 'Periode '.$periode, 0, 1,'L');
        $pdf->Line(10, 40, $pdf->GetPageWidth()-10, 40);
        $pdf->SetFont('Arial', '', 13);
        // HEADER TABLE
        $pdf->Cell(10, 7, '', 0, 1,'L');
        $pdf->Cell(10, 7, 'No ', 1, 0,'L');
        $pdf->Cell(27, 7, 'No Kav', 1, 0,'L');
        $pdf->Cell(30, 7, 'Nama Cust', 1, 0,'L');
        $pdf->Cell(20, 7, 'Awal', 1, 0,'R');
        $pdf->Cell(15, 7, 'B. Telp', 1, 0,'R');
        $pdf->Cell(25, 7, 'B. Lstrk', 1, 0,'R');
        $pdf->Cell(25, 7, 'B. Air', 1, 0,'R');
        $pdf->Cell(25, 7, 'MeterL', 1, 0,'R');
        $pdf->Cell(25, 7, 'MeterS', 1, 0,'R');
        $pdf->Cell(25, 7, 'MeterP', 1, 0,'R');
        $pdf->Cell(25, 7, 'B. Adm', 1, 0,'R');
        $pdf->Cell(25, 7, 'PBB', 1, 0,'R');
        $pdf->Cell(25, 7, 'Keamanan', 1, 0,'R');
        $pdf->Cell(25, 7, 'Taman', 1, 0,'R');
        $pdf->Cell(25, 7, 'Fasum', 1, 0,'R');
        $pdf->Cell(25, 7, 'Sampah', 1, 0,'R');
        $pdf->Cell(25, 7, 'Lain-lain', 1, 0,'R');
        $pdf->Cell(25, 7, 'Koreksi', 1, 0,'R');
        $pdf->Cell(25, 7, 'Tunai', 1, 0,'R');
        $pdf->Cell(25, 7, 'Transfer', 1, 0,'R');
        $pdf->Cell(25, 7, 'Akhir', 1, 1,'R');

        $urutan = 1;
        $pdf->SetFont('Arial', '', 12);
        foreach($dt_tagihan['datanya'] as $row){

            $pdf->Cell(10, 7, $urutan, 1, 0,'L');
            $pdf->Cell(27, 7, substr($row->kode_kavling, 0, 12), 1, 0,'L');
            $pdf->Cell(30, 7, substr($row->nama_pemilik, 0, 12), 1, 0,'L');
            $pdf->Cell(27, 7, $row->saldo_awal, 1, 1,'L');

            $urutan++;
        }
        $pdf->output();
    }
}