
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>my-assets/css/css.css" />
<?php  error_reporting(1); ?>
<!-- Manage Invoice Start -->
<style>
    
    table.table.table-hover.table-borderless td {
    border: 0;
}
.select2{
    display:none;
}
</style>

<div class="content-wrapper">

    <section class="content-header" style="height:70px;">

        <div class="header-icon">

            <i class="pe-7s-note2"></i>

        </div>

        <div class="header-title">

            <h1>Taxes</h1>

         

            <ol class="breadcrumb">

                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>

                <li><a href="#">Taxes</a></li>

                <li class="active" style="color:orange">Federal Taxes</li>

            </ol>

        </div>

    </section>



    <section class="content">

        <!-- Alert Message -->

        <?php

        $message = $this->session->userdata('message');

        if (isset($message)) {

            ?>

            <div class="alert alert-info alert-dismissable" style="color:white;background-color:#38469f;">

                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

                <?php echo $message ?>                    

            </div>

            <?php

            $this->session->unset_userdata('message');

        }

        $error_message = $this->session->userdata('error_message');

        if (isset($error_message)) {

            ?>

            <div class="alert alert-danger alert-dismissable" style="color:white;background-color:#38469f;">

                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

                <?php echo $error_message ?>                    

            </div>

            <?php

            $this->session->unset_userdata('error_message');

        }

        ?>



       



        <!-- date between search -->

          <div class="row">

             <div class="col-sm-12">

                <div class="panel panel-default">

                    <div class="panel-body"> 


                        <div class="row">

                         <h3 class="col-sm-3" style="margin: 0;">Federal Taxes </h3>

                         

                    </div>



                </div>

            </div>

            </div>

        </div>

       

        <!-- Manage Invoice report -->

        <div class="row">

            <div class="col-sm-12">

                <div class="panel panel-bd lobidrag">

                    <div class="panel-heading">

                    </div>

                    <div class="panel-body">

                        <div class="table-responsive" >

                            <form action="<?php echo base_url(); ?>Chrm/add_taxes_detail" method="post">

                            <table class="table table-hover table-bordered" cellspacing="0" width="100%" id=""> 

                                <thead>

                                    <tr style="height:25px;">

                                    <th><?php echo display('sl') ?></th>

                                    <th>Tax Name</th>

                               

                                    <th class="text-center"><?php echo display('action') ?></th>

                                    </tr>

                                </thead>

                               <tbody>

                                    <tr role="row" class="odd">
                                        <td tabindex="0">1</td>
                                        
                                        <td>Federal Income Tax</td>

                                        <!-- <?php //echo base_url('Chrm/add_taxes_detail') ?> -->
                                        
                                        <td><a href="<?php echo base_url('Chrm/add_taxes_detail') ?>"  class="btn btnclr btn-sm federal_tax" data-toggle="tooltip" data-placement="left" title="" data-original-title="Add Taxes Detail"><i class="fa fa-window-restore"  aria-hidden="true"></i></a>
                                        <input type="hidden" name="tax" id="federal_tax" value="Federal Income tax">
                                        </td>
                                    </tr>


                                    <tr role="row" class="odd">
                                        <td tabindex="0">2</td>
                                        
                                        <td>Social Security</td>


                                        
                                        <td>  <a href="<?php echo base_url('Chrm/socialsecurity_detail') ?>"  class="btn btnclr btn-sm social_security" id="social_security" data-toggle="tooltip" data-placement="left" title="" data-original-title="Add Taxes Detail"><i class="fa fa-window-restore" aria-hidden="true"></i></a>
                                            <input type="hidden" name="tax" id="social_security" value="Social Security">
                                        </td>
                                    </tr>




                                    <tr role="row" class="odd">
                                        <td tabindex="0">3</td>
                                        
                                        <td>Medicare</td>


                                        
                                        <td>  <a href="<?php echo base_url('Chrm/medicare_detail') ?>"  class="btn btnclr btn-sm medicare" data-toggle="tooltip" data-placement="left" title="" data-original-title="Add Taxes Detail"><i class="fa fa-window-restore" aria-hidden="true"></i></a>
                                        </td>
                                    </tr>


                                    <tr role="row" class="odd">
                                        <td tabindex="0">4</td>
                                        
                                        <td>Federal Unemployment</td>


                                        
                                        <td>  <a href="<?php echo base_url('Chrm/federalunemployment_detail') ?>"  class="btn btnclr btn-sm federal_unemployment" data-toggle="tooltip" data-placement="left" title="" data-original-title="Add Taxes Detail"><i class="fa fa-window-restore" aria-hidden="true"></i></a>
                                        </td>
                                    </tr>

                                </tbody>

                                <tfoot>

                   
 <th></th>  
                

                  <th></th>  

                  <th></th> 

                                </tfoot>

                            </table>

                            </form>

                        </div>

                       



                    </div>

                </div>

                <input type="hidden" id="total_invoice" value="<?php echo $total_invoice;?>" name="">

                 <input type="hidden" id="currency" value="{currency}" name="">

            </div>

        </div>















        <!-- date between search -->

        <div class="row">

             <div class="col-sm-12">

                <div class="panel panel-default">

                    <div class="panel-body"> 


                        <div class="row">

                         <h3 class="col-sm-3" style="margin: 0;">State and Local Taxes </h3>

                          <div class="col-sm-9 text-right">



                         <a href="#" data-toggle="modal" data-target="#add_states" style="color:white;background-color:#38469f;" class="btn"> Add States </a>


                             <a href="#" data-toggle="modal" data-target="#add_state_tax" style="color:white;background-color:#38469f;" class="btn">Add New State Tax </a>

                    </div>

                    </div>




                       

                  

          

                </div>

            </div>

            </div>

        </div>

       

        <!-- Manage Invoice report -->
<?php //print_r($states_list);

?>
        <div class="row">
<style>
    tr.noBorder td {
  border: 0;
}
.table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
border-top:none;
}
    </style>
            <div class="col-sm-12">

                <div class="panel panel-bd lobidrag">

                    <div class="panel-heading">

                    </div>

                    <div class="panel-body" style="overflow-y: auto;height:500px;">

                        <div class="table-responsive" >
                            <?php 
 echo "<table border='0' class='table table-striped' cellspacing='0' cellpadding='0' style='table-layout:fixed;

border-collapse:collapse;'>
                <thead style='height:25px;'>
           
                   <th style='text-align:center;width:30px;'>".display('sl')."</th>
                    <th style='text-align:center;'>State Name</th>
                    <th style='text-align: start;'>State Taxes</th>
                   
                </thead><tbody>";
                $k=1;
          for($i=0; $i < sizeof($states_list); $i++) {
                   // echo $states_list[$i];
                  $splt=explode(",",$states_list[$i]['tax']);
                 
                  $j=1;
               
                   echo "<tr><td>".$k."</td><td class='state_name' style='text-align:center;font-weight:bold;' rowspan='".$j."'>". $states_list[$i]['state']."</td><td><table>";
                  
                   foreach($splt as $sp){
                   
          //  $empName = $states_list[$i];
          
         

            # If this row is not printed then print.
            # and make the printed value to "yes", so that
            # next time it will not printed.
          
               
              if(!empty($sp) && $sp !==','){
            $sp_url= str_replace(" ","_",$sp);
            echo "<tr><td style='display:none' class='state_name'>". $states_list[$i]['state']."</td><td style='width:450px;' class='tax_value'>".$sp."</td> <td>  <a  href=".base_url('Chrm/add_state_taxes_detail/'.$states_list[$i]['state']."-".$sp_url)." class='btn btnclr btn-sm' data-toggle='tooltip' data-placement='left'  data-original-title='Add Taxes Detail'><i class='fa fa-window-restore' aria-hidden='true'></i></a>
                                        <a  class='delete_item btn btnclr btn-sm' ><i class='fa fa-trash' aria-hidden='true'></i></a>     </td></tr></td>";
                  }
                else{
  echo "<tr><td style='display:none' class='state_name'>". $states_list[$i]['state']."</td><td style='width:485px;' style='display:none'>&nbsp</td> <td>  
  <a   class='delete_item btn btnclr btn-sm'><i class='fa fa-trash' aria-hidden='true'></i></a>     </td></tr></td>";
break;
                }
                }
            echo "</table></tr>";
                
            $j++;$k++;
        }
        echo "</table>";
                ?>
                           

                            

                        </div>

                       



                    </div>

                </div>

                <input type="hidden" id="total_invoice" value="<?php echo $total_invoice;?>" name="">

                 <input type="hidden" id="currency" value="{currency}" name="">

            </div>

        </div>





    </section>

</div>




   <div class="modal fade modal-success" id="add_states" role="dialog">

                <div class="modal-dialog" role="document">

                    <div class="modal-content">

                        <div class="modal-header" style="color:white;background-color:#38469f;">

                            

                            <a href="#" class="close" data-dismiss="modal">&times;</a>

                            <h3 class="modal-title">Add New States</h3>

                        </div>

                        

                        <div class="modal-body">

                            <div id="customeMessage" class="alert hide"></div>

                       <?php echo form_open('Chrm/add_state', array('class' => 'form-vertical', 'id' => 'newcustomer')) ?>

                    <div class="panel-body">

   <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">

                        <div class="form-group row">

                            <label for="customer_name" class="col-sm-3 col-form-label">State Name<i class="text-danger">*</i></label>

                            <div class="col-sm-6">

                                <input class="form-control" name ="state_name" id="" type="text" placeholder="State Name"  required="" tabindex="1">

                            </div>

                        </div>

                      

                    </div>

                    

                        </div>



                        <div class="modal-footer">

                            

                            <a href="#" class="btn btn-danger" data-dismiss="modal">Close</a>

                            

                            <input type="submit" class="btn btn-success" style="color:white;background-color:#38469f;" value="Submit">

                        </div>

                        <?php echo form_close() ?>

                    </div><!-- /.modal-content -->

                </div><!-- /.modal-dialog -->

            </div><!-- /.modal -->






   <div class="modal fade modal-success" id="add_state_tax" role="dialog">

                <div class="modal-dialog" role="document">

                    <div class="modal-content">

                        <div class="modal-header" style="color:white;background-color:#38469f;">

                            

                            <a href="#" class="close" data-dismiss="modal">&times;</a>

                            <h3 class="modal-title">Add New States Tax</h3>

                        </div>

                        

                        <div class="modal-body">

                            <div id="customeMessage" class="alert hide"></div>

                       <?php echo form_open('Chrm/add_state_tax', array('class' => 'form-vertical', 'id' => 'add_state_tax')) ?>

                    <div class="panel-body">

   <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">


             <div class="form-group row">

                            <label for="customer_name" class="col-sm-3 col-form-label">State Name<i class="text-danger">*</i></label>

                            <div class="col-sm-6">

                                <select class="form-control" name="selected_state" required> 
                                    <option value="" selected disabled><?php echo display('select_one') ?></option>
                                    <?php  foreach($states_list as $state){ ?>
                                    <option value="<?php  echo $state['state']; ?>"><?php  echo $state['state']; ?></option>
                                    <?php  }  ?>
                                </select>

                            </div>

                        </div>




                        <div class="form-group row">

                            <label for="customer_name" class="col-sm-3 col-form-label">Tax Name<i class="text-danger">*</i></label>

                            <div class="col-sm-6">

                                <input class="form-control" name ="state_tax_name" id="" type="text" placeholder="State Tax Name"  required="" tabindex="1">

                            </div>

                        </div>

                      

                    </div>

                    

                        </div>



                        <div class="modal-footer">

                            

                            <a href="#" class="btn btn-danger" data-dismiss="modal">Close</a>

                            

                            <input type="submit" class="btn btn-success" style="color:white;background-color:#38469f;" value="Submit">

                        </div>

                        <?php echo form_close() ?>

                    </div><!-- /.modal-content -->

                </div><!-- /.modal-dialog -->

            </div><!-- /.modal -->

<!-- Manage Invoice End -->
<div class="modal fade" id="myModal1" role="dialog" >
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content" style="margin-top: 190px;">
        <div class="modal-header" style="color:white;background-color:#38469f;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">HR</h4>
        </div>
        <div class="modal-body" id="bodyModal1" style="text-align:center;font-weight:bold;">
          
      
     
        </div>
        <div class="modal-footer">
          
        </div>
      </div>
      
    </div>
  </div>
<link rel="stylesheet" type="text/css" href="//code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css">

<!-- <input type="hidden" name="<?php //echo $this->security->get_csrf_token_name();?>" value="<?php //echo $this->security->get_csrf_hash();?>"> -->


<script type="text/javascript">

var csrfName = '<?php echo $this->security->get_csrf_token_name();?>';
var csrfHash = '<?php echo $this->security->get_csrf_hash();?>';







$(document).ready(function(){
  $(".federal_tax").click(function(){
    var tax = $(this).closest('tr').find('#federal_tax').val();
    $.ajax({
        type: "POST",
        url: '<?php echo base_url(); ?>Chrm/add_taxes_detail',
           
        data: {<?php echo $this->security->get_csrf_token_name();?>: csrfHash,tax:tax},
        success:function(data)
        {    
             location.reload(); 
        },
        error: function (){ }
    })
  });
    $(".delete_item").click(function(){
    var tax = $(this).closest('tr').find('td.tax_value').text();
     var state = $(this).closest('tr').find('td.state_name').text();
     var dataString = {
        tax : tax,
        state : state
    
   };
   dataString[csrfName] = csrfHash;
    $.ajax({
        type: "POST",
        url: '<?php echo base_url(); ?>Chrm/delete_tax',
           
        data: {<?php echo $this->security->get_csrf_token_name();?>: csrfHash,tax:tax,state:state},
        success:function(data)
        {     
            location.reload();
        },
        error: function (){ }
    })
  });
});
//   $('#add_states').submit(function (event) {
   
       
//    var dataString = {
//        dataString : $("#add_states").serialize()
   
//   };
//   dataString[csrfName] = csrfHash;
 
//    $.ajax({
//        type:"POST",
//        dataType:"json",
//        url:"<?php echo base_url(); ?>Chrm/add_state",
//        data:$("#add_states").serialize(),

//        success: function (data) {
      
//        $("#bodyModal1").html("New State Added Successfully");
   
//         $('#myModal1').modal('show');
//        window.setTimeout(function(){
      
     
//         $('#myModal1').modal('hide');
    
//      }, 2000);
     
//       }

//    });
//    event.preventDefault();
// });


</script>