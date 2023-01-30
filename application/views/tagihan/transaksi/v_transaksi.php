<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Tagihan Kavling</h3>
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
                    <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                        <label>Tahun</label>
                        <select name="tahun" id="search_tahun" class="form-control select2bs4">
                            <option value=" ">--Pilih Tahun--</option>
                            <?php
                            foreach ($tahun as $key) { ?>
                                <option value=<?php echo $key['id']; ?>><?php echo $key['values']; ?></option>

                            <?php }
                            ?>
                        </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                        <label>Bulan</label>
                        <select name="bulan" id="search_bulan" class="form-control select2bs4">
                            <option value=" ">--Pilih Bulan</option>
                            
                            <?php
                            foreach ($bulan as $key => $values) {
                                foreach ($values as $row_bln) { ?>
                                    <option data-textBulan="<?php echo $row_bln['text_bulan']; ?>" value=<?php echo $row_bln['id']; ?>><?php echo $row_bln['values']; ?></option>
                                <?php }
                                }
                            ?>
                            <option data-textBulan="all" value="all">Semua</option>
                        </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group vertical-center">
                            <button type="button" class="btn btn-warning btnShowSearch" onclick="show_search()"><span class="fa fa-eye"></span>
                                Tampilkan
                            </button>
                        </div>
                    </div>    
                    <div class="col-md-6">
                        <div class="form-group" style="margin-top: 22px;">
                       
                        <a href="<?= site_url() ?>/tagihan/transaksi/insert" class="btn btn-primary float-right"><span class="fa fa-plus"></span> Tambah Data </a>
                        </div>
                    </div>
                    </div>
                    <div class="row tbl_transaksi" style="display: none;">
                        <div class="col-md-12">
                        <table id="dataTableTransaksi" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                        <thead>
                            <tr>
                            <th>Nomor Transaksi</th>
                            <th>No Kavling</th>
                            <th>Periode</th>
                            <th>Jumlah Tagihan</th>
                            <th>Saldo Awal</th>
                            <th>Saldo Akhir</th>
                            <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="body-data">
                            
                        </tbody>
                    </table>
                        </div>
                    </div>
                 <!-- EDIT MODAL -->
                 <div class="modal fade edit-modal" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title" id="myModalLabel">Detail Data</h4>
                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                          </button>
                        </div>
                        <div class="modal-body">
                            <form id="frm_new">
                            
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>No Transaksi</label>
                                        <input class="form-control" id="txt_noTransaksi" type="text" name="no_transaksi" readonly>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Nama Kavling</label>
                                        <input class="form-control" id="txt_no_kav" type="text" name="no_kav">
                                        
                                        
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Tanggal Bayar</label>
                                        <input class="form-control" id="txt_tglBayar" type="date" name="tgl_bayar">
                                        
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                    <label>Saldo Awal</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Rp </span>
                                            </div>
                                            <input class="form-control money" id="txt_saldo_awal" type="text" name="saldo_awal">
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
                                            <input class="form-control money" id="txt_biaya_telp" type="text" name="biaya_telp">
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
                                            <input class="form-control money" id="txt_biaya_listrik" type="text" name="biaya_listrik">
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
                                            <input class="form-control money" id="txt_biaya_admin" type="text" name="biaya_admin">
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
                                            <input class="form-control money" id="txt_biaya_taman" type="text" name="biaya_taman">
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
                                            <input class="form-control money" id="txt_biaya_fasum" type="text" name="biaya_fasum">
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
                                            <input class="form-control money" id="txt_biaya_keamanan" type="text" name="biaya_keamanan">
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
                                            <input class="form-control money" id="txt_biaya_sampah" type="text" name="biaya_sampah">
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
                                            <input class="form-control money" id="txt_biaya_pbb" type="text" name="biaya_pbb">
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
                                            <input class="form-control money" id="txt_biaya_lain" type="text" name="biaya_lain">
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
                                            <input class="form-control money" id="txt_biaya_koreksi" type="text" name="biaya_koreksi">
                                            <!-- <input type="checkbox" class="form-control" name="minus" id="chk_minus">Minus -->
                                            
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <div class="form-group">
                                    <label>Minus</label><br>
                                    <input type="checkbox" id="chk_minus" name="minus" data-width="70" data-toggle="toggle" data-on="Ya" data-off="Tidak" data-onstyle="success" data-offstyle="danger"> 
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Metaran Air Bulan Lalu</label>
                                        <div class="input-group mb-3">
                                            <input class="form-control" id="txt_meteran_air_prev" type="text" name="meterain_air_prev">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Metaran Air Bulan Ini</label>
                                        <div class="input-group mb-3">
                                            <input class="form-control" id="txt_meteran_air_now" type="text" name="meterain_air_now">
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
                                            <input class="form-control money" id="txt_tunai" type="text" name="tunai">
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
                                            <input class="form-control money" id="txt_tf" type="text" name="tf">
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
                            </form>
                        </div>

                      </div>
                    </div>
                  </div>
                  </div>
                </div>
                <!-- END EDIT MODAL -->
              </div>
            </div>
          </div>
        </div>
<script>
    var baseUrl = $('#valBaseUrl').val();
    var body = $('body');

    body.on('change','#txt_tglBayar',function(e){
        generate_noTransaksi()
    })
    // body.on('change','#sel_no_kav',function(e){
    //     e.preventDefault();
    //     generate_noTransaksi();
    //     load_data_modal('saldo');
    // })

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

        var kav = $('#sel_no_kav').val()
        if(kav != '' && periode != ''){
            $('#txt_noTransaksi').val('INV-TG-'+kav+periode)
        }
    }
    
    function show_search(){
        var bulan = $('#search_bulan').val();
        var tahun = $('#search_tahun').val();
        var textBulan = $("#search_bulan option:selected").attr('data-textBulan');
        $("#dataTableTransaksi").dataTable().fnDestroy();
        $.ajax({
            url: baseUrl + '/tagihan/transaksi/show_data',
            method: 'POST',
            dataType: 'json',
            data: {
                tahun: tahun,
                bulan: textBulan
            },
            success:function(data){
                if(data.html != ''){
                    $('.tbl_transaksi').show()
                    $('.body-data').html(data.html)
                    $('#dataTableTransaksi').DataTable({
                        fixedHeader: true,
                    });
                }
                console.log("isoo")
            },
            error:function(err){
                Swal.fire('Error!', "Error Connection", 'error')
            }
        })
    }
    
    function openModalDetail(transaksi) {
        var no_trans = $(transaksi).data('notrans')
        
        $.ajax({
            url: baseUrl + '/tagihan/transaksi/show_one',
            method: 'GET',
            dataType: 'json',
            data: {
                no_trans: no_trans
            },
            success : function(data){
                $('#txt_noTransaksi').val(data.tagihan.no_transaksi)
                $('#txt_no_kav').val(data.tagihan.kode_kavling +' - '+ data.tagihan.nama_pemilik)
                var json_tgl = new Date(data.tagihan.tgl_bayar)
                json_tgl.setDate(json_tgl.getDate())
                var dt_tgl = json_tgl.toISOString().substring(0, 10)
                $('#txt_tglBayar').val(dt_tgl)
                $('#txt_saldo_awal').val(data.tagihan.saldo_awal)
                $("#txt_saldo_awal").maskMoney('mask')
                // pemakaian
                $('#txt_biaya_telp').val(data.tagihan.biaya_telp)
                $("#txt_biaya_telp").maskMoney('mask')
                $('#txt_biaya_listrik').val(data.tagihan.biaya_listrik)
                $("#txt_biaya_listrik").maskMoney('mask')
                $('#txt_biaya_admin').val(data.tagihan.biaya_admin)
                $("#txt_biaya_admin").maskMoney('mask')
                $('#txt_biaya_taman').val(data.tagihan.biaya_taman)
                $("#txt_biaya_taman").maskMoney('mask')
                $('#txt_biaya_fasum').val(data.tagihan.biaya_fasum)
                $("#txt_biaya_fasum").maskMoney('mask')
                $('#txt_biaya_keamanan').val(data.tagihan.biaya_keamanan)
                $("#txt_biaya_keamanan").maskMoney('mask')
                $('#txt_biaya_sampah').val(data.tagihan.biaya_sampah)
                $("#txt_biaya_sampah").maskMoney('mask')
                $('#txt_biaya_pbb').val(data.tagihan.biaya_pbb)
                $("#txt_biaya_pbb").maskMoney('mask')
                $('#txt_biaya_lain').val(data.tagihan.biaya_lain)
                $("#txt_biaya_lain").maskMoney('mask')
                $('#txt_biaya_koreksi').val(data.tagihan.biaya_koreksi)
                $("#txt_biaya_koreksi").maskMoney('mask')
                if(data.tagihan.minus == '1'){
                    console.log("centang")
                    $("#chk_minus").attr('checked','checked');
                    $('#chk_minus').bootstrapToggle('on')
                }else{
                    $('#chk_minus').bootstrapToggle('off')
                }
                $('#txt_meteran_air_prev').val(data.tagihan.meteran_air_prev)
                $('#txt_meteran_air_now').val(data.tagihan.meteran_air_now)
                $('#txt_penggunaan_air').val(data.tagihan.jml_pemakaian_air)
                $('#txt_biaya_air').val(data.tagihan.biaya_air)
                $("#txt_biaya_air").maskMoney('mask')
                $('#txt_keterangan').val(data.tagihan.keterangan)
                $('#txt_tunai').val(data.tagihan.payment_tunai)
                $("#txt_tunai").maskMoney('mask')
                $('#txt_tf').val(data.tagihan.payment_tf)
                $("#txt_tf").maskMoney('mask')
                $('#txt_total').val(data.tagihan.total_tagihan)
                $("#txt_total").maskMoney('mask')
                $('#txt_saldo_akhir').val(data.tagihan.saldo_akhir)
                $("#txt_saldo_akhir").maskMoney('mask')

            }
        })
    }
</script>