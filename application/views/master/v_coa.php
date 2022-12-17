<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Master COA</h3>
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
                        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                        <thead>
                            <tr>
                            <th>Nomor COA</th>
                            <th>Nama</th>
                            <th>Alokasi</th>
                            <th>Normal</th>
                            <th>Enable</th>
                            <th>Kode Tahap</th>
                            <th>Golongan 1</th>
                            <th>Golongan 2</th>
                            <th>Golongan 3</th>
                            <th>Golongan 4</th>
                            <th>Golongan 5</th>
                            <th>N1</th>
                            <th>N2</th>
                            <th>N3</th>
                            <th>N4</th>
                            <th>N5</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            foreach($coa as $row){ ?>
                                <tr>
                                    <td><?= $row->no_coa;?></td>
                                    <td><?= $row->nama; ?><br><span class="badge badge-primary">Created : <?= $row->created_by?></span></td>
                                    <td><?= $row->alokasi;?></td>
                                    <td><?= $row->normal;?></td>
                                    <td><?= $row->enable;?></td>
                                    <td><?= $row->kode_thp;?></td>
                                    <td><?= $row->gol1;?></td>
                                    <td><?= $row->gol2;?></td>
                                    <td><?= $row->gol3;?></td>
                                    <td><?= $row->gol4;?></td>
                                    <td><?= $row->gol5;?></td>
                                    <td><?= $row->n1;?></td>
                                    <td><?= $row->n2;?></td>
                                    <td><?= $row->n3;?></td>
                                    <td><?= $row->n4;?></td>
                                    <td><?= $row->n5;?></td>
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
                            <form id="frm_new_coa">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Nomor Coa</label>
                                        <input class="form-control" id="txt_no_coa" type="text" name="no_coa" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input class="form-control" id="txt_nama" type="text" name="nama" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Alokasi</label>
                                        <input class="form-control" id="txt_alokasi" type="text" name="alokasi" placeholder="NR">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Normal</label>
                                        <select class="form-control" id="sel_normal" name="normal">
                                            <option value="DEBET">Debet</option>
                                            <option value="KREDIT">Kredit</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Golongan 1</label>
                                        <input class="form-control" id="txt_gol1" type="text" name="gol1" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Golongan 2</label>
                                        <input class="form-control" id="txt_gol2" type="text" name="gol2" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Golongan 3</label>
                                        <input class="form-control" id="txt_gol3" type="text" name="gol3" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Golongan 4</label>
                                        <input class="form-control" id="txt_gol4" type="text" name="gol4" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Golongan 5</label>
                                        <input class="form-control" id="txt_gol5" type="text" name="gol5">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>N1</label>
                                        <input class="form-control" id="txt_n1" type="text" name="n1">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>N2</label>
                                        <input class="form-control" id="txt_n2" type="text" name="n2">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>N3</label>
                                        <input class="form-control" id="txt_n3" type="text" name="n3">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>N4</label>
                                        <input class="form-control" id="txt_n4" type="text" name="n4">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>N5</label>
                                        <input class="form-control" id="txt_n5" type="text" name="n5">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Kode Tahap</label>
                                        <select class="form-control" id="sel_tahap" name="kode_thp">
                                            <option value="1">KUSUMA ESTATE</option>
                                            <option value="2">KUSUMA ESTATE BARU</option>
                                            <option value="3">KUSUMA HILL</option>
                                            <option value="4">KUSUMA PINUS</option>
                                            <option value="5">PESANGGRAHAN</option>
                                            <option value="6">TAHAP 4</option>
                                            <option value="7">TASIKMADU</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group" style="margin-top: 30px;">
                                        <label>
                                            <input type="checkbox" class="js-switch" name="enable" checked /> Status COA
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
                    url: baseUrl + '/master/coa/save',
                    method: 'POST',
                    dataType: 'json',
                    data: $("#frm_new_coa").serialize(),
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