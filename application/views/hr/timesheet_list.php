<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>my-assets/css/css.css" />
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/3/css/bootstrap.css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.base64.js"></script>
  <script type="text/javascript" src="<?php echo base_url()?>assets/js/html2canvas.js"></script>
 <script type="text/javascript" src="<?php echo base_url()?>assets/js/jspdf.plugin.autotable"></script>
  <script type="text/javascript" src="<?php echo base_url()?>assets/js/jspdf.umd.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/3/css/bootstrap.css" />
<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
 <script type="text/javascript" src="<?php echo base_url()?>my-assets/js/tableManager.js"></script>
<script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>
<script type="text/javascript" src="http://mrrio.github.io/jsPDF/dist/jspdf.debug.js"></script>
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>my-assets/css/css.css" />
<script type="text/javascript" src="http://www.bacubacu.com/colresizable/js/colResizable-1.5.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/drag_drop_index_table.js"></script>




<div class="content-wrapper">

    <section class="content-header">

        <div class="header-icon">

            <i class="pe-7s-note2"></i>

        </div>

        <div class="header-title">

            <h1><?php echo ('Manage Time Sheet') ?></h1>

            <small></small>

            <ol class="breadcrumb">

                <li><a href=""><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>

                <li><a href="#"><?php echo display('hrm') ?></a></li>

                <li class="active" style="color:orange"><?php echo ('Manage Time Sheet') ?></li>

            </ol>

        </div>

    </section>



    <section class="content">



        <!-- Alert Message -->

        <?php

        $message = $this->session->userdata('message');

        if (isset($message)) {

            ?>

            <div class="alert alert-info alert-dismissable">

                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

                <?php echo $message ?>                    

            </div>

            <?php

            $this->session->unset_userdata('message');

        }

        $error_message = $this->session->userdata('error_message');

        if (isset($error_message)) {

            ?>

            <div class="alert alert-danger alert-dismissable">

                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

                <?php echo $error_message ?>                    

            </div>

            <?php

            $this->session->unset_userdata('error_message');

        }

        ?>



        <!-- Manage Category -->

        <div class="row">

            <div class="col-sm-12">


                









                    

                    <div class="panel panel-default">
                       <div class="panel-body"> 
                        <div class="row">


                    <div class="col-sm-3">
                    <a href="<?php echo base_url('Chrm/add_timesheet') ?>" class="btn btnclr dropdown-toggle" style="color:white;background-color: #337ab7;border-color: #2e6da4;"> <?php echo ('Add Time Sheet') ?></a>
                

                </div>



             

                      
                    <div class="col-sm-6">
                    <a onclick="reload();"  >  <i class="fa fa-refresh" style="font-size:25px;float:right;" aria-hidden="true"></i> </a>
                    </div>  
                    
                    
                    <div class="col-sm-1">
                    <i class="fa fa-cog"  aria-hidden="true" id="myBtn" style="font-size:25px ;" onClick="columnSwitchMODAL()"></i> <!-- onclick opens MODAL -->
                    </div>  

                
                            <div class="dropdown bootcol" id="drop" style="float:right;padding-right:20px;padding-bottom:10px;">
    <button class="btn btnclr dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
       <span class="glyphicon glyphicon-th-list"></span>  <?php echo display('download') ?>
     
    </button>

        


    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">          
      <li><a href="#" id="cmd"> <img src="<?php echo base_url()?>assets/images/pdf.png" width="24px"> PDF</a></li>
      <li class="divider"></li>                   
   
      <li><a href="#" onclick="$('#ProfarmaInvList').tableExport({type:'excel',escape:'false'});"> <img src="<?php echo base_url()?>assets/images/xls.png" width="24px"> XLS</a></li>           

    </ul>


    &nbsp;
    <button type="button" style="float:right;"  class="btn btnclr dropdown-toggle"  onclick="printDiv('printableArea')"><?php echo display('print') ?></button>

                      </div>
                    </div>
                  </div>
                </div>




              
                <div class="panel panel-bd lobidrag">

<div class="panel-body"  id="dataTableExample3" >




<div class="row">
<div class="col-sm-0"  style="text-align:right;">


<div class="panel-title" >
<div id="for_filter_by" class="for_filter_by" style="display: inline;text-align:right;"><label for="filter_by"><?php echo display('Filter By') ?>&nbsp;&nbsp;

</label><select id="filterby" style="border-radius:5px;height:25px;">
<!-- <option value="1"><?php echo display('Sl') ?></option>
<option value="2"><?php echo display('Name') ?></option>
<option value="3"><?php echo ('Designation') ?></option>
<option value="4"><?php echo ('Phone') ?></option>
<option value="5"><?php echo ('Email') ?></option>
<option value="6"><?php echo ('Picture') ?></option> -->

</select> <input id="filterinput" style="border-radius:5px;height:25px;" type="text">

</div>
</div>






</div>
</div>

<div id="printableArea">

    <div class="table-responsive"  id="content">

        <table id="ProfarmaInvList" class="table table-bordered table-striped table-hover datatable" id="ProfarmaInvList" >

            <thead class="sortableTable" >

    <tr  class="sortableTable__header">

    <th class="1 value"  data-col="1"  data-resizable-column-id="1"    ><?php echo display('sl') ?></th>

    <th class="2 value"  data-col="2"  data-resizable-column-id="2"    ><?php echo ('Employee Name') ?></th>

    <th class="3 value"  data-col="3"  data-resizable-column-id="3"   ><?php echo ('Job title') ?></th>

    <th class="4 value"  data-col="4"  data-resizable-column-id="4"   ><?php echo ('Duration') ?></th>

    <th class="5 value"  data-col="5"  data-resizable-column-id="5"   ><?php echo ('Daily Break') ?></th>

    <th class="6 value"  data-col="6"  data-resizable-column-id="6" ><?php echo display('Payment terms') ?></th>

    <th class="7 value"  data-col="7"  data-resizable-column-id="7"><?php echo ('month') ?></th>


    <th class="8 value"  data-col="8"  data-resizable-column-id="8"><?php echo ('Action') ?></th>

    </tr>

            </thead>

            <tbody class="sortableTable__body" id="tab" >


                <?php




                if ($timesheet_list) {

                    ?>

                   

                    <?php

                    $sl = 1;

                     foreach($timesheet_list as $timsht){?>




                    <tr>

                    <td class="1 value" data-col="1"><?php echo $sl;?></td>

 <td class="2 value"  data-col="2">  <?php echo html_escape($timsht['templ_name']);?></a></td>
<td class="3 value"  data-col="3"><?php echo html_escape($timsht['job_title']);?></td>

<td class="4 value"  data-col="4"><?php echo html_escape($timsht['duration']);?></td>

<td class="5 value"  data-col="5"><?php echo html_escape($timsht['dailybreak']);?></td>

<!-- <td class="6 value"  data-col="6"><img src="<?php //echo html_escape($timsht['payment_term']);?>" height="60px" width="80px"></td>  -->

<td class="6 value"  data-col="6"><?php echo html_escape($timsht['payment_term']);?></td>



<td class="7 value"  data-col="7"><?php echo html_escape($timsht['month']);?></td>



 <td class="8 value"  data-col="8" >

                <center>

                    <?php echo form_open() ?>


          <a href="<?php echo base_url() . 'Chrm/edit_timesheet/'.$timsht['timesheet_id']; ?>" class="btnclr btn m-b-5 m-r-2" data-toggle="tooltip" data-placement="left" title="<?php echo display('update') ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>

               <a href="<?php echo base_url() . 'Chrm/employee_payslip_permission/'.$timsht['timesheet_id']; ?>" class="btnclr btn m-b-5 m-r-2" data-toggle="tooltip" data-placement="left" title="Administrator Update"><i class="fas fa-user-tie" aria-hidden="true"></i></a>

               <a class="btnclr btn m-b-5 m-r-2" href="<?php echo base_url('Chrm/timesheed_inserted_data/'.$employees['id'])?>"><i class="fa fa-download" aria-hidden="true"></i></a>
             
             
               <a href="<?php echo base_url('Chrm/employee_delete/'.$employees['id']) ?>" class="btnclr btn m-b-5 m-r-2" onclick="return confirm('<?php echo display('are_you_sure') ?>')" data-toggle="tooltip" data-placement="right" title="" data-original-title="<?php echo display('delete') ?> "><i class="fa fa-trash-o" aria-hidden="true"></i></a>



                        <?php echo form_close() ?>

                </center>

                </td>

                </tr>

               

                <?php

                $sl++;

            }
        }

            ?>

            </tbody>

            <tfoot></tfoot>

        </table>

    </div>

</div>

</div>
</div>
</div>

</div>

</div>

</section>

</div>



