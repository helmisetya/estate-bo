<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Master Kavling</h3>
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
                    <div class="col-md-4">
                        <div class="form-group">
                        <label>Lokasi Kavling</label>
                        <select name="lok_kav" id="search_lok" class="form-control select2bs4">
                            <option value=" ">Semua</option>
                            <?php 
                            foreach($lok_kav as $row){ ?>
                            <option value="<?= $row->id?>"><?= $row->lokasi_kav; ?></option>
                            <?php }
                            ?>
                            <option value="0">Lainnya</option>
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
                        <button type="button" class="btn btn-primary float-right" onclick="load_coa()" style="margin-right: 15px;" data-toggle="modal" data-target=".add-modal-lg"><span class="fa fa-plus"></span> Tambah Data</button>
                        </div>
                    </div>
                    </div>
                    <div class="row tbl_kav" style="display: none;">
                        <div class="col-md-12">
                        <table id="dataTableKav" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                        <thead>
                            <tr>
                            <th>Nomor</th>
                            <th>Kode Kavling</th>
                            <th>Nama K  avling</th>
                            <th>Lokasi Kavling</th>
                            <th>Nama Pemilik</th>
                            <th>Telp Pemilik</th>
                            <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="body-data">
                            
                        </tbody>
                    </table>
                        </div>
                    </div>
                  <div class="modal fade add-modal-lg" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title" id="myModalLabel">Tambah Data</h4>
                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                          </button>
                        </div>
                        <div class="modal-body">
                            <form id="frm_new_kav">
                            <p>
                            <h5> Data Kavling </h5>
                            </p>
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Kode Kavling</label>
                                        <input class="form-control" id="txt_kode_kav" type="text" name="kode_kavling" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Nama Kavling</label>
                                        <input class="form-control" id="txt_nama" type="text" name="nama" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Lokasi Kavling</label>
                                        <!-- <select name="id_div" id="search_divisi" class="form-control select2bs4" onchange="search_dept()"> -->
                                        <select name="lok_kav" id="sel_lok_kav" class="form-control select2bs4" style="width: 100%;">
                                            <?php 
                                            foreach($lok_kav as $row){ ?>
                                            <option value="<?= $row->id?>"><?= $row->lokasi_kav; ?></option>
                                            <?php }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Type</label>
                                        <input class="form-control" id="txt_type" type="text" name="type">
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Luas Tanah</label>
                                        <input class="form-control" id="txt_lt" type="text" name="lt">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Luas Bangunan</label>
                                        <input class="form-control" id="txt_lb" type="text" name="lb">
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
                                            <input class="form-control money" id="txt_harga_jual" type="text" name="harga_jual">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Nama Pemilik</label>
                                        <input class="form-control" id="txt_nama_pemilik" type="text" name="nama_pemilik">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Telp Pemilik</label>
                                        <input class="form-control" id="txt_telp_pemilik" type="text" name="telp_pemilik">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Status Tagihan</label>
                                        <input type="checkbox" name="sts_tagihan" data-width="120" data-toggle="toggle" data-on="Ya" data-off="Tidak" data-onstyle="success" data-offstyle="danger">
                                            <!-- <input type="checkbox" class="js-switch" name="sts_tagihan" checked /> Status Tagihan -->
                                        
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
                                        <select name="coa_retur" id="sel_coa_retur" class="form-control select2bs4" style="width: 100%;">
                                            <?php 
                                            foreach($coa_aktif as $row){ ?>
                                            <option value="<?= $row->no_coa?>"><?= $row->no_coa.' - '.$row->nama; ?></option>
                                            <?php }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>COA Penjualan</label>
                                        <select name="coa_jl" id="sel_coa_jl" class="form-control select2bs4" style="width: 100%;">
                                            <?php 
                                            foreach($coa_aktif as $row){ ?>
                                            <option value="<?= $row->no_coa?>"><?= $row->no_coa.' - '.$row->nama; ?></option>
                                            <?php }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>COA Hutang</label>
                                        <select name="coa_hp" id="sel_coa_hp" class="form-control select2bs4" style="width: 100%;">
                                            <?php 
                                            foreach($coa_aktif as $row){ ?>
                                            <option value="<?= $row->no_coa?>"><?= $row->no_coa.' - '.$row->nama; ?></option>
                                            <?php }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>COA Piutang</label>
                                        <select name="coa_piutang" id="sel_coa_piutang" class="form-control select2bs4" style="width: 100%;">
                                            <?php 
                                            foreach($coa_aktif as $row){ ?>
                                            <option value="<?= $row->no_coa?>"><?= $row->no_coa.' - '.$row->nama; ?></option>
                                            <?php }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>COA Titipan</label>
                                        <select name="coa_titipan" id="sel_coa_titipan" class="form-control select2bs4" style="width: 100%;">
                                            <?php 
                                            foreach($coa_aktif as $row){ ?>
                                            <option value="<?= $row->no_coa?>"><?= $row->no_coa.' - '.$row->nama; ?></option>
                                            <?php }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>COA Cadangan</label>
                                        <select name="coa_cadangan" id="sel_coa_cadangan" class="form-control select2bs4" style="width: 100%;">
                                            <?php 
                                            foreach($coa_aktif as $row){ ?>
                                            <option value="<?= $row->no_coa?>"><?= $row->no_coa.' - '.$row->nama; ?></option>
                                            <?php }
                                            ?>
                                        </select>
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
              </div>
            </div>
          </div>
        </div>
<script>
    var baseUrl = $('#valBaseUrl').val();
    function show_search(){
        var lok_id = $('#search_lok').val();
        $("#dataTableKav").dataTable().fnDestroy();
        $.ajax({
            url: baseUrl + '/master/kavling/show_data',
            method: 'POST',
            dataType: 'json',
            data: {
                lok: lok_id,
            },
            success:function(data){
                if(data.html != ''){
                    $('.tbl_kav').show()
                    $('.body-data').html(data.html)
                    $('#dataTableKav').DataTable({
                        fixedHeader: true,
                    });
                }
                
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
    function edit(){
        Swal.fire({
            title: 'Apakah anda yakin ingin merubah data ini?',
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
                    url: baseUrl + '/master/kavling/edit',
                    method: 'POST',
                    dataType: 'json',
                    data: $("#frm_edit_kav").serialize(),
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
    function openModalEdit(kav){
        var kav_val = $(kav).data('idkav')
        $.ajax({
            url: baseUrl + '/master/kavling/show_one',
            method: 'POST',
            dataType: 'json',
            data: {
                kav: kav_val,
            },
            success : function(data){
                $('#hide_id_kav').val(data.detail_kav.id);
                $('#edit_txt_kode_kav').val(data.detail_kav.kode_kavling)
                $('#edit_txt_nama').val(data.detail_kav.kode_kavling)
                // lokasi
                var optLok = "";
                for (var s = 0; s < data.lok_kav.length; s++) {
                    optLok += "<option value = " + data.lok_kav[s].id + ">" + data.lok_kav[s].lokasi_kav + "</option>"
                }
                $("#edit_sel_lok_kav").html(optLok)
                $('#edit_sel_lok_kav').val(data.detail_kav.id_kav)
                
                $('#edit_txt_type').val(data.detail_kav.type)
                $('#edit_txt_lt').val(data.detail_kav.luas_tanah)
                $('#edit_txt_lb').val(data.detail_kav.luas_bangunan)
                $('#edit_txt_harga_jual').val(parseInt(data.detail_kav.harga_jual))
                $("#edit_txt_harga_jual").maskMoney('mask')
                $('#edit_txt_nama_pemilik').val(data.detail_kav.nama_pemilik)
                $('#edit_txt_telp_pemilik').val(data.detail_kav.telp_pemilik)
                if(data.detail_kav.status_tagihan == '1'){
                    console.log("centang")
                    $("#edit_chk_sts_tagihan").attr('checked','checked');
                    $('#edit_chk_sts_tagihan').bootstrapToggle('on')
                }else{
                    $('#edit_chk_sts_tagihan').bootstrapToggle('off')
                }

                var optCoa = "";
                for (var s = 0; s < data.coa_aktif.length; s++) {
                    optCoa += "<option value = " + data.coa_aktif[s].no_coa + ">"+ data.coa_aktif[s].no_coa+ ' - ' + data.coa_aktif[s].nama + "</option>"
                }
                // $("#edit_sel_coa_bh").html(optCoa)
                // $("#edit_sel_coa_bh").val(data.detail_kav.coabh)
                $("#edit_sel_coa_retur").html(optCoa)
                $("#edit_sel_coa_retur").val(data.detail_kav.coaretur)
                $("#edit_sel_coa_jl").html(optCoa)
                $("#edit_sel_coa_jl").val(data.detail_kav.coajl)
                $("#edit_sel_coa_hp").html(optCoa)
                $("#edit_sel_coa_hp").val(data.detail_kav.coahp)
                $("#edit_sel_coa_piutang").html(optCoa)
                $("#edit_sel_coa_piutang").val(data.detail_kav.coapiutang)
                $("#edit_sel_coa_titipan").html(optCoa)
                $("#edit_sel_coa_titipan").val(data.detail_kav.coatitipan)
                $("#edit_sel_coa_cadangan").html(optCoa)
                $("#edit_sel_coa_cadangan").val(data.detail_kav.coacadangan)
            },
            error : function(xhr,textStatus,error){
                // console.log(err)
                console.log(xhr.statusText);
                console.log(textStatus);
                console.log(error);
                Swal.fire('Error!', "Error Connection", 'error')
            }
        })
    }
    function load_coa(){
        console.log("load bos coa")
        $.ajax({
            url: baseUrl + '/master/coa/fetch_coa_estate',
            method: 'GET',
            dataType: 'json',
            success : function(data){
                var optCoa = "";
                for (var s = 0; s < data.coa.length; s++) {
                    optCoa += "<option value = " + data.coa[s].no_coa + ">"+ data.coa[s].no_coa+ ' - ' + data.coa[s].nama + "</option>"
                }
                // $("#sel_coa_bh").html(optCoa)
                $("#sel_coa_retur").html(optCoa)
                $("#sel_coa_jl").html(optCoa)
                $("#sel_coa_hp").html(optCoa)
                $("#sel_coa_piutang").html(optCoa)
                $("#sel_coa_titipan").html(optCoa)
                $("#sel_coa_cadangan").html(optCoa)
            },
            error : function(xhr,textStatus,error){
                // console.log(err)
                console.log(xhr.statusText);
                console.log(textStatus);
                console.log(error);
                Swal.fire('Error!', "Error Connection", 'error')
            }
        })
    }
</script>