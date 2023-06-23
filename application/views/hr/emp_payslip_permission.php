
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>my-assets/css/css.css" /> 
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
 <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/3/css/bootstrap.css" /> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js" integrity="sha512-CryKbMe7sjSCDPl18jtJI5DR5jtkUWxPXWaLCst6QjH8wxDexfRJic2WRmRXmstr2Y8SxDDWuBO6CQC6IE4KTA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

<link href="<?php echo base_url() ?>assets/css/daterangepicker.css" rel="stylesheet">
<link href="<?php echo base_url() ?>assets/css/style.css" rel="stylesheet">


<style>
    .work_table td {
        height: 36px;
    }

    .select2-selection{
        display :none;
    }
</style>
<div class="content-wrapper">

    <section class="content-header">

        <div class="header-icon">

            <i class="pe-7s-note2"></i>

        </div>

        <div class="header-title">

            <h1>Payment Administration</h1>

            <small></small>

            <ol class="breadcrumb">

                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>

                <li><a href="#">HRM</a></li>

                <li class="active" style="color:orange">Payment Administration</li>

            </ol>

        </div>

    </section>

    <section class="content">

        <!-- New category -->
        <div class="row">
            <div class="col-sm-12">                
                <div class="panel panel-bd lobidrag">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <!-- <h4>Employee Timesheet</h4> -->
                        </div>
                    </div>
                    <!-- <?php// echo form_open('Cquotation/insert_quotation', array('class' => 'form-vertical', 'id' => 'insert_quotation')) ?> -->
                  
                    <!-- <form id="insert_timesheet"  method="post">   -->
                  
                    <?php echo form_open_multipart('Chrm/pay_slip','id="validate"' ) ?>

                  
                  
                    <div class="panel-body">
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="customer" class="col-sm-4 col-form-label">Employee Name<i class="text-danger">*</i></label>
                                <div class="col-sm-8">


                                        
                                        <select name="templ_name" id="templ_name" class="form-control"    tabindex="3" style="width100">
       
       

       
                                        <option value=""> <?php echo ('Select Employee Name') ?></option>
                                        <?php  foreach($employee_name as $pt){ ?>
                                            <option value="<?php  echo $pt['id'] ;?>"><?php  echo $pt['first_name'] ;?><?php  echo $pt['last_name'] ;?></option>
                                        <?php  } ?>
        </select>







                                </div>
                            </div>



                            <div class="col-sm-6">
                                <label for="qdate" class="col-sm-4 col-form-label">Duration</label>
                                <div class="col-sm-7">
                                <select name="duration"  id="duration"  class="form-control datepicker"  style="width: 420px;" >

                                                 <option value="">  Select Duration  </option>
                                                 <option value="monthly">Monthly</option>                                            
                                                 <option value="weekly">Weekly</option>                                                                                          
                                                 <option value="bi-weekly"> Bi-weekly </option>                             
                                                 <option value="preweekly"> pre weekly </option>
                                           
                                           
                                                 <?php foreach($duration as $inv){ ?>
          <option value="<?php echo $inv['duration_name'] ; ?>"><?php echo $inv['duration_name'] ; ?></option>
                               <?php    }?>
                                           


                                                </select>   
                                </div>                
                            </div>
                        </div>











                        <div class="form-group row">
                            
                        <div class="col-sm-6">
                                <label for="customer" class="col-sm-4 col-form-label">Job title<i class="text-danger">*</i></label>
                                <div class="col-sm-8">
                                        <input type="text" name="job_title" id="job_title" placeholder="Job title" value="" class="form-control">
                                        
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <label for="dailybreak" class="col-sm-4 col-form-label">Daily Break in mins</label>
                                


                                <div class="col-sm-7">

                                <!-- <input type="text" required tabindex="2" class="form-control " name="dailybreak" value="10" id="dailybreak"  style="width: 500px;"  /> -->

                                <select name="dailybreak"  id="dailybreak"  class="form-control datepicker"  style="width: 420px;" >
    
                                        <?php foreach($dailybreak as $dbd){ ?>

                                            <option selected value="5">  5   </option>

          <option value="<?php echo $dbd['dailybreak_name'] ; ?>"><?php echo $dbd['dailybreak_name'] ; ?></option>
                               <?php    }?>



                                           </select>
                                           </div>


                                        




                            </div>




                            </div>










                            <div class="form-group row">
                            <div class="col-sm-6">
                            <label for="dailybreak" class="col-sm-4 col-form-label">Date Range</label>
                            <div class="col-sm-8">
                                <input id="reportrange" type="text" class="form-control"/>
    
                          
                             
</div>
                            </div>



















                            
                            <div class="col-sm-6">
                                <label for="customer" class="col-sm-4 col-form-label">Payment terms<i class="text-danger">*</i></label>
                                <div class="col-sm-7">
                               
                                    <?php   if ($this->session->userdata('u_type') == 3){ ?>
                                        <input type="text" name="cname" value="<?php echo $this->session->userdata('user_name') ?>" class="form-control" readonly>
                                        <input type="hidden" name="customer_id" value="<?php echo $this->session->userdata('user_id') ?>" class="form-control">
                                    <?php  } else { ?>
                                        <select name="payment_term" id="terms"  class="form-control" onchange="get_customer_info(this.value)"  style="width: 420px;"  data-placeholder="<?php echo display('select_one'); ?>">

                                           
                                        <option value=""> Select Payment Terms </option>
                                                    
                                                

                                                <option value="Cash">
                                                    Cash
                                                </option>
                                                <option value="cheque/check">
                                                Cheque/Check
                                                </option>
                                                   <option value="BankTransfer">
                                                   Bank Transfer
                                                </option>
                                            

                                                <?php foreach($payment_terms as $inv){ ?>
          <option value="<?php echo $inv['payment_terms'] ; ?>"><?php echo $inv['payment_terms'] ; ?></option>
                               <?php    }?>
                                           


                                        </select>
                                    <?php } ?>
                                </div>









                        </div>



                        <div class="form-group row">
                         

                            </div>



                        <div class="table-responsive work_table col-md-12">
		                    <table class="table table-striped table-bordered" cellspacing="0" width="100%" id="PurList"> 
								<thead>
									<tr>
										<th class="col-md-2">Date</th>
										<th class="col-md-1">Day</th>
										<th class="col-md-2">Time started (HH:MM)</th>
										<th class="col-md-2">Time completed (HH:MM)</th>
										<th class="col-md-5">Hours()Calculate based on time started and completed & - 1 hour break</th>
									</tr>
								</thead>
								<tbody id="tBody">
                          
								</tbody>
                               
                                <tfoot>
          
                                <tr style="text-align:end"> 
                                             <td colspan="4" class="text-right">Total hours worked:</td>  
                    
                                            </tr> 

                 
                                </tfoot>


		                    </table>

                                             
                                          
                                        
		                </div>



                        <div class="form-group row">
                            <div class="col-sm-4">


   

                            <div class="panel-heading">
                        <div class="panel-title">



         


                        <div id="" >
<label for="aadhar">Administrator Name<i class="text-danger">*</i></label> 
<input type="text" id="cheque_no" name="cheque_no"   class="form-control" requried /><br />

</div>







<label for="selector">Select Payment Method
<i class="text-danger">*</i>
</label>

<select id="selector" onchange="yesnoCheck(this);"  class="form-control" >
    <option value="select">Choose Payment Method</option>
    <option value="aadhar">Cheque/Check </option>
    <option value="pan">Bank</option>
    <option value="pass">Cash</option>
</select>
<!-- <label for="selector">Select ID Proof</label> -->
</div>

<div id="adc" style="display: none;">
<label for="aadhar">Cheque No<i class="text-danger">*</i></label> 
<input type="text" id="cheque_no" name="cheque_no"   class="form-control" requried /><br />
<label for="aadhar">Cheque Date<i class="text-danger">*</i></label> 
<input type="date" id="cheque_date" name="cheque_date"  class="form-control"  requried/><br />

</div>
<div id="pc" style="display: none;">
<label for="pan">Bank Name<i class="text-danger">*</i></label> 
<input type="text" id="bank_name" name="bank_name"   class="form-control" requried /><br />
<label for="pan">Payment Reference No<i class="text-danger">*</i></label> 
<input type="text" id="payment_refno" name="payment_refno"  class="form-control"  requried/><br />

</div>
<div id="ps" style="display: none;">
<label for="pass">Cash<i class="text-danger">*</i></label> 
<input type="text" id="cash" name="cash"  class="form-control"  value="Cash" readonly /><br />
</div>


</div>
            </div>

 



                        <input type="submit" style="float:right;color:white;background-color: #38469f;" value="Generate pay slip"   class="btn btn-info m-b-5 m-r-2"/> 

                    </div>               
                    <!-- <?php //echo form_close() ?> -->
                    <?php echo form_close() ?>

                                    <!-- </form> -->

            </div>

                </div>
            </div>
        </div>
    </section>


</div>



<script>
    function yesnoCheck(that) 
{
    if (that.value == "aadhar") 
    {
        document.getElementById("adc").style.display = "block";
    }
    else
    {
        document.getElementById("adc").style.display = "none";
    }
    if (that.value == "pan")
    {
        document.getElementById("pc").style.display = "block";
    }
    else
    {
        document.getElementById("pc").style.display = "none";
    }
    if (that.value == "pass")
    {
        document.getElementById("ps").style.display = "block";
    }
    else
    {
        document.getElementById("ps").style.display = "none";
    }
}
</script>