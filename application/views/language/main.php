<!-- Manage Language Start -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>my-assets/css/css.css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1><?php echo display('Manage Language') ?></h1>
            <small></small>
            <ol class="breadcrumb">
                <li><a href="index.html"><i class="pe-7s-home"></i> <?php echo display('Home') ?></a></li>
                <li><a href="#"><?php echo display('Language') ?></a></li>
                <li class="active" style="color:orange"><?php echo display('Manage Language') ?></li>
            </ol>
        </div>
    </section>
<style>
    th{
        text-align:center;
    }
    </style>
    <section class="content">
        <!-- Manage Language -->

        <?php
            $message = $this->session->userdata('message');
            if (isset($message)) {
        ?>
        <div class="alert alert-info alert-dismissable" style="background-color:#38469f;color:white;font-weight:bold;">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <?php echo $message ?>                    
        </div>
        <?php 
            }
        ?>

        <div class="row">
            <div class="col-sm-12"> 
                <?php if($this->permission1->method('add_language','create')->access()){?>
                <a href="<?php echo  base_url('Language/phrase') ?>" class="btn btn-info"><?php echo display('Add Phrase') ?></a>
            <?php }?>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bd lobidrag">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h4></h4>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table id="dataTableExample3" style="text-align:center;" class="table table-bordered table-striped table-hover">
                                 <thead>
                                    <tr>
                                        <td colspan="3" style="text-align:center;">
                                            <?php echo  form_open('language/addlanguage', ' class="form-inline" ') ?> 
                                                <div class="form-group" >
                                                    <label class="sr-only" for="addLanguage"> <?php echo display('Language Name') ?></label>
                                                    <input name="language" type="text" class="form-control" id="addLanguage" placeholder=" <?php echo display('Language Name') ?>">
                                                </div>
                                                  
                                                <button type="submit" class="btn btnclr" style="background-color:#38469f;color:white;"> <?php echo display('Save') ?></button>
                                            <?php echo  form_close(); ?>
                                        </td>
                                    </tr>
                                    <tr style="background-color: #337AB7;border-color: #2E6DA4;color:white;">
                                        <th><i class="fa fa-th-list"></i></th>
                                        <th><?php echo display('Language') ?></th>
                                        <th><i class="fa fa-cogs"></i></th>
                                    </tr>
                                </thead>


                                <tbody>
                                    <?php if (!empty($languages)) {?>
                                        <?php $sl = 1 ?>
                                        <?php foreach ($languages as $key => $language) {?>
                                        <tr>
                                            <td><?php echo  $sl++ ?></td>
                                            <td><?php echo  html_escape($language) ?></td>
                                            <td><a href="<?php echo  base_url("Language/editPhrase/$key") ?>" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>  
                                            </td> 
                                        </tr>
                                        <?php } ?>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- Manage Language End -->



