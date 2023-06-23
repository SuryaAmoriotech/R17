
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/3/css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>my-assets/css/css.css" />









<!-- Add new bank start -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1><?php echo display('add_new_bank') ?></h1>
            <small><?php echo display('') ?></small>

            <ol class="breadcrumb">
                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#"><?php echo display('bank') ?></a></li>
                <li class="active"><?php echo display('add_new_bank') ?></li>
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

        <div class="row">
            <div class="col-sm-12">
                
            <?php if($this->permission1->method('bank_transaction','create')->access()){ ?>
                  <a href="<?php echo base_url('Csettings/bank_transaction')?>" class="btn btn-info m-b-5 m-r-2"><i class="ti-align-justify"> </i> <?php echo display('bank_transaction')?> </a>
                <?php }?>
                <?php if($this->permission1->method('bank_list','read')->access()){ ?>
                  <a href="<?php echo base_url('Csettings/bank_list')?>" class="btn btn-success m-b-5 m-r-2"><i class="ti-align-justify"> </i>  <?php echo display('manage_bank')?> </a>
                   <?php }?>

               
            </div>
        </div>

        <!-- New bank -->
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bd lobidrag">
                    <div class="panel-heading">
                        <div class="panel-title">
                        </div>
                    </div>
                   <?php echo form_open_multipart('Csettings/add_new_bank',array('class' => 'form-vertical','id' => 'validate' ))?>
                   <!-- <form> -->
                    <div class="panel-body">

                    	<div class="form-group row">
                            <label for="bank_name" class="col-sm-3 col-form-label"><?php echo display('bank_name') ?> <i class="text-danger">*</i></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="bank_name" id="bank_name" required="" placeholder="<?php echo display('bank_name') ?>" tabindex="1"/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="ac_name" class="col-sm-3 col-form-label"><?php echo display('ac_name') ?> <i class="text-danger">*</i></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="ac_name" id="ac_name" required="" placeholder="<?php echo display('ac_name') ?>" tabindex="2"/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="ac_no" class="col-sm-3 col-form-label"><?php echo display('ac_no') ?> <i class="text-danger">*</i></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="ac_number" id="ac_number" required="" placeholder="<?php echo display('ac_no') ?>" tabindex="3"/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="branch" class="col-sm-3 col-form-label"><?php echo display('branch') ?> <i class="text-danger">*</i></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="branch" id="branch" required="" placeholder="<?php echo display('branch') ?>" tabindex="4"/>
                            </div>
                        </div>

                        <!-- <div class="form-group row">
                            <label for="signature_pic" class="col-sm-3 col-form-label"><?php //echo display('signature_pic') ?></label>
                            <div class="col-sm-6">
                                <input type="file" class="form-control" name="signature_pic" id="signature_pic" placeholder="<?php echo display('signature_pic') ?>" tabindex="5"/>
                            </div>
                        </div> -->


                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-4 col-form-label"></label>
                            <div class="col-sm-6">
                                <input type="reset" class="btnclr btn m-b-5 m-r-2" value="<?php echo display('reset') ?>" tabindex="5"/>
                                <input type="submit" id="add-deposit" class="btnclr btn m-b-5 m-r-2 insert_data" name="add-deposit" value="<?php echo display('save') ?>" tabindex="6"/>
                                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                            </div>
                        </div>
                    </div>
                <!-- </form> -->
                    <?php echo form_close()?>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- Add new bank end -->

<!-- <script>
var csrfName = '<?php //echo $this->security->get_csrf_token_name();?>';
var csrfHash = '<?php //echo $this->security->get_csrf_hash();?>';

    $(".insert_data").click(function(event){
    event.preventDefault();
    var bank_name = $('#bank_name').val();
    var ac_name = $('#ac_name').val();
    var ac_number	 = $('#ac_number').val();
    var branch = $('#branch').val();

    $.ajax({
            type:"POST",
            url:"<?php //echo base_url(); ?>Csettings/add_bank",
            data:{<?php //echo $this->security->get_csrf_token_name();?>: csrfHash,bank_name:bank_name,ac_name:ac_name,ac_number:ac_number,branch:branch},
            success:function (data) {
                
            }
    });

});

</script> -->

