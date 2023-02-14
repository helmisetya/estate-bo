<div class="right_col" role="main">
    <div class="">
    <div class="page-title">
        <div class="title_left">
        <h3>Nota Rekening</h3>
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
                    <form method="POST" id="notaForm" target="_blank" action="<?= site_url('laporan/tagihan/nota_rekening/cetak') ?>">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                            <label>Tahun</label>
                            <select name="tahun" id="search_tahun" class="form-control select2bs4" onchange="show_search()">
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
                            <select name="bulan" id="search_bulan" class="form-control select2bs4" onchange="show_search()">
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
                        <div class="col-md-4">
                            <div class="form-group">
                            <label>Lokasi Kavling</label>
                            <select name="lok_kav" id="search_lok" class="form-control select2bs4" onchange="show_search()">
                                <option value=" ">--Pilih--</option>
                                <option value="0">Semua</option>
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
                            <input type="submit" name="btn" id="pdf_btn" value="Cetak"class="btn btn-info btnPdf" />
                            <!-- <button type="button" id="pdf_btn" name="btn" class="btn btn-info btnPdf"><span class="fa fa-print"></span>
                                Cetak
                            </button> -->
                        </div>
                    </div>    
                    </div>
                    <div class="row">
                        <div class="tbl_tagihan col-lg-12" style="display: none;">
                            <hr>
                            <input type="text" id="myInput" onkeyup="cari()" class="form-control" placeholder="Cari No Kavling..">
                            <table class="table table-condensed" id="dataTablePreview">
                                <thead>
                                    <tr>
                                        <th><input type="checkbox" name="centang[]" onchange="centang_semua(this)"></th>
                                        <th>No Kavling</th>
                                        <th>Nama Pemilik</th>
                                        <th>Saldo Awal</th>
                                        <th>Total Tagihan</th>
                                        <th>Saldo Akhir</th>
                                    </tr>
                                </thead>
                                <tbody class="body-data">

                                </tbody>
                            </table>
                        </div>
                    </div>
                    </form>
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
    var panjang_data = 0;
    function cari() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("dataTablePreview");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[1];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }

    function show_search(){
        var val_tahun = $('#search_tahun').val();
        var val_bulan = $('#search_bulan').val();
        var val_kav = $('#search_lok').val();
        var textBulan = $("#search_bulan option:selected").attr('data-textBulan');
        console.log('kav' + val_kav)
        if(val_kav != ' '){
            $("#dataTablePreview").dataTable().fnDestroy();
            $.ajax({
                url : baseUrl + 'laporan/tagihan/nota_rekening/list_tagihan',
                method : 'POST',
                dataType : 'json',
                data : {
                    tahun : val_tahun,bulan : textBulan,kav:val_kav 
                },
                success : function(data) {
                    
                    panjang_data = data.jml_data
                    $('.tbl_tagihan').show()
                    $('.body-data').html(data.html)
                },
                error:function(err){
                    Swal.fire('Error!', "Error Connection", 'error')
                }
            })
        }
    }
</script>