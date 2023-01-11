<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Master Sales</h3>
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
                        <table id="datatable-responsive" class="table table-striped table-bordered myTable" style="width:100%">
                        <thead>
                            <tr>
                            <th>Nomor</th>
                            <th>Kode Sales</th>
                            <th>Nama Sales</th>
                            <th>Telepon</th>
                            <th>Alamat</th>
                            <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $a=1; 
                            foreach($supp as $row){ 
                                ?>
                                <tr>
                                    <td><?= $a;?></td>
                                    <td><?= $row->kode;?><br><span class="badge badge-primary">Created By: <?= $row->created_by ?></span><br><span class="badge badge-primary">Created At: <?= date('d-m-Y',strtotime($row->created_at))?></span></td>
                                    <td><?= $row->nama; ?><br><span class="badge badge-warning">Status : <?= ($row->status == 0)?'Tidak Aktif':'Aktif'?></span></td>
                                    <td><?= $row->telp;?></td>
                                    <td><?= $row->alamat;?></td>
                                    <td><button type="button" class="btn btn btn-warning" data-sales="<?php echo $row->id; ?>" onclick="openModalEdit(this)" data-toggle="modal" data-target=".edit-modal-xl"><span class="fa fa-pencil"></span> Edit</button></td>
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
                            <form id="frm_new_sales">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Kode Sales</label>
                                        <input class="form-control" id="txt_kode" type="text" name="kode" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input class="form-control" id="txt_nama" type="text" name="nama" required>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Telepon</label>
                                        <input class="form-control" id="txt_kontak" type="text" name="kontak">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <textarea class="form-control" id="txt_alamat" name="alamat" rows=2></textarea>
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <div class="form-group">
                                        <label>Status</label>
                                        <input type="checkbox" name="sts" data-width="70" data-toggle="toggle" data-on="Aktif" data-off="Tidak Aktif" data-onstyle="success" data-offstyle="danger">
                                            <!-- <input type="checkbox" class="js-switch" name="sts_tagihan" checked /> Status Tagihan -->
                                        
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
                 <div class="modal fade edit-modal-xl" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title" id="myModalLabel">Edit Data</h4>
                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                          </button>
                        </div>
                        <div class="modal-body">
                            <form id="frm_edit_sales">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Kode Sales</label>
                                        <input class="form-control" id="edit_txt_kode" type="text" name="kode" required readonly>
                                        <input type="hidden" name="id" id="hide_id">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input class="form-control" id="edit_txt_nama" type="text" name="nama" required>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Telepon</label>
                                        <input class="form-control" id="edit_txt_kontak" type="text" name="kontak">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <textarea class="form-control" id="edit_txt_alamat" name="alamat" rows=2></textarea>
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <div class="form-group">
                                        <label>Status</label>
                                        <input type="checkbox" name="sts" id="edit_chk_sts" data-width="70" data-toggle="toggle" data-on="Aktif" data-off="Tidak Aktif" data-onstyle="success" data-offstyle="danger">
                                            <!-- <input type="checkbox" class="js-switch" name="sts_tagihan" checked /> Status Tagihan -->
                                        
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
                 <!-- END EDIT MODAL -->
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
                    url: baseUrl + '/master/sales/save',
                    method: 'POST',
                    dataType: 'json',
                    data: $("#frm_new_sales").serialize(),
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
    function edit() {
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
                    url: baseUrl + '/master/sales/edit',
                    method: 'POST',
                    dataType: 'json',
                    data: $("#frm_edit_sales").serialize(),
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
    function openModalEdit(sales) {
        var id = $(sales).data('sales')
        $.ajax({
            url: baseUrl + '/master/sales/show_one',
            method: 'GET',
            dataType: 'json',
            data: {
                id: id
            },
            success: function(data) {
                //SET VALUE
                $('#hide_id').val(data.sales.id)
                $('#edit_txt_kode').val(data.sales.kode)
                $('#edit_txt_nama').val(data.sales.nama)
                $('#edit_txt_kontak').val(data.sales.telp)
                $('#edit_txt_alamat').val(data.sales.alamat)
                if(data.sales.status == '1'){
                    console.log("centang")
                    $("#edit_chk_sts").attr('checked','checked');
                    $('#edit_chk_sts').bootstrapToggle('on')
                }else{
                    $('#edit_chk_sts').bootstrapToggle('off')
                }
            },
            error: function() {
                Swal.fire('Error!', "Error Connection", 'error')
            }
        })
    }
</script>