<!-- footer content -->
<footer>
          <div class="pull-right">
          ©2022 All Rights Reserved. KAG IT Programmer
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="<?= base_url()?>/assets/vendors/jquery/dist/jquery.min.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script> -->
    <!-- Datatables -->
    <script src="<?= base_url()?>/assets/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url()?>/assets/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="<?= base_url()?>/assets/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?= base_url()?>/assets/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="<?= base_url()?>/assets/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="<?= base_url()?>/assets/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="<?= base_url()?>/assets/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="<?= base_url()?>/assets/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="<?= base_url()?>/assets/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="<?= base_url()?>/assets/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?= base_url()?>/assets/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="<?= base_url()?>/assets/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    
    <!-- Bootstrap -->
    <script src="<?= base_url()?>/assets/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- select 2 -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <!-- <script src="<?php echo base_url() ?>/assets/plugins/select2/js/select2.full.min.js"></script> -->
    <!-- TOOGLE -->
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
    <!-- FastClick -->
    <script src="<?= base_url()?>/assets/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="<?= base_url()?>/assets/vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="<?= base_url()?>/assets/vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="<?= base_url()?>/assets/vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="<?= base_url()?>/assets/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="<?= base_url()?>/assets/vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="<?= base_url()?>/assets/vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="<?= base_url()?>/assets/vendors/Flot/jquery.flot.js"></script>
    <script src="<?= base_url()?>/assets/vendors/Flot/jquery.flot.pie.js"></script>
    <script src="<?= base_url()?>/assets/vendors/Flot/jquery.flot.time.js"></script>
    <script src="<?= base_url()?>/assets/vendors/Flot/jquery.flot.stack.js"></script>
    <script src="<?= base_url()?>/assets/vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="<?= base_url()?>/assets/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="<?= base_url()?>/assets/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="<?= base_url()?>/assets/vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="<?= base_url()?>/assets/vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="<?= base_url()?>/assets/vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="<?= base_url()?>/assets/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="<?= base_url()?>/assets/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="<?= base_url()?>/assets/vendors/moment/min/moment.min.js"></script>
    <script src="<?= base_url()?>/assets/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- Switchery -->
    <script src="<?= base_url()?>/assets/vendors/switchery/dist/switchery.min.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="<?= base_url()?>/assets/build/js/custom.min.js"></script>
    <!-- inputmask -->
    <script src="<?php echo base_url() ?>/assets/build/js/jquery_maskmoney.js"></script>
    
    <script type="text/javascript">
      $(document).ready(function(){
        
        $(".myTable").DataTable({
          "retrieve" : true,
          "responsive": true,
          "lengthChange": false,
          "autoWidth": false,
          "lengthMenu": [

            [10, 25, 50, "All"]
          ]
        });
        $(".scroll_able").DataTable({scrollX : true});
        $("#moneyInput, #money_input, .currency_input, .money").maskMoney({
          // prefix: 'Rp ',
          thousands: '.',
          decimal: ',',
          affixesStay: false,
          precision: 2,
          allowNegative : true
        });
        $('.select2').select2()
        $('.select2bs4').select2({
          theme: 'bootstrap4'
        })
      })
    </script>
  </body>
</html>