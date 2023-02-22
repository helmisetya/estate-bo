<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Form Tagihan</h3>
      </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12  ">
        <div class="x_panel">
          <div class="x_title">
            <!-- <h2>Plain Page</h2> -->
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <div id="loading-modal" style="display: none;">
                <div class="swal2-icon swal2-spinner swal2-animate-spin" style="display: block;"></div>
                <div class="swal2-content">Loading...</div>
            </div>
           <form id="frm_tagihan">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>No Transaksi</label>
                            <input class="form-control" id="txt_noTransaksi" type="text" name="no_transaksi" value="<?= $tagihan->no_transaksi; ?>"required readonly>
                            <input type="hidden" name="periode" id="hide_periode" value="<?= $tagihan->periode ?>">
                            <input type="hidden" name="status" id="hide_status" value="<?= $tagihan->status ?>">
                            <input type="hidden" name="id_transaksi" id="hide_id" value="<?= $tagihan->id ?>">
                            <?php 
                            $text_status = 'Tagihan belum di buat';
                            switch($tagihan->status){
                                case 1:
                                    $text_status = 'Tagihan sudah di buat';
                                break;
                                case 2:
                                    $text_status = 'Tagihan sudah di tagihkan';
                                break;
                                case 2:
                                    $text_status = 'Tagihan sudah di bayar / Selesai';
                                break;
                            }
                            ?>
                            <small>Status : <?= $text_status?></small>
                        </div>
                    </div>  
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Nama Kavling</label>
                            <input class="form-control" id="txt_nama_kavling" type="text" name="no_kav" value="<?= $tagihan->kode_kavling; ?>" required readonly>
                        </div>
                    </div>
                    
                    <div class="col-md-2">
                        <div class="form-group">
                            <label>Tanggal Bayar</label>
                            <input class="form-control" id="txt_tglBayar" type="date" name="tgl_bayar" required>
                            
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Saldo Awal</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp </span>
                                </div>
                                <input class="form-control money" id="txt_saldo_awal" value="<?= $tagihan->saldo_awal; ?>" type="text" name="saldo_awal" readonly>
                            </div>
                        </div>
                    </div>  
                </div>
                <hr>
                <p>
                <h5> Pemakaian </h5>
                </p>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Biaya Telp</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp </span>
                                </div>
                                <input class="form-control money" id="txt_biaya_telp" value="<?= $tagihan->biaya_telp ?>" onchange="calc_total_tagihan()" type="text" name="biaya_telp">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Biaya Listrik</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp </span>
                                </div>
                                <input class="form-control money" id="txt_biaya_listrik" value="<?= $tagihan->biaya_listrik ?>" onchange="calc_total_tagihan()" type="text" name="biaya_listrik">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Administrasi</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp </span>
                                </div>
                                <input class="form-control money" id="txt_biaya_admin" value="<?= $tagihan->biaya_admin ?>" onchange="calc_total_tagihan()" type="text" name="biaya_admin">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Biaya Taman</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp </span>
                                </div>
                                <input class="form-control money" id="txt_biaya_taman" value="<?= $tagihan->biaya_taman ?>" onchange="calc_total_tagihan()" type="text" name="biaya_taman">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Biaya Fasilitas Umum</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp </span>
                                </div>
                                <input class="form-control money" id="txt_biaya_fasum" value="<?= $tagihan->biaya_fasum?>" onchange="calc_total_tagihan()" type="text" name="biaya_fasum">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Biaya Keamanan</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp </span>
                                </div>
                                <input class="form-control money" id="txt_biaya_keamanan" value="<?= $tagihan->biaya_keamanan ?>" onchange="calc_total_tagihan()" type="text" name="biaya_keamanan">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Biaya Sampah</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp </span>
                                </div>
                                <input class="form-control money" id="txt_biaya_sampah" value="<?= $tagihan->biaya_sampah?>" onchange="calc_total_tagihan()" type="text" name="biaya_sampah">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Biaya PBB</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp </span>
                                </div>
                                <input class="form-control money" id="txt_biaya_pbb" value="<?= $tagihan->biaya_pbb ?>" onchange="calc_total_tagihan()" type="text" name="biaya_pbb">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Biaya Lain-lain</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp </span>
                                </div>
                                <input class="form-control money" id="txt_biaya_lain" value="<?= $tagihan->biaya_lain ?>" onchange="calc_total_tagihan()" type="text" name="biaya_lain">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Koreksi</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp </span>
                                </div>
                                <input class="form-control money" id="txt_biaya_koreksi" value="<?= $tagihan->koreksi ?>" onchange="calc_total_tagihan()" type="text" name="biaya_koreksi">
                                <!-- <input type="checkbox" class="form-control" name="minus" id="chk_minus">Minus -->
                                
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1">
                        <div class="form-group">
                        <label>Minus</label><br>
                        <input type="checkbox" id="chk_minus" value="<?= $tagihan->minus ?>" onchange="calc_total_tagihan()" name="minus" data-width="70" data-toggle="toggle" data-on="Ya" data-off="Tidak" data-onstyle="success" data-offstyle="danger"> 
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label>Metaran Air Bulan Lalu</label>
                            <div class="input-group mb-3">
                                <input class="form-control" id="txt_meteran_air_prev" value="<?= $tagihan->meteran_air_prev ?>" onchange="calc_tarif_air()" type="text" name="meterain_air_prev">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label>Metaran Air Bulan Ini</label>
                            <div class="input-group mb-3">
                                <input class="form-control" id="txt_meteran_air_now" type="text" value="<?= $tagihan->meteran_air_now ?>" onchange="calc_tarif_air()" name="meterain_air_now">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label>Penggunaan Air</label>
                            <div class="input-group mb-3">
                                <input class="form-control" id="txt_penggunaan_air" value="<?= $tagihan->jml_pemakaian_air ?>" type="text" name="penggunaan_air">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Biaya Air</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp </span>
                                </div>
                                <input class="form-control money" id="txt_biaya_air" value="<?= $tagihan->biaya_air ?>" type="text" name="biaya_air">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Keterangan</label>
                            <textarea class="form-control" id="txt_keterangan" name="keterangan"></textarea>
                        </div>
                    </div>
                </div>
                <hr>
                <p>
                <h5> Pembayaran </h5>
                </p>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Tunai</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp </span>
                                </div>
                                <input class="form-control money" id="txt_tunai" type="text" onchange= "calc_pembayaran();" name="tunai">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Transfer</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp </span>
                                </div>
                                <input class="form-control money" id="txt_tf" onchange= "calc_pembayaran();" type="text" name="tf">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Total Tagihan</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp </span>
                                </div>
                                <input class="form-control money" id="txt_total" value="<?= $tagihan->total_tagihan ?>" type="text" name="total">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Saldo Akhir</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp </span>
                                </div>
                                <input class="form-control money" id="txt_saldo_akhir" value="<?= $tagihan->saldo_akhir ?>" type="text" name="saldo_akhir">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12" align="right">
                        <button type="button" class="btn btn-primary" onclick="simpan()"><span class="fa fa-save"></span> Simpan</button>
                    </div>
                </row>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
    var baseUrl = $('#valBaseUrl').val();
    var pembayaran = 0;
    var saldo_akhir = 0;
    var total_tagihan = 0;
    const loadingModal = Swal.mixin({
            backdrop: 'rgba(0,0,0,0.5)',
            allowOutsideClick: false,
            allowEscapeKey: false,
            didOpen: () => {
                Swal.showLoading();
            }
    });

    $(document).ready(function() {
        $("#txt_saldo_awal").maskMoney('mask')
        $("#txt_biaya_telp").maskMoney('mask')
        $("#txt_biaya_listrik").maskMoney('mask')
        $("#txt_biaya_admin").maskMoney('mask')
        $("#txt_biaya_taman").maskMoney('mask')
        $("#txt_biaya_fasum").maskMoney('mask')
        $("#txt_biaya_sampah").maskMoney('mask')
        $("#txt_biaya_keamanan").maskMoney('mask')
        $("#txt_biaya_pbb").maskMoney('mask')
        $("#txt_biaya_lain").maskMoney('mask')
        $("#txt_total").maskMoney('mask')
        $("#txt_saldo_akhir").maskMoney('mask')
    })
    function calc_total_tagihan(){
        var saldo_awal = parseFloat($("#txt_saldo_awal").maskMoney('unmasked')[0]);
        
        var b_telp = parseFloat($("#txt_biaya_telp").maskMoney('unmasked')[0]);
        var b_listrik = parseFloat($("#txt_biaya_listrik").maskMoney('unmasked')[0]);
        var b_admin = parseFloat($("#txt_biaya_admin").maskMoney('unmasked')[0]);
        var b_taman = parseFloat($("#txt_biaya_taman").maskMoney('unmasked')[0]);
        var b_fasum = parseFloat($("#txt_biaya_fasum").maskMoney('unmasked')[0]);
        var b_keamanan = parseFloat($("#txt_biaya_keamanan").maskMoney('unmasked')[0]);
        var b_sampah = parseFloat($("#txt_biaya_sampah").maskMoney('unmasked')[0]);
        var b_pbb = parseFloat($("#txt_biaya_pbb").maskMoney('unmasked')[0]);
        var b_lain = parseFloat($("#txt_biaya_lain").maskMoney('unmasked')[0]);
        var b_air = $("#txt_biaya_air").val() ? parseFloat($("#txt_biaya_air").maskMoney('unmasked')[0]) : 0;
        total_tagihan = b_telp + b_listrik + b_admin + b_taman + b_fasum + b_keamanan + b_sampah + b_pbb + b_lain +b_air;
        console.log('tagihan = '+total_tagihan)
        $('#txt_total').val(parseInt(total_tagihan))
        $("#txt_total").maskMoney('mask')

        calc_saldo_akhir();
    }
    function calc_tarif_air(){
        var meter_prev = $('#txt_meteran_air_prev').val()
        var meter_now = $('#txt_meteran_air_now').val()
        var penggunaan =  meter_now - meter_prev;
        var tarif = 0;
        $('#txt_penggunaan_air').val(penggunaan)

        if(penggunaan <=10){
            console.log('kurang dari == 10')
            tarif = penggunaan * 880 
        }else if(penggunaan <= 20){
            console.log('kurang dari == 20')
            tarif = 10 * 880;
            tarif += (penggunaan - 10 ) * 1550
        }else if(penggunaan <= 30){
            console.log('kurang dari == 30')
            tarif = 10 * 880;
            tarif += 10 * 1550;
            tarif += (penggunaan - 20 ) * 1880
        }else{
            console.log('lebih dari == 30')
            tarif = 10 * 880;
            tarif += 10 * 1550;
            tarif += 10 * 1880;
            tarif += (penggunaan - 30 ) * 2870
        }
        tarif += 3000;
        $('#txt_biaya_air').val(parseInt(tarif))
        $("#txt_biaya_air").maskMoney('mask')

        calc_total_tagihan();
    }
    function calc_saldo_akhir(){
        var saldo_awal = parseFloat($("#txt_saldo_awal").maskMoney('unmasked')[0])
        var koreksi = parseFloat($("#txt_biaya_koreksi").maskMoney('unmasked')[0])
        var chk = document.getElementById("chk_minus")

        if(chk.checked == true){
            koreksi = koreksi * -1
        }
        if(saldo_awal < 0){
            saldo_akhir = saldo_awal + total_tagihan - pembayaran
        }else{
            saldo_akhir = saldo_awal - total_tagihan + pembayaran
        }
        saldo_akhir += koreksi 
        $('#txt_saldo_akhir').val(parseInt(saldo_akhir))
        $("#txt_saldo_akhir").maskMoney('mask')
    }
    function calc_pembayaran(){
        var byr_tunai = parseFloat($("#txt_tunai").maskMoney('unmasked')[0]);
        var byr_tf = parseFloat($("#txt_tf").maskMoney('unmasked')[0]);

        pembayaran = byr_tunai + byr_tf;
        calc_saldo_akhir();
    }
    function simpan(){
        Swal.fire({
            title: 'Apakah anda yakin ingin menyimpan data ini?',
            // text: "",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Simpan!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: baseUrl + '/tagihan/transaksi/update',
                    method: 'POST',
                    dataType: 'json',
                    data: $("#frm_tagihan").serialize(),
                    beforeSend : function(){
                        loadingModal.fire()
                    },
                    success:function(data){
                        if(data.status == 200){
                            Swal.fire('Sukses!', data.msg, 'success').then((close) => {
                                    // location.reload()
                                    window.location.href = baseUrl +'/tagihan/transaksi'
                                })
                        }else{
                            Swal.fire('Error!', data.msg, 'error').then((close) => {
                                location.reload()
                            })
                        }
                     
                    },
                    error: function(err) {
                      console.log(err)
                      Swal.fire('Error!', err.responseJSON.msg, 'error')
                    }
                })
            }
        })
    }
</script>