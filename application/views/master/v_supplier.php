<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Master Supplier</h3>
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
                            <th>Kode Supplier</th>
                            <th>Nama</th>
                            <th>Kontak</th>
                            <th>Alamat</th>
                            <th>Kota</th>
                            <th>Telp</th>
                            <th>Coa Hutang</th>
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
                                    <td><?= $row->kode_supp;?><br><span class="badge badge-primary">Created By: <?= $row->created_by ?></span><br><span class="badge badge-primary">Created At: <?= date('d-m-Y',strtotime($row->created_at))?></span></td>
                                    <td><?= $row->nama; ?></td>
                                    <td><?= $row->kontak;?></td>
                                    <td><?= $row->alamat;?></td>
                                    <td><?= $row->kota;?></td>
                                    <td><?= $row->telepon;?></td>
                                    <td><?= $row->nama_hutang;?></td>
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
                            <form id="frm_new_supp">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Kode Supplier</label>
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
                                        <label>Kontak</label>
                                        <input class="form-control" id="txt_kontak" type="text" name="kontak">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <textarea class="form-control" id="txt_alamat" name="alamat" rows=2></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Telp</label>
                                        <input class="form-control" id="txt_telp" type="text" name="telp">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Kota</label>
                                        <input class="form-control" id="txt_kota" type="text" name="kota">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>COA Hutang</label>
                                        <select name="coa_hutang" id="sel_coa_hutang" class="form-control select2bs4" style="width: 100%;">
                                            
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
                    url: baseUrl + '/master/supplier/save',
                    method: 'POST',
                    dataType: 'json',
                    data: $("#frm_new_supp").serialize(),
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

                $("#sel_coa_hutang").html(optCoa)
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