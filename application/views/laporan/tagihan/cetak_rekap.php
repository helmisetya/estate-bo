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
                <td><b>LAPORAN REKENING AIR<b></td>
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
                foreach($tagihan as $row){?>
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
            </tbody>        
            </table>
        </div>
        
    </div>
</body>
</html>