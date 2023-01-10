<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Master Persentase Income</h3>
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
                        <button type="button" class="btn btn-primary float-right" style="margin-right: 15px;" data-toggle="modal" data-target=".add-modal-lg"><span class="fa fa-plus"></span> Tambah Data</button>
                        </div>
                    </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                        <table id="datatable" class="table table-striped table-bordered myTable" style="width:100%">
                        <thead>
                            <tr>
                            <th>Periode</th>
                            <th>Departemen</th>
                            <th>Sub Departemen</th>
                            <th>Adjustment</th>
                            <th>RAPB (%)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            foreach($pesentase as $row){ ?>
                                <tr>
                                    <td><?= $row->periode;?></td>
                                    <td><?= $row->dept; ?></td>
                                    <td><?= $row->subdept; ?></td>
                                    <td><?= $row->adjustment; ?></td>
                                    <td><?= floatval($row->rapb); ?></td>
                                </tr>
                            <?php }
                            ?>    
                        </tbody>
                    </table>
                        </div>
                    </div>
                  <div class="modal fade add-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">

                        <div class="modal-header">
                          <h4 class="modal-title" id="myModalLabel">Tambah Data</h4>
                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                          </button>
                        </div>
                        <div class="modal-body">
                            <form id="frm_new">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Periode</label>
                                        <input class="form-control" id="txt_periode" type="text" name="periode" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Departemen</label>
                                        <input class="form-control" id="txt_dept" type="text" name="dept" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Sub Departemen</label>
                                        <input class="form-control" id="txt_sub_dept" type="text" name="sub_dept">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                              <div class="col-md-3">
                                  <div class="form-group">
                                      <label>Adjustment</label>
                                      <input class="form-control" id="txt_adjustment" type="text" name="adjust" placeholder="18">
                                  </div>
                              </div>
                              <div class="col-md-3">
                                  <div class="form-group">
                                      <label>RAPB (%)</label>
                                      <input class="form-control" id="txt_adjustment" type="number" name="rapb">
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
                    url: baseUrl + '/master/pesentase/save',
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