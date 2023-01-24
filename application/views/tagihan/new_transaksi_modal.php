 <!-- MODAL DATA BARU -->
 
<div class="modal-header">
    <h4 class="modal-title" id="myModalLabel">Tambah Data</h4>
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
    </button>
</div>
<div class="modal-body">
    <form id="frm_new_kav">
    <p>
    <h5> Data Kavling </h5>
    </p>
    <div class="row">
        <div class="col-md-2">
            <div class="form-group">
                <label>Kode Kavling</label>
                <input class="form-control" id="txt_kode_kav" type="text" name="kode_kavling" required>
            </div>
        </div>
    </div>
    </form>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
    <button type="button" class="btn btn-primary" onclick="simpan()">Simpan</button>
</div>