<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Master Barang</h3>
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
                    <div class="col-md-6"></div>    
                    <div class="col-md-6">
                        <div class="form-group ">
                        <button type="button" class="btn btn-primary float-right" style="margin-right: 15px;" onclick="load_coa()" data-toggle="modal" data-target=".add-modal-xl"><span class="fa fa-plus"></span> Tambah Data</button>
                        </div>
                    </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                        <thead>
                            <tr>
                            <th>Nomor</th>
                            <th>Kode Barang</th>
                            <th>Nama</th>
                            <th>Jenis</th>
                            <th>Satuan</th>
                            <th>No COA</th>
                            <!-- <th>Aktif</th> -->
                            <!-- <th>Baru</th> -->
                            <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $a=1; 
                            foreach($barang as $row){ 
                                ?>
                                <tr>
                                    <td><?= $a;?></td>
                                    <td><?= $row->kode_brg;?><br><span class="badge badge-primary">Created By: <?= $row->created_by ?></span><br><span class="badge badge-primary">Created At: <?= date('d-m-Y',strtotime($row->created_at))?></span></td>
                                    <td><?= $row->nama; ?><br><span class="badge badge-warning"><?= ($row->aktif == 1)?'Aktif':'Tidak Aktif'?></span>&nbsp;&nbsp;<span class="badge badge-success"><?= ($row->baru == 1)?'Barang Baru':'Barang Lama'?></span></td>
                                    <td><?= $row->jenis;?></td>
                                    <td><?= $row->satuan;?></td>
                                    <td><?= $row->nama_coa;?></td>
                                    <!-- <td><?= $row->aktif;?></td> -->
                                    <!-- <td><?= $row->baru;?></td> -->
                                    <td>Edit</td>
                                </tr>
                            <?php $a++; }
                            ?>    
                        </tbody>
                    </table>
                        </div>
                    </div>
                  <div class="modal fade add-modal-xl" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title" id="myModalLabel">Tambah Data</h4>
                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                          </button>
                        </div>
                        <div class="modal-body">
                            <form id="frm_new_barang">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Kode Barang</label>
                                        <input class="form-control" id="txt_kode" type="text" name="kode" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input class="form-control" id="txt_nama" type="text" name="nama" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Jenis</label>
                                        <input class="form-control" id="txt_jenis" type="text" name="jenis">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Satuan</label>
                                        <input class="form-control" id="txt_satuan" type="text" name="satuan">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>No COA</label>
                                        <select name="coa" id="sel_coa" class="form-control select2bs4" style="width: 100%;">
                                            
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <div class="form-group" style="margin-top: 30px;">
                                        <label>
                                            <input type="checkbox" class="js-switch" name="aktif" checked /> Aktif
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <div class="form-group" style="margin-top: 30px;">
                                        <label>
                                            <input type="checkbox" class="js-switch" name="baru" checked /> Baru
                                        </label>
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
                 
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
<script>
    var baseUrl = $('#valBaseUrl').val();
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
                    url: baseUrl + '/master/barang/save',
                    method: 'POST',
                    dataType: 'json',
                    data: $("#frm_new_barang").serialize(),
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
    function load_coa(){
        console.log("load bos coa")
        $.ajax({
            url: baseUrl + '/master/coa/fetch_coa',
            method: 'GET',
            dataType: 'json',
            success : function(data){
                var optCoa = "";
                for (var s = 0; s < data.coa.length; s++) {
                    optCoa += "<option value = " + data.coa[s].no_coa + ">"+ data.coa[s].no_coa+ ' - ' + data.coa[s].nama + "</option>"
                }
                $("#sel_coa").html(optCoa)
                // $("#sel_coa_hutang").html(optCoa)
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