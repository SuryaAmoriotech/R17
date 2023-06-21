
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>my-assets/css/css.css" /> 
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
 <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/3/css/bootstrap.css" /> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>



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

            <h1>Timesheet</h1>

            <small><?php echo $title ?></small>

            <ol class="breadcrumb">

                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>

                <li><a href="#">HRM</a></li>

                <li class="active" style="color:orange">Timesheet</li>

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
                    <?php echo form_open('Cquotation/insert_quotation', array('class' => 'form-vertical', 'id' => 'insert_quotation')) ?>
                    <div class="panel-body">
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="customer" class="col-sm-4 col-form-label">Employee Name<i class="text-danger">*</i></label>
                                <div class="col-sm-8">
                                        <input type="text" name="templ_name" placeholder="Employee Name" value="" class="form-control">
                                        
                                </div>
                            </div>
                        </div>


                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="qdate" class="col-sm-4 col-form-label">Month</label>
                                <div class="col-sm-8">
                                    <input type="text" name="qdate" class="form-control datepicker" id="qdate" value="<?php echo date('Y-m-d') ?>">
                                </div>
                            </div>

                            </div>

                            <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="customer" class="col-sm-4 col-form-label">Job title<i class="text-danger">*</i></label>
                                <div class="col-sm-8">
                                        <input type="text" name="templ_name" placeholder="Job title" value="" class="form-control">
                                        
                                </div>
                            </div>
                        </div>



                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="customer" class="col-sm-4 col-form-label">Payment terms<i class="text-danger">*</i></label>
                                <div class="col-sm-8">
                               
                                    <?php   if ($this->session->userdata('u_type') == 3){ ?>
                                        <input type="text" name="cname" value="<?php echo $this->session->userdata('user_name') ?>" class="form-control" readonly>
                                        <input type="hidden" name="customer_id" value="<?php echo $this->session->userdata('user_id') ?>" class="form-control">
                                    <?php  } else { ?>
                                        <select name="customer_id" class="form-control" onchange="get_customer_info(this.value)"  data-placeholder="<?php echo display('select_one'); ?>">

                                           
                                        <option value="monthly"> Select   </option>
                                                    
                                                

                                                <option value="monthly">
                                                    Monthly
                                                </option>
                                                <option value="weekly">
                                                    Weekly
                                                </option>
                                                <option value="bi-weekly">
                                                    Bi-weekly
                                                </option>
                                            
                                        </select>
                                    <?php } ?>
                                </div>
                            </div>

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
								<tbody>
                                    <tr>
                                        <td>01-01-2022</td>
                                        <td>Saturday</td>
                                        <td>08:00</td>
                                        <td>017:00</td>
                                        <td>08:00</td>
                                    </tr>
                                    <tr>
                                        <td>02-01-2022</td>
                                        <td>Sunday</td>
                                        <td>09:00</td>
                                        <td>17:00</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>03-01-2022</td>
                                        <td>Monday</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>04-01-2022</td>
                                        <td>Tuesday</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>05-01-2022</td>
                                        <td>Wednesday</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>06-01-2022</td>
                                        <td>Thursday</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>07-01-2022</td>
                                        <td>Friday</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>01-01-2022</td>
                                        <td>Saturday</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>08-01-2022</td>
                                        <td>Sunday</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>

                                     <tr>
                    <td colspan="4" class="text-right">Total hours worked:</td>  
                    <td>160</td>
                 
                                </tr>
                                <tr>
                    <td colspan="4" class="text-right">Total days worked:</td>  
                    <td>20</td>
                 
                                </tr>
                                    
								</tbody>
                               
                                <tfoot>
          

                 
                                </tfoot>


		                    </table>
		                </div>
                        <a href="<?php echo base_url('Chrm/pay_slip') ?>"      style="float:right;color:white;background-color: #38469f;"   class="btn btn-info m-b-5 m-r-2">Generate pay slip </a>

                    </div>               
                    <?php echo form_close() ?>
                </div>
            </div>
        </div>
    </section>


</div>



