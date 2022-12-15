<!-- page content -->
<div class="right_col" role="main">
    <!-- top tiles -->
    <div class="row" style="display: inline-block;" >
            <div class="tile_count">
                <div class="col-md-4 col-sm-4  tile_stats_count">
                <span class="count_top"><i class="fa fa-user"></i> Total Lokasi Kavling</span>
                <div class="count">13</div>
                </div>
                <div class="col-md-4 col-sm-4  tile_stats_count">
                <span class="count_top"><i class="fa fa-clock-o"></i> Total Kavling</span>
                <div class="count">123</div>
                </div>
                <div class="col-md-4 col-sm-4  tile_stats_count">
                <span class="count_top"><i class="fa fa-user"></i> Total Customer</span>
                <div class="count green">130</div>
                </div>
            </div>
        </div>
          <!-- /top tiles -->
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="dashboard_graph">
                <div class="row x_title">
                    <div class="col-md-6">
                    <h3>Data tables<small> Master Lokasi Kavling</small></h3>
                    </div>
                </div>
                <div class="col-md-12 col-sm-12" >
                    <table id="datatable" class="table table-striped table-bordered myTable" style="width:100%">
                        <thead>
                            <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            foreach($lok_kav as $row){ ?>
                                <tr>
                                    <td><?= $row->id;?></td>
                                    <td><?= $row->lokasi_kav; ?></td>
                                </tr>
                            <?php }
                            ?>    
                        </tbody>
                    </table>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->