

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/3/css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>my-assets/css/css.css" />





<!-- Company List Start -->
<div class="content-wrapper">
	<section class="content-header">
	    <div class="header-icon">
	        <i class="pe-7s-note2"></i>
	    </div>
	    <div class="header-title">
	        <h1><?php echo display('manage_company') ?></h1>
	        <small></small>
	        <ol class="breadcrumb">
	            <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
	            <li><a href="#"><?php echo display('web_settings') ?></a></li>
	            <li class="active" style="color:orange;" ><?php echo display('manage_company') ?></li>
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


		<!-- Company List -->
		<div class="row">
		    <div class="col-sm-12">
		        <div class="panel panel-bd lobidrag">
		            <div class="panel-heading">
		                <div class="panel-title">
		                   <!-- <a href="<?php echo base_url('User/manage_user'); ?>" class="btnclr btn m-b-5 m-r-2"><i class="ti-plus"> </i> Add Company </a> -->
		               
						   <a href="<?php echo base_url('company_setup/company_branch'); ?>" class="btnclr btn m-b-5 m-r-2"><i class="ti-plus"> </i> <?php echo display('Add Company') ?>  </a>
</div>
		            </div>
		            <div class="panel-body">
		                <div class="table-responsive">
		                    <table id="dataTableExample" class="table table-bordered table-striped table-hover">
				           		<thead>
									<tr>
										<th><?php echo display('sl') ?></th>
										<th class="text-center"><?php echo display('name') ?></th>
										<th class="text-center"><?php echo display('address') ?></th>
										<th class="text-center"><?php echo display('mobile') ?></th>
										<th class="text-center"><?php echo display('website') ?></th>
										<th><?php echo display('action') ?></th>
									</tr>
								</thead>
								<tbody>

								<!-- <?php  // print_r($company_info); ?>  -->

<tr>
<td>
	1
</td>
<td>
     <?php  echo $company_info[0]['company_name'];   ?>
</td>
<td>
     <?php  echo $company_info[0]["address"];   ?>
</td>
<td>
     <?php   echo$company_info[0]["mobile"];   ?>
</td><td>
     <?php  echo $company_info[0]["website"];   ?>
</td>

		</tr>
<?php 
									if ($company_admin_info) {
                                            
										$i =2;

										foreach($company_admin_info as $list){
											// echo $list["create_by"];
											echo "<tr><td>".$i."</td><td>".$list["company_name"]."</td><td>".$list["address"]."</td><td>".$list["mobile"]."</td><td>".$list["website"]."</td>";
								

										
										
										?>
									


	 <td>
											<center>
											<?php echo form_open()?>
												<?php
											
												?>

												<?php
												  ?>
														<a href="<?php echo base_url().'Company_setup/company_update_form/{company_id}'; ?>" class="btnclr btn m-b-5 m-r-2" data-toggle="tooltip" data-placement="left" title="" data-original-title="<?php echo display('update') ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>	
												<?php	
												?>
											<?php echo form_close()?>
											</center>
										</td>


							



										
									</tr>
									<?php	 ?>
								<!-- {/company_list} -->
								<?php
								$i++;	}		}
								?>
								</tbody>
		                    </table>
		                </div>
		            </div>
		        </div>
		    </div>
		</div>
	</section>
</div>
<!-- Company List End -->

