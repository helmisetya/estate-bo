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
           <form id="frm_new">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>No Transaksi</label>
                            <input class="form-control" id="txt_noTransaksi" type="text" name="no_transaksi" required readonly>
                            <input type="hidden" name="periode" id="hide_periode">
                        </div>
                    </div>  
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Nama Kavling</label>
                            <select name="no_kav" id="sel_no_kav" onchange="generate_noTransaksi(); load_last_tagihan(); " class="form-control select2bs4" style="width: 100%;" required>
                                <option value="0">--Pilih--</option>
                                <?php 
                                foreach($kav_tagihan as $row){ ?>
                                    <option data-textKav="<?= $row->kode_kavling ?>" value="<?= $row->id?>"><?= $row->kode_kavling.' - '.$row->nama_pemilik; ?></option>
                                <?php }
                                ?>
                            </select>
                            
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
                                <input class="form-control money" id="txt_saldo_awal" type="text" name="saldo_awal" readonly>
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
                                <input class="form-control money" id="txt_biaya_telp" onchange="calc_total_tagihan()" type="text" name="biaya_telp">
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
                                <input class="form-control money" id="txt_biaya_listrik" onchange="calc_total_tagihan()" type="text" name="biaya_listrik">
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
                                <input class="form-control money" id="txt_biaya_admin" onchange="calc_total_tagihan()" type="text" name="biaya_admin">
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
                                <input class="form-control money" id="txt_biaya_taman" onchange="calc_total_tagihan()" type="text" name="biaya_taman">
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
                                <input class="form-control money" id="txt_biaya_fasum" onchange="calc_total_tagihan()" type="text" name="biaya_fasum">
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
                                <input class="form-control money" id="txt_biaya_keamanan" onchange="calc_total_tagihan()" type="text" name="biaya_keamanan">
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
                                <input class="form-control money" id="txt_biaya_sampah" onchange="calc_total_tagihan()" type="text" name="biaya_sampah">
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
                                <input class="form-control money" id="txt_biaya_pbb" onchange="calc_total_tagihan()" type="text" name="biaya_pbb">
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
                                <input class="form-control money" id="txt_biaya_lain" onchange="calc_total_tagihan()" type="text" name="biaya_lain">
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
                                <input class="form-control money" id="txt_biaya_koreksi" onchange="calc_total_tagihan()" type="text" name="biaya_koreksi">
                                <!-- <input type="checkbox" class="form-control" name="minus" id="chk_minus">Minus -->
                                
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1">
                        <div class="form-group">
                        <label>Minus</label><br>
                        <input type="checkbox" id="chk_minus" onchange="calc_total_tagihan()" name="minus" data-width="70" data-toggle="toggle" data-on="Ya" data-off="Tidak" data-onstyle="success" data-offstyle="danger"> 
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label>Metaran Air Bulan Lalu</label>
                            <div class="input-group mb-3">
                                <input class="form-control" id="txt_meteran_air_prev" onchange="calc_tarif_air()" type="text" name="meterain_air_prev">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label>Metaran Air Bulan Ini</label>
                            <div class="input-group mb-3">
                                <input class="form-control" id="txt_meteran_air_now" type="text" onchange="calc_tarif_air()" name="meterain_air_now">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label>Penggunaan Air</label>
                            <div class="input-group mb-3">
                                <input class="form-control" id="txt_penggunaan_air" type="text" name="penggunaan_air">
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
                                <input class="form-control money" id="txt_biaya_air" type="text" name="biaya_air">
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
                                <input class="form-control money" id="txt_total" type="text" name="total">
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
                                <input class="form-control money" id="txt_saldo_akhir" type="text" name="saldo_akhir">
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
    var body = $('body');
    var pembayaran = 0;
    var saldo_akhir = 0;
    var total_tagihan = 0;

    body.on('change','#txt_tglBayar',function(e){
        generate_noTransaksi()
    })

    function padTo2Digits(num) {
        return num.toString().padStart(2, '0');
    }
    function generate_noTransaksi(){
        console.log("tess")
        var tgl = new Date($('#txt_tglBayar').val());
        // console.log('tgl')
        // console.log(tgl)
        var txtBulan = padTo2Digits(tgl.getMonth() + 1);
        console.log('bulan')
        console.log(txtBulan)
        var txtTahun = tgl.getFullYear();
        var periode = txtBulan + '/' + txtTahun;
        $('#hide_periode').val(periode);

        var kav = $("#sel_no_kav option:selected").attr('data-textKav')
        if(kav != '' && periode != 'NaN/NaN'){
            $('#txt_noTransaksi').val('INV-TG-'+periode+kav)
        }
    }
    function fill_tagihan(data){
        $('#txt_saldo_awal').val(parseInt(data.saldo_akhir))
        $("#txt_saldo_awal").maskMoney('mask')

        $('#txt_biaya_telp').val(parseInt(data.biaya_telp))
        $("#txt_biaya_telp").maskMoney('mask')
        
        $('#txt_biaya_listrik').val(parseInt(data.biaya_listrik))
        $("#txt_biaya_listrik").maskMoney('mask')
        
        $('#txt_biaya_admin').val(parseInt(data.biaya_admin))
        $("#txt_biaya_admin").maskMoney('mask')

        $('#txt_biaya_taman').val(parseInt(data.biaya_taman))
        $("#txt_biaya_taman").maskMoney('mask')

        $('#txt_biaya_fasum').val(parseInt(data.biaya_fasum))
        $("#txt_biaya_fasum").maskMoney('mask')

        $('#txt_biaya_sampah').val(parseInt(data.biaya_sampah))
        $("#txt_biaya_sampah").maskMoney('mask')

        $('#txt_biaya_keamanan').val(parseInt(data.biaya_keamanan))
        $("#txt_biaya_keamanan").maskMoney('mask')

        $('#txt_biaya_pbb').val(parseInt(data.biaya_pbb))
        $("#txt_biaya_pbb").maskMoney('mask')

        $('#txt_biaya_lain').val(parseInt(data.biaya_lain))
        $("#txt_biaya_lain").maskMoney('mask')

        $('#txt_meteran_air_prev').val(parseInt(data.meteran_air_now))
        $("#txt_meteran_air_prev").maskMoney('mask')
    }
    function load_last_tagihan(){
        var kav = $('#sel_no_kav').val();
            $.ajax({
                url: baseUrl + '/tagihan/transaksi/get_data_modal',
                method: 'GET',
                dataType: 'json',
                data : {saldo : 1,kav :kav},
                success : function(data){
                    fill_tagihan(data.last_tagihan);
                    calc_total_tagihan();
                    // var optKav = "<option value = '' >--Pilih--</option>";
                    // for (var s = 0; s < data.kav_tagihan.length; s++) {
                    //     optKav += "<option value = " + data.kav_tagihan[s].kode_kavling + ">"+ data.kav_tagihan[s].kode_kavling + "</option>"
                    // }
                    // // $("#sel_coa_bh").html(optCoa)
                    // $("#sel_no_kav").html(optKav)
                }
            })
    }
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
    function calc_pembayaran(){
        var byr_tunai = parseFloat($("#txt_tunai").maskMoney('unmasked')[0]);
        var byr_tf = parseFloat($("#txt_tf").maskMoney('unmasked')[0]);

        pembayaran = byr_tunai + byr_tf;
        calc_saldo_akhir();
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
                    url: baseUrl + '/tagihan/transaksi/save',
                    method: 'POST',
                    dataType: 'json',
                    data: $("#frm_new").serialize(),
                    success:function(data){
                      Swal.fire('Sukses!', 'Data Berhasil Disimpan', 'success').then((close) => {
                                    location.reload()
                                })
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