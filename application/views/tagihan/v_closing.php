<div class="right_col" role="main">
    <div class="">
    <div class="page-title">
        <div class="title_left">
        <h3>Closing Tagihan</h3>
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
                    <div id="loading-modal" style="display: none;">
                        <div class="swal2-icon swal2-spinner swal2-animate-spin" style="display: block;"></div>
                        <div class="swal2-content">Loading...</div>
                    </div>
                    <form id="closeForm">
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
                            <!-- <input type="submit" name="btn" id="pdf_btn" value="Closing" class="btn btn-info btnPdf" /> -->
                            <button type="button"  onclick="do_close()" id="pdf_btn" name="btn" class="btn btn-info btnClose"><span class="fa fa-lock"></span>
                                Closing
                            </button>
                        </div>
                    </div>    
                    </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </div>
    </div>
</div>
<script>
    var baseUrl = $('#valBaseUrl').val();
    const loadingModal = Swal.mixin({
            backdrop: 'rgba(0,0,0,0.5)',
            allowOutsideClick: false,
            allowEscapeKey: false,
            didOpen: () => {
                Swal.showLoading();
            }
        });
    function do_close(){
        console.log('di tekan')
        Swal.fire({
            title: 'Apakah anda yakin ingin melakukan closing ?',
            // text: "",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Closing!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            
            if (result.isConfirmed) {
                $.ajax({
                    url: baseUrl + '/tagihan/closing/close',
                    method: 'POST',
                    dataType: 'json',
                    data: $("#closeForm").serialize(),
                    beforeSend : function(){
                        loadingModal.fire()
                    },
                    success:function(data){
                        // console.log(data.status);
                        if(data.status == 200){
                            Swal.fire('Sukses!', 'Closing Berhasil', 'success').then((close) => {
                                        location.reload()
                                    })
                        }else{
                            Swal.fire('Error!',data.msg,'error')
                        }
                    },
                    // complete : function(){
                    //     loadingModal.close()
                    // },
                    error: function(err) {
                      console.log(err)
                      Swal.fire('Error!', err.responseJSON.msg, 'error')
                    }
                })
            }
        })
    }
</script>