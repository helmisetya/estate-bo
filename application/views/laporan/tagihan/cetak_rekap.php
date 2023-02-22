<html>

<head>
    <title>
        REKAP TAGIHAN
    </title>
</head>
<body>
    <div class="row">
        <div class="col-md">
            <table class="form-control" width="100%">
                <tr>
                    <td rowspan="4" style="width:130px;"><img src="<?= base_url()?>/assets/build/images/kag.png" max-width="130px"></td>
                    <td>PT KUSUMANTARA GRAHA JAYATRISNA</td>
                </tr>
                <tr>
                <td>JL. ABDUL GANI ATAS BATU - MALANG</td>
                </tr>
                <tr>
                <td><b>LAPORAN PROGRAM REKENING<b></td>
                </tr>
                <tr>
                <td>Periode : <?= $periode; ?></td>
                </tr>
            </table>
            <br>
            <table>
            <thead>
                <tr>
                    <th>No.</th>
                    <th>No. Kav</th>
                    <th>Nama Cust</th>
                    <th>Awal</th>
                    <th>Telp</th>
                    <th>Lstrk</th>
                    <th>Air</th>
                    <th>MeterL</th>
                    <th>MeterS</th>
                    <th>MeterP</th>
                    <th>Adm</th>
                    <th>PBB</th>
                    <th>Taman</th>
                    <th>Fasum</th>
                    <th>Sampah</th>
                    <th>Lain-lain</th>
                    <th>Koreksi</th>
                    <th>Tunai</th>
                    <th>Transfer</th>
                    <th>Akhir</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $a=1;
                $sum_awal = 0;
                $sum_telp = 0;
                $sum_lstrk = 0;
                $sum_air = 0;
                $sum_meterL = 0;
                $sum_meterS = 0;
                $sum_meterP = 0;
                $sum_adm =0;
                $sum_pbb =0;
                $sum_taman = 0;
                $sum_fasum = 0;
                $sum_sampah = 0;
                $sum_lain = 0;
                $sum_koreksi = 0;
                $sum_tunai = 0;
                $sum_tf = 0;
                $sum_akhir = 0;
                $total_deposit = 0;
                $total_piutang = 0;
                foreach($tagihan as $row){
                    $sum_awal +=$row->saldo_awal;
                    $sum_telp += $row->biaya_telp;
                    $sum_lstrk += $row->biaya_listrik;
                    $sum_air += $row->biaya_air;
                    $sum_meterL += $row->meteran_air_prev;
                    $sum_meterS += $row->meteran_air_now;
                    $sum_meterP += $row->jml_pemakaian_air;
                    $sum_adm += $row->biaya_admin;
                    $sum_taman += $row->biaya_taman;
                    $sum_pbb += $row->biaya_pbb;
                    // $sum_taman += $row->biaya_taman;
                    $sum_fasum += $row->biaya_fasum;
                    $sum_sampah += $row->biaya_sampah;
                    $sum_lain += $row->biaya_lain;
                    $sum_koreksi += $row->koreksi;
                    $sum_tunai += $row->payment_tunai;
                    $sum_tf += $row->payment_tf;
                    $sum_akhir += $row->saldo_akhir;
                    
                    if($row->saldo_awal > 0){
                        $total_deposit+=$row->saldo_awal;
                    }else if($row->saldo_awal <0){
                        $total_piutang+=$row->saldo_awal;
                    }
                    ?>
                    <tr>
                        <td><?= $a++; ?></td>
                        <td><?= $row->kode_kavling ?></td>
                        <td><?= substr($row->nama_pemilik,0,15)?></td>
                        <td align="right"><?= number_format($row->saldo_awal,0,',','.') ?></td>
                        <td align="right"><?= number_format($row->biaya_telp,0,',','.') ?></td>
                        <td align="right"><?= number_format($row->biaya_listrik,0,',','.') ?></td>
                        <td align="right"><?= number_format($row->biaya_air,0,',','.') ?></td>
                        <td align="right"><?= $row->meteran_air_prev ?></td>
                        <td align="right"><?= $row->meteran_air_now ?></td>
                        <td align="right"><?= $row->jml_pemakaian_air ?></td>
                        <td align="right"><?= number_format($row->biaya_admin,0,',','.') ?></td>
                        <td align="right"><?= number_format($row->biaya_pbb,0,',','.') ?></td>
                        <td align="right"><?= number_format($row->biaya_taman,0,',','.') ?></td>
                        <td align="right"><?= number_format($row->biaya_fasum,0,',','.') ?></td>
                        <td align="right"><?= number_format($row->biaya_sampah,0,',','.') ?></td>
                        <td align="right"><?= number_format($row->biaya_lain,0,',','.') ?></td>
                        <td align="right"><?= number_format($row->koreksi,0,',','.') ?></td>
                        <td align="right"><?= number_format($row->payment_tunai,0,',','.') ?></td>
                        <td align="right"><?= number_format($row->payment_tf,0,',','.') ?></td>
                        <td align="right"><?= number_format($row->saldo_akhir,0,',','.') ?></td>
                    </tr>     
                <?php } 
                ?>
                <tr>
                    <td colspan="3">Total</td>
                    <td align="right"><?= number_format($sum_awal,0,',','.')?></td>
                    <td align="right"><?= number_format($sum_telp,0,',','.')?></td>
                    <td align="right"><?= number_format($sum_lstrk,0,',','.')?></td>
                    <td align="right"><?= number_format($sum_air,0,',','.')?></td>
                    <td align="right"><?= number_format($sum_meterL,0,',','.')?></td>
                    <td align="right"><?= number_format($sum_meterS,0,',','.')?></td>
                    <td align="right"><?= number_format($sum_meterP,0,',','.')?></td>
                    <td align="right"><?= number_format($sum_adm,0,',','.')?></td>
                    <td align="right"><?= number_format($sum_pbb,0,',','.')?></td>
                    <td align="right"><?= number_format($sum_taman,0,',','.')?></td>
                    <td align="right"><?= number_format($sum_fasum,0,',','.')?></td>
                    <td align="right"><?= number_format($sum_sampah,0,',','.')?></td>
                    <td align="right"><?= number_format($sum_lain,0,',','.')?></td>
                    <td align="right"><?= number_format($sum_koreksi,0,',','.')?></td>
                    <td align="right"><?= number_format($sum_tunai,0,',','.')?></td>
                    <td align="right"><?= number_format($sum_tf,0,',','.')?></td>
                    <td align="right"><?= number_format($sum_akhir,0,',','.')?></td>
                </tr>

            </tbody>        
            </table>
            <p><h6>Keterangan : <br>
            Total Deposit : Rp <?= number_format($total_deposit,0,',','.')?> <br>
            Total Piutang  : Rp <?= number_format($total_piutang,0,',','.')?> <h6></p>
        </div>
        
    </div>
</body>
</html>