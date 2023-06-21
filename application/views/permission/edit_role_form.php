<!-- Add new role start -->

<style type="text/css">
    .alert-success
    {
        background-color: #dff0d8;
        color: #000;
        display: none;
    }
</style>
<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1><?php echo $title ?></h1>
            <small><?php echo $title ?></small>
            <ol class="breadcrumb">
                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#"><?php echo display('permission') ?></a></li>
                <li class="active"><?php echo $title ?></li>
            </ol>
        </div>
    </section>

    <section class="content">
        <!-- Alert Message -->
       
         <div class="alert alert-success" >
  <strong>Success!</strong>Roles Updated Successfully
</div>



        <!-- New customer -->
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bd lobidrag">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h4><?php echo $title ?></h4>
                        </div>
                    </div>
                     <form action="<?php echo base_url('Permission/update_roles'); ?>"  method="post">
                        <input type="hidden" name="rid" value="<?php echo $role[0]['role_id']; ?>">
                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">

                    <div class="panel-body">
                         <div class="form-group row">
                            <label for="type" class="col-sm-3 col-form-label"><?php echo display('role_name') ?> <i class="text-danger">*</i></label>
                            <div class="col-sm-6">
                                <input type="text" tabindex="2" class="form-control" name="rolename" id="type" value="<?php echo $type[0]['type']; ?>" required />
                            </div>
                        </div>
                        <table class="table table-striped">
             <?php

            $m=1;
            
            $split=array();
                           foreach($name  as $test['items']){
                       //    $i=0;
                      foreach($test['items']  as $t){

    $split=explode(',',$t);
 
}
}
//print_r($split);
foreach($split as $sp){
     $c=explode('-',$sp);
     $l=array();
   // foreach($c as $z){
        $l['nam']=$c[0];
         $l['num']=$c[1];
//}


}
//   for($i=0;$i<count($split);$i++){
//     echo $split[$i];

//   }


         //  for($j=0;$j<count($accounts);$j++){

   

  $i=0;
         foreach($accounts as $value) {
               

       ?>
                
                    
                    <tr>     
               <?php   // for($i=0;$i<count($split);$i++){ ?>
                        <td><?php   echo $value['name'];?></td>
                                               <?php 
                                               
  //  if (strpos($split[$i],$value['name']) !== false) {   
   
                        ?>  
                          <td><input type="checkbox" name="<?php echo $value['name'];?>_read"  <?php for($i=0;$i<count($split);$i++){    if (strpos($split[$i],$value['name']) !== false) { if (strpos($split[$i],"0100") !== false){ echo 'checked';}}} ?> >Read </td>
                        <td>
                            <input type="checkbox" name="<?php echo $value['name'];?>_create" <?php for($i=0;$i<count($split);$i++){    if (strpos($split[$i],$value['name']) !== false) { if (strpos($split[$i],"1000") !== false){ echo 'checked';}}} ?>>Create<?php  ?>
                        </td> 
                      
                        <td><input type="checkbox" name="<?php echo $value['name'];?>_delete"  <?php for($i=0;$i<count($split);$i++){    if (strpos($split[$i],$value['name']) !== false) { if (strpos($split[$i],"0001") !== false){ echo 'checked';}}} ?>>Delete</td> 
                      
                      
                      <td><input type="checkbox" name="<?php echo $value['name'];?>_update" <?php for($i=0;$i<count($split);$i++){    if (strpos($split[$i],$value['name']) !== false) { if (strpos($split[$i],"0010") !== false){ echo 'checked';}}} ?> >Update</td> 
                    
                  <?php ?>
                    </tr>
                        
                   
              
                    
                    <?php $sl = 0 ?>
                
           
                <?php  $i++;
          //   break; 
    
       //  } 
           }  ?>
                </table>
                <div class="form-group text-right">
                <input type="hidden" name="uid" value="<?php echo $_SESSION['user_id'];?>">  
                <button type="submit" class="btn btn-warning w-md m-b-5"><?php echo display('update') ?></button>
            </div>
    </form>
                    </div>
                   
                </div>
            </div>
        </div>

    </section>
</div>
<!-- Add new role end -->

<script type="text/javascript">

    
</script>
