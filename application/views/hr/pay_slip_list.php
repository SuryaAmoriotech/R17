

<!-- Manage Invoice Start -->

<div class="content-wrapper">

    <section class="content-header">

        <div class="header-icon">

            <i class="pe-7s-note2"></i>

        </div>

        <div class="header-title">

            <h1>Generated Pay Slips List</h1>

            <small>Generated List</small>

            <ol class="breadcrumb">

                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>

                <li><a href="#"><?php echo display('invoice') ?></a></li>

                <li class="active">Generated Pay Slips List</li>

            </ol>

        </div>

    </section>



    <section class="content">
      
        <!-- Manage Invoice report -->

        <div class="row">

            <div class="col-sm-12">

                <div class="panel panel-bd lobidrag">

                    <div class="panel-heading">

                    </div>

                    <div class="panel-body">

                        <div class="table-responsive" >

                            <table class="table table-hover table-bordered" cellspacing="0" width="100%" id=""> 

                                <thead>

                                    <tr>

                                    <th><?php echo display('sl') ?></th>


                                    <th>Duration</th>

                                    <th>Job Title</th>
                                    <th>Month</th>

                               

                                    <th class="text-center"><?php echo display('action') ?></th>

                                    </tr>

                                </thead>

                                <tbody>
                                <?php $s = 1; foreach ($timesheet_list as $key => $list) { ?>
                                    <tr role="row" class="odd">
 
                                        <td tabindex="0"><?php echo $s; ?></td>
                                        <td><?php echo $list['duration']; ?></td>
                                        <td><?php echo $list['job_title']; ?></td>
                                        <td><?php echo $list['month']; ?></td>
                                        <td><a href="<?php echo base_url('Chrm/time_list/'.$list['timesheet_id']) ?>" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="left" title="" data-original-title="View Pay Slip"><i class="fa fa-window-restore" aria-hidden="true"></i></a>
                                        </td>
                                        <input type="hidden" value="<?php echo $list['timesheet_id']; ?>">
                                        <input type="hidden" value="<?php echo $list['create_by']; ?>">
                                    </tr>

                                <?php $s++; } ?>

                                </tbody>

                            </table>

                            

                        </div>

                       



                    </div>

                </div>

                <input type="hidden" id="total_invoice" value="<?php echo $total_invoice;?>" name="">

                 <input type="hidden" id="currency" value="{currency}" name="">

            </div>

        </div>

    </section>

</div>

<!-- Manage Invoice End -->

<link rel="stylesheet" type="text/css" href="//code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css">



<script type="text/javascript">
$(function() {
 
  $('table th').resizable({
    handles: 'e',
    stop: function(e, ui) {
      $(this).width(ui.size.width);
    }
  });

});

</script>
