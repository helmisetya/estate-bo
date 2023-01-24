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
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
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
                        <button type="button" class="btn btn-primary float-right" onclick="load_data_modal('kav')" style="margin-right: 15px;" data-toggle="modal" data-target=".add-modal-lg"><span class="fa fa-plus"></span> Tambah Data</button>
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
                  <!-- MODAL DATA BARU -->
                  <div class="modal fade add-modal-lg" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title" id="myModalLabel">Tambah Data</h4>
                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                          </button>
                        </div>
                        <div class="modal-body">
                            <form id="frm_new">
                            
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>No Transaksi</label>
                                        <input class="form-control" id="txt_noTransaksi" type="text" name="no_transaksi" required readonly>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Nama Kavling</label>
                                        <select name="no_kav" id="sel_no_kav" onchange="generate_noTransaksi(); load_data_modal('saldo');" class="form-control select2bs4" style="width: 100%;" required>

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
                            </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                          <button type="button" class="btn btn-primary" onclick="simpan()">Simpan</button>
                        </div>

                      </div>
                    </div>
                  </div>
                 <!-- EDIT MODAL -->
                 <div class="modal fade edit-modal" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title" id="myModalLabel">Edit Data</h4>
                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                          </button>
                        </div>
                        <div class="modal-body">
                            <form id="frm_edit_kav">
                            <p>
                            <h5> Data Kavling </h5>
                            </p>
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Kode Kavling</label>
                                        <input class="form-control" id="edit_txt_kode_kav" type="text" name="kode_kavling" readonly>
                                        <input type="hidden" name="id_kav" id="hide_id_kav">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Nama Kavling</label>
                                        <input class="form-control" id="edit_txt_nama" type="text" name="nama">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Lokasi Kavling</label>
                                        <!-- <select name="id_div" id="search_divisi" class="form-control select2bs4" onchange="search_dept()"> -->
                                        <select name="lok_kav" id="edit_sel_lok_kav" class="form-control select2bs4" style="width: 100%;">
                                           
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Type</label>
                                        <input class="form-control" id="edit_txt_type" type="text" name="type">
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Luas Tanah</label>
                                        <input class="form-control" id="edit_txt_lt" type="text" name="lt">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Luas Bangunan</label>
                                        <input class="form-control" id="edit_txt_lb" type="text" name="lb">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Harga Jual</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Rp </span>
                                            </div>
                                            <!-- <input class="form-control money" id="txt_gapok" type="text" name="gapok"> -->
                                            <input class="form-control money" id="edit_txt_harga_jual" type="text" name="harga_jual">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Nama Pemilik</label>
                                        <input class="form-control" id="edit_txt_nama_pemilik" type="text" name="nama_pemilik">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Telp Pemilik</label>
                                        <input class="form-control" id="edit_txt_telp_pemilik" type="text" name="telp_pemilik">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Status Tagihan</label>
                                        <input type="checkbox" id="edit_chk_sts_tagihan" data-toggle='tooltip' data-placement='right' data-original-title="tooltip here" name="sts_tagihan" data-width="120" data-toggle="toggle" data-on="Aktif" data-off="Tidak" data-onstyle="success" data-offstyle="danger">
                                            <!-- <input type="checkbox" class="js-switch" id="edit_chk_sts_tagihan" name="sts_tagihan"/> Status Tagihan -->
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <p>
                                <h5> Data Accounting </h5>
                            </p>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>COA Retur</label>
                                        <select name="coa_retur" id="edit_sel_coa_retur" class="form-control select2bs4" style="width: 100%;">
                                            
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>COA Penjualan</label>
                                        <select name="coa_jl" id="edit_sel_coa_jl" class="form-control select2bs4" style="width: 100%;">
                                            
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>COA Hutang</label>
                                        <select name="coa_hp" id="edit_sel_coa_hp" class="form-control select2bs4" style="width: 100%;">
                                            
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>COA Piutang</label>
                                        <select name="coa_piutang" id="edit_sel_coa_piutang" class="form-control select2bs4" style="width: 100%;">
                                            
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>COA Titipan</label>
                                        <select name="coa_titipan" id="edit_sel_coa_titipan" class="form-control select2bs4" style="width: 100%;">
                                            
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>COA Cadangan</label>
                                        <select name="coa_cadangan" id="edit_sel_coa_cadangan" class="form-control select2bs4" style="width: 100%;">
                                            
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>COA Lain-lain</label>
                                        <select name="coa_lain" id="edit_sel_coa_lain" class="form-control select2bs4" style="width: 100%;">
                                            
                                        </select>
                                    </div>
                                </div>
                            </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                          <button type="button" class="btn btn-primary" onclick="edit()">Simpan</button>
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
    function load_data_modal(jenis_data){    
        console.log("jalan load ")
        if(jenis_data == 'kav'){
            $.ajax({
                url: baseUrl + '/tagihan/transaksi/get_data_modal',
                method: 'GET',
                dataType: 'json',
                data : {saldo : 0,kav : 0},
                success : function(data){
                    var optKav = "<option value = '' >--Pilih--</option>";
                    for (var s = 0; s < data.kav_tagihan.length; s++) {
                        optKav += "<option value = " + data.kav_tagihan[s].id + ">"+ data.kav_tagihan[s].kode_kavling + "</option>"
                    }
                    // $("#sel_coa_bh").html(optCoa)
                    $("#sel_no_kav").html(optKav)
                }
            })
        }else if(jenis_data == 'saldo'){
            var kav = $('#sel_no_kav').val();
            $.ajax({
                url: baseUrl + '/tagihan/transaksi/get_data_modal',
                method: 'GET',
                dataType: 'json',
                data : {saldo : 1,kav :kav},
                success : function(data){
                    // var optKav = "<option value = '' >--Pilih--</option>";
                    // for (var s = 0; s < data.kav_tagihan.length; s++) {
                    //     optKav += "<option value = " + data.kav_tagihan[s].kode_kavling + ">"+ data.kav_tagihan[s].kode_kavling + "</option>"
                    // }
                    // // $("#sel_coa_bh").html(optCoa)
                    // $("#sel_no_kav").html(optKav)
                }
            })
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
    function simpan(){
        console.log("base "+baseUrl)
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
                    url: baseUrl + '/master/kavling/save',
                    method: 'POST',
                    dataType: 'json',
                    data: $("#frm_new_kav").serialize(),
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