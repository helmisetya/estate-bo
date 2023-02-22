
    var baseUrl = $('#valBaseUrl').val();
    var body = $('body');

    body.on('change','#txt_tglBayar',function(e){
        generate_noTransaksi()
    })
    body.on('change','#sel_no_kav',function(e){
        generate_noTransaksi()
    })

    function padTo2Digits(num) {
        return num.toString().padStart(2, '0');
    }
    function generate_noTransaksi(){
        console.log("tess")
        var tgl = new Date($('#txt_tglBayar').val());
        // console.log('tgl')
        // console.log(tgl)
        var txtBulan = padTo2Digits(tgl.getMonth() + 1);
        console.log('bulan')
        console.log(txtBulan)
        var txtTahun = tgl.getFullYear();
        var periode = txtBulan + '/' + txtTahun;

        var kav = $('#sel_no_kav').val()
        if(kav != '' && periode != ''){
            $('#txt_noTransaksi').val('INV-TG-'+kav+periode)
        }
    }
    function load_data_modal(){
        $.ajax({
            url: baseUrl + '/tagihan/transaksi/get_data_modal',
            method: 'GET',
            dataType: 'json',
            success : function(data){
                var optKav = "<option value = '' >--Pilih--</option>";
                for (var s = 0; s < data.kav_tagihan.length; s++) {
                    optKav += "<option value = " + data.kav_tagihan[s].kode_kavling + ">"+ data.kav_tagihan[s].kode_kavling + "</option>"
                }
                // $("#sel_coa_bh").html(optCoa)
                $("#sel_no_kav").html(optKav)
            }
        })
    }
    
    function show_search(){
        var bulan = $('#search_bulan').val();
        var tahun = $('#search_tahun').val();
        var textBulan = $("#search_bulan option:selected").attr('data-textBulan');
        $("#dataTableTransaksi").dataTable().fnDestroy();
        $.ajax({
            url: baseUrl + '/tagihan/transaksi/show_data',
            method: 'POST',
            dataType: 'json',
            data: {
                tahun: tahun,
                bulan: textBulan
            },
            success:function(data){
                if(data.html != ''){
                    $('.tbl_transaksi').show()
                    $('.body-data').html(data.html)
                    $('#dataTableTransaksi').DataTable({
                        fixedHeader: true,
                    });
                }
                console.log("isoo")
            },
            error:function(err){
                Swal.fire('Error!', "Error Connection", 'error')
            }
        })
    }
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
                    url: baseUrl + '/master/kavling/save',
                    method: 'POST',
                    dataType: 'json',
                    data: $("#frm_new_kav").serialize(),
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
            confirmButtonText: 'Ya, Simpan!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: baseUrl + '/master/kavling/edit',
                    method: 'POST',
                    dataType: 'json',
                    data: $("#frm_edit_kav").serialize(),
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
    function openModalEdit(kav){
        var kav_val = $(kav).data('idkav')
        $.ajax({
            url: baseUrl + '/master/kavling/show_one',
            method: 'POST',
            dataType: 'json',
            data: {
                kav: kav_val,
            },
            success : function(data){
                $('#hide_id_kav').val(data.detail_kav.id);
                $('#edit_txt_kode_kav').val(data.detail_kav.kode_kavling)
                $('#edit_txt_nama').val(data.detail_kav.kode_kavling)
                // lokasi
                var optLok = "";
                for (var s = 0; s < data.lok_kav.length; s++) {
                    optLok += "<option value = " + data.lok_kav[s].id + ">" + data.lok_kav[s].lokasi_kav + "</option>"
                }
                $("#edit_sel_lok_kav").html(optLok)
                $('#edit_sel_lok_kav').val(data.detail_kav.id_kav)
                
                $('#edit_txt_type').val(data.detail_kav.type)
                $('#edit_txt_lt').val(data.detail_kav.luas_tanah)
                $('#edit_txt_lb').val(data.detail_kav.luas_bangunan)
                $('#edit_txt_harga_jual').val(parseInt(data.detail_kav.harga_jual))
                $("#edit_txt_harga_jual").maskMoney('mask')
                $('#edit_txt_nama_pemilik').val(data.detail_kav.nama_pemilik)
                $('#edit_txt_telp_pemilik').val(data.detail_kav.telp_pemilik)
                if(data.detail_kav.status_tagihan == '1'){
                    console.log("centang")
                    $("#edit_chk_sts_tagihan").attr('checked','checked');
                    $('#edit_chk_sts_tagihan').bootstrapToggle('on')
                }else{
                    $('#edit_chk_sts_tagihan').bootstrapToggle('off')
                }

                var optCoa = "<option value = '' >--Pilih--</option>";
                for (var s = 0; s < data.coa_aktif.length; s++) {
                    optCoa += "<option value = " + data.coa_aktif[s].no_coa + ">"+ data.coa_aktif[s].no_coa+ ' - ' + data.coa_aktif[s].nama + "</option>"
                }
                // $("#edit_sel_coa_bh").html(optCoa)
                // $("#edit_sel_coa_bh").val(data.detail_kav.coabh)
                $("#edit_sel_coa_retur").html(optCoa)
                $("#edit_sel_coa_retur").val(data.detail_kav.coaretur)
                var optCoa_penjualan = "<option value = '' >--Pilih--</option>";
                for (var s = 0; s < data.coa_penjualan.length; s++) {
                    optCoa_penjualan += "<option value = " + data.coa_penjualan[s].no_coa + ">"+ data.coa_penjualan[s].no_coa+ ' - ' + data.coa_penjualan[s].nama + "</option>"
                }
                $("#edit_sel_coa_jl").html(optCoa_penjualan)
                $("#edit_sel_coa_jl").val(data.detail_kav.coajl)

                var optCoa_hutang = "<option value = '' >--Pilih--</option>";
                for (var s = 0; s < data.coa_hutang.length; s++) {
                    optCoa_hutang += "<option value = " + data.coa_hutang[s].no_coa + ">"+ data.coa_hutang[s].no_coa+ ' - ' + data.coa_hutang[s].nama + "</option>"
                }
                $("#edit_sel_coa_hp").html(optCoa_hutang)
                $("#edit_sel_coa_hp").val(data.detail_kav.coahp)

                var optCoa_piutang = "<option value = '' >--Pilih--</option>";
                for (var s = 0; s < data.coa_piutang.length; s++) {
                    optCoa_piutang += "<option value = " + data.coa_piutang[s].no_coa + ">"+ data.coa_piutang[s].no_coa+ ' - ' + data.coa_piutang[s].nama + "</option>"
                }
                $("#edit_sel_coa_piutang").html(optCoa_piutang)
                $("#edit_sel_coa_piutang").val(data.detail_kav.coapiutang)
                $("#edit_sel_coa_titipan").html(optCoa_piutang)
                $("#edit_sel_coa_titipan").val(data.detail_kav.coatitipan)
                var optCoa_cadangan = "<option value = '' >--Pilih--</option>";
                for (var s = 0; s < data.coa_cadangan.length; s++) {
                    optCoa_cadangan += "<option value = " + data.coa_cadangan[s].no_coa + ">"+ data.coa_cadangan[s].no_coa+ ' - ' + data.coa_cadangan[s].nama + "</option>"
                }
                $("#edit_sel_coa_cadangan").html(optCoa_cadangan)
                $("#edit_sel_coa_cadangan").val(data.detail_kav.coacadangan)
                $("#edit_sel_coa_lain").html(optCoa)
                $("#edit_sel_coa_lain").val(data.detail_kav.coalain)
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
    function load_coa(){
        console.log("load bos coa")
        $.ajax({
            url: baseUrl + '/master/coa/fetch_coa_estate',
            method: 'GET',
            dataType: 'json',
            success : function(data){
                var optCoa = "<option value = '' >--Pilih--</option>";
                for (var s = 0; s < data.coa.length; s++) {
                    optCoa += "<option value = " + data.coa[s].no_coa + ">"+ data.coa[s].no_coa+ ' - ' + data.coa[s].nama + "</option>"
                }
                // $("#sel_coa_bh").html(optCoa)
                $("#sel_coa_retur").html(optCoa)
                $("#sel_coa_lain").html(optCoa)

                var optCoa_penjualan = "<option value = '' >--Pilih--</option>";
                for (var s = 0; s < data.coa_penjualan.length; s++) {
                    optCoa_penjualan += "<option value = " + data.coa_penjualan[s].no_coa + ">"+ data.coa_penjualan[s].no_coa+ ' - ' + data.coa_penjualan[s].nama + "</option>"
                }
                $("#sel_coa_jl").html(optCoa_penjualan)
                
                var optCoa_hutang = "<option value = '' >--Pilih--</option>";
                for (var s = 0; s < data.coa_hutang.length; s++) {
                    optCoa_hutang += "<option value = " + data.coa_hutang[s].no_coa + ">"+ data.coa_hutang[s].no_coa+ ' - ' + data.coa_hutang[s].nama + "</option>"
                }
                $("#sel_coa_hp").html(optCoa_hutang)
                
                var optCoa_piutang = "<option value = '' >--Pilih--</option>";
                for (var s = 0; s < data.coa_piutang.length; s++) {
                    optCoa_piutang += "<option value = " + data.coa_piutang[s].no_coa + ">"+ data.coa_piutang[s].no_coa+ ' - ' + data.coa_piutang[s].nama + "</option>"
                }
                $("#sel_coa_piutang").html(optCoa_piutang)
                $("#sel_coa_titipan").html(optCoa_piutang)

                var optCoa_cadangan = "<option value = '' >--Pilih--</option>";
                for (var s = 0; s < data.coa_cadangan.length; s++) {
                    optCoa_cadangan += "<option value = " + data.coa_cadangan[s].no_coa + ">"+ data.coa_cadangan[s].no_coa+ ' - ' + data.coa_cadangan[s].nama + "</option>"
                }
                $("#sel_coa_cadangan").html(optCoa_cadangan)
                
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