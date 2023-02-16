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
                    <form method="POST" id="rekapForm" target="_blank" action="<?= site_url('laporan/tagihan/rekap/cetak') ?>">
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
                            <input type="submit" name="btn" id="pdf_btn" value="Cetak" class="btn btn-info btnPdf" />
                            <!-- <button type="button" id="pdf_btn" name="btn" class="btn btn-info btnPdf"><span class="fa fa-print"></span>
                                Cetak
                            </button> -->
                        </div>
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