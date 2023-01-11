<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Master Lokasi Kavling</h3>
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
                        <button type="button" class="btn btn-primary float-right" style="margin-right: 15px;" data-toggle="modal" data-target=".add-modal-md"><span class="fa fa-plus"></span> Tambah Data</button>
                        </div>
                    </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                        <table id="datatable" class="table table-striped table-bordered myTable" style="width:100%">
                        <thead>
                            <tr>
                            <th>Nomor</th>
                            <th>Nama</th>
                            <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            foreach($lok_kav as $row){ ?>
                                <tr>
                                    <td><?= $row->id;?></td>
                                    <td><?= $row->lokasi_kav; ?><br><span class="badge badge-primary">Created : <?= $row->created_by?></span></td>
                                    <td><button type="button" class="btn btn btn-warning" data-lok="<?php echo $row->id; ?>" onclick="openModalEdit(this)" data-toggle="modal" data-target=".edit-modal-md"><span class="fa fa-pencil"></span> Edit</button></td>
                                </tr>
                            <?php }
                            ?>    
                        </tbody>
                    </table>
                        </div>
                    </div>
                  <div class="modal fade add-modal-md" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-md">
                      <div class="modal-content">

                        <div class="modal-header">
                          <h4 class="modal-title" id="myModalLabel">Tambah Data</h4>
                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                          </button>
                        </div>
                        <div class="modal-body">
                            <form id="frm_new_lok">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Lokasi Kavling</label>
                                        <input class="form-control" id="txt_lok" type="text" name="lokasi_kav" required>
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
                 <div class="modal fade edit-modal-md" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-md">
                      <div class="modal-content">

                        <div class="modal-header">
                          <h4 class="modal-title" id="myModalLabel">Edit Data</h4>
                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                          </button>
                        </div>
                        <div class="modal-body">
                            <form id="frm_edit_lok">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Lokasi Kavling</label>
                                        <input class="form-control" id="edit_txt_lok" type="text" name="lokasi_kav" required>
                                        <input type='hidden' id="hide_id" name='id'>
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
                    url: baseUrl + '/master/lokasi_kav/save',
                    method: 'POST',
                    dataType: 'json',
                    data: $("#frm_new_lok").serialize(),
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
            confirmButtonText: 'Ya, Edit!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: baseUrl + '/master/lokasi_kav/edit',
                    method: 'POST',
                    dataType: 'json',
                    data: $("#frm_edit_lok").serialize(),
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
    function openModalEdit(lok) {
        var id = $(lok).data('lok')
        $.ajax({
            url: baseUrl + '/master/lokasi_kav/show_one',
            method: 'GET',
            dataType: 'json',
            data: {
                id: id
            },
            success: function(data) {
                //SET VALUE
                $('#hide_id').val(data.lok_kav.id)
                $('#edit_txt_lok').val(data.lok_kav.lokasi_kav)
            },
            error: function() {
                Swal.fire('Error!', "Error Connection", 'error')
            }
        })
    }
</script>