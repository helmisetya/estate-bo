<div class="right_col" role="main">
    <div class="">
    <div class="page-title">
        <div class="title_left">
        <h3>Kalkulasi Air</h3>
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
                <div class="row tbl_transaksi">
                    <div class="col-md-12">
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                    <thead>
                        <tr>
                        <th>Periode</th>
                        <th>Sewa</th>
                        <th>Retribusi</th>
                        <th>Tarif 1</th>
                        <th>Tarif 1 M<sup>3<sup></th>
                        <th>Tarif 2</th>
                        <th>Tarif 2 M<sup>3<sup></th>
                        <th>Tarif 3</th>
                        <th>Tarif 3 M<sup>3<sup></th>
                        <th>Tarif 4</th>
                        <th>Tarif 4 M<sup>3<sup></th>
                        <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="body-data">
                        <?php 
                        foreach($kalkulasi as $row){?>
                            <tr>
                                <td><?= $row->periode ?></td>
                                <td>Rp <?= number_format($row->sewa,0,',','.')?></td>
                                <td>Rp <?= number_format($row->retribusi,0,',','.')?></td>
                                <td>Rp <?= number_format($row->tarif1,0,',','.')?></td>
                                <td><?= $row->tarif1_kubik ?></td>
                                <td>Rp <?= number_format($row->tarif2,0,',','.')?></td>
                                <td><?= $row->tarif2_kubik ?></td>
                                <td>Rp <?= number_format($row->tarif3,0,',','.')?></td>
                                <td><?= $row->tarif3_kubik ?></td>
                                <td>Rp <?= number_format($row->tarif4,0,',','.')?></td>
                                <td><?= $row->tarif4_kubik ?></td>
                                <td><button type="button" class="btn btn btn-warning" data-periode="<?php echo $row->periode; ?>" onclick="openModalEdit(this)" data-toggle="modal" data-target=".edit-modal-xl"><span class="fa fa-pencil"></span> Edit</button></td>
                            </tr>
                        <?php }
                        ?>
                    </tbody>
                    </table>
                    </div>
                </div>
            </div>
            <!-- EDIT MODAL -->
            <div class="modal fade edit-modal-xl" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                <div class="modal-content">

                    <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Edit Data</h4>
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        <form id="frm_edit">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Periode</label>
                                    <input class="form-control" id="txt_periode" type="text" name="periode" readonly>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Biaya Sewa</label>
                                    <input class="form-control" id="txt_sewa" type="text" name="sewa">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Biaya Retribusi</label>
                                    <input class="form-control" id="txt_retribusi" type="text" name="retribusi">
                                </div>
                            </div>
                            <?php 
                            for($a=1; $a<=4; $a++){ ?>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Tarif <?= $a?></label>
                                        <input class="form-control" id="txt_tarif<?= $a ?>" type="text" name="tarif<?= $a?>">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Tarif <?= $a?> M<sup>3</sup></label>
                                        <input class="form-control" id="txt_tarif<?= $a?>_kubik" type="text" name="tarif<?= $a?>_kubik">
                                    </div>
                                </div>
                            <?php }
                            ?>
                            
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
<script>
    var baseUrl = $('#valBaseUrl').val();
    function openModalEdit(periode) {
        var periode = $(periode).data('periode')
        $.ajax({
            url: baseUrl + '/tagihan/kalkulasi_air/show_one',
            method: 'GET',
            dataType: 'json',
            data: {
                periode: periode
            },
            success: function(data) {
                //SET VALUE
                $('#txt_periode').val(data.kalkulasi.periode)
                $('#txt_sewa').val(data.kalkulasi.sewa)
                $('#txt_retribusi').val(data.kalkulasi.retribusi)
                $('#txt_tarif1').val(data.kalkulasi.tarif1)
                $('#txt_tarif2').val(data.kalkulasi.tarif2)
                $('#txt_tarif3').val(data.kalkulasi.tarif3)
                $('#txt_tarif4').val(data.kalkulasi.tarif4)
                $('#txt_tarif1_kubik').val(data.kalkulasi.tarif1_kubik)
                $('#txt_tarif2_kubik').val(data.kalkulasi.tarif2_kubik)
                $('#txt_tarif3_kubik').val(data.kalkulasi.tarif3_kubik)
                $('#txt_tarif4_kubik').val(data.kalkulasi.tarif4_kubik)
                // $('#edit_txt_lok').val(data.lok_kav.lokasi_kav)
            },
            error: function() {
                Swal.fire('Error!', "Error Connection", 'error')
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
                    url: baseUrl + '/tagihan/kalkulasi_air/edit',
                    method: 'POST',
                    dataType: 'json',
                    data: $("#frm_edit").serialize(),
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