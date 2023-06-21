



<!-- Add new tax start -->

<div class="content-wrapper">

    <section class="content-header">

        <div class="header-icon">

            <i class="pe-7s-note2"></i>

        </div>

        <div class="header-title">

            <h1><?php echo display('tax') ?></h1>

            <small>Add Taxes</small>

            <ol class="breadcrumb">

                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>

                <li><a href="#"><?php echo display('tax') ?></a></li>

                <li class="active"><?php echo display('add_incometax') ?></li>

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

        <div class="col-sm-12 col-md-12">

            <div class="panel">

                <div class="panel-heading">

                    <div class="panel-title">

                        <h4><?php echo display('setup_tax') ?></h4>

                    </div>

                </div>

                    <div class="panel-body">



                    <?php echo  form_open('Caccounts/create_tax_setup') ?>

<input type="hidden" name="tax_name" value="<?php echo  $this->uri->segment(3);  ?>"/>




                    <table class="table table-bordered table-hover"   id="POITable"  border="0">

        <tr>

            <td><?php echo display('sl') ?></td>

            <td>Employer%<strong><i class="text-danger">*</i></strong></td>

            <td>Employee%<strong><i class="text-danger">*</i></strong></td>

            <td>Details<strong><i class="text-danger">*</i></strong></td>

            <td colspan="2">Single<strong><i class="text-danger">*</i></strong></td>
             <td colspan="2">Tax filling jointly / Married<strong><i class="text-danger">*</i></strong></td>

          <td colspan="2">Married - file separately<strong><i class="text-danger">*</i></strong></td>

          <td colspan="2">Head of household<br>(single mom / father - have children)<strong><i class="text-danger">*</i></strong></td>



            <td class="paddin5ps" style="position: relative; left: 25px;"><?php echo display('delete') ?></td>

            <td style="position: relative; left: 30px;"><?php echo display('add_more') ?></td>

        </tr>

<tr>
    <td></td>  <td></td>  <td></td>  <td></td>
    <td>From</td>
    <td>To</td>
    <td>From</td>
    <td>To</td>
    <td>From</td>
    <td>To</td>
    <td>From</td>
    <td>To</td>


</tr>
        <?php  $s=1; foreach ($taxinfo as $tax) { ?>
        <tr>
            <td><?php echo $s; ?></td>

            <td class="paddin5ps" required><input  type="text" class="form-control" id="start_amount" value="<?php if($tax['employer']){ echo $tax['employer'];}else{echo "";} ?>" name="employer[]"  required/></td>

            <td class="paddin5ps"><input  type="text" class="form-control" id="end_amount" value="<?php if($tax['employee']){ echo $tax['employee'];}else{echo "";} ?>"  name="employee[]"  required/></td>

            <td class="paddin5ps"><input  type="text" class="form-control" id="rate"  value="<?php if($tax['details']){ echo $tax['details'];}else{echo "";} ?>" name="details[]"  required/></td>

              <td class="paddin5ps"><input  type="text" class="form-control" id="single_from" value="<?php if($tax['single']){ $split=explode('-',$tax['single']); if($split[0]){ echo $split[0];}else{echo "";}} ?>"  name="single[]"  required/></td>
              <td class="paddin5ps"><input  type="text" class="form-control" id="single_to" value="<?php if($tax['single']){ $split=explode('-',$tax['single']); if($split[1]){ echo $split[1];}else{echo "";}} ?>"  name="single[]"  required/></td>
             
              <td class="paddin5ps"><input  type="text" class="form-control" id="tax_filling_from" value="<?php if($tax['tax_filling']){ $split=explode('-',$tax['tax_filling']); if($split[0]){ echo $split[0];}else{echo "";}} ?>"  name="tax_filling[]"  required/></td>
              <td class="paddin5ps"><input  type="text" class="form-control" id="tax_filling_to" value="<?php if($tax['tax_filling']){ $split=explode('-',$tax['tax_filling']); if($split[1]){ echo $split[1];}else{echo "";}} ?>"  name="tax_filling[]"  required/></td>
           
           
           
              <td class="paddin5ps"><input  type="text" class="form-control" id="rate" value="<?php if($tax['married']){ $split=explode('-',$tax['married']); if($split[0]){ echo $split[0];}else{echo "";}} ?>"  name="married[]"  required/></td>
              <td class="paddin5ps"><input  type="text" class="form-control" id="rate" value="<?php if($tax['married']){ $split=explode('-',$tax['married']); if($split[1]){ echo $split[1];}else{echo "";}} ?>"  name="married[]"  required/></td>

             <td class="paddin5ps"><input  type="text" class="form-control" id="rate" value="<?php if($tax['head_household']){ $split=explode('-',$tax['head_household']); if($split[0]){ echo $split[0];}else{echo "";}} ?>"  name="head_household[]"  required/></td>
              <td class="paddin5ps"><input  type="text" class="form-control" id="rate" value="<?php if($tax['head_household']){ $split=explode('-',$tax['head_household']); if($split[1]){ echo $split[1];}else{echo "";}} ?>"  name="head_household[]"  required/></td>

   
        </tr>
      

       <?php $s++; }  ?>
        <tr>

            <td><?php echo $s; ?></td>

            <td class="paddin5ps" required><input  type="text" class="form-control" id="start_amount"  name="start_amount[]"  required/></td>

            <td class="paddin5ps"><input  type="text" class="form-control" id="end_amount"   name="end_amount[]"  required/></td>

            <td class="paddin5ps"><input  type="text" class="form-control" id="rate"   name="rate[]"  required/></td>

             <td class="paddin5ps"><input  type="text" class="form-control" id="rate"   name="single_from[]"  required/></td>
              <td class="paddin5ps"><input  type="text" class="form-control" id="rate"   name="single_to[]"  required/></td>


               <td class="paddin5ps"><input  type="text" class="form-control" id="rate"   name="tax_filling_from[]"  required/></td>
                <td class="paddin5ps"><input  type="text" class="form-control" id="rate"   name="tax_filling_to[]"  required/></td>
                 

                <td><input  type="text" class="form-control" id="rate"   name="married_from[]"  required/></td>
                <td><input  type="text" class="form-control" id="rate"   name="married_to[]"  required/></td>



                <td><input  type="text" class="form-control" id="rate"   name="head_household_from[]"  required/></td>
                <td class="paddin5ps"><input  type="text" class="form-control" id="rate"   name="head_household_to[]"  required/></td>



            <td class="paddin5ps"><button type="button" id="delPOIbutton" class="btn btn-danger" style="position: relative; left: 25px;" value="Delete" onclick="deleteTaxRow(this)"><i class="fa fa-trash"></i></button></td>

            <td class="paddin5ps"><button type="button" id="addmorePOIbutton" class="btn btn-success" style="position: relative; left: 30px;" value="Add More POIs" onclick="TaxinsRow()"><i class="fa fa-plus-circle"></button></td>


        </tr>
               <?php $s++;   ?>

        </table>



        <br>
                        <div class="form-group text-center">

                            <!-- <button type="reset" class="btn btn-primary w-md m-b-5"><?php echo display('reset') ?></button> -->

                            <button type="submit" class="btn btn-success w-md m-b-5"><?php echo display('setup') ?></button>

                        </div>

                    <?php echo form_close() ?>



                 </div>  

             </div>

        </div>

    </div>

    

    </section>

</div>

<!-- Add new tax end -->





