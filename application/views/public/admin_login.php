<?php include('public_header.php'); ?>
<div class="container col-lg-8 col-md-8 col-sm-8 col-lg-offset-2 col-md-offset-2 col-sm-offset-2">
<?php echo form_open('login/admin_login', ["class"=>"form-horizontal"]); ?>
  <fieldset>
    <legend style="font-size: 24px; margin-left: 110px; margin-right: 100px;">Log In</legend>
    <div class="form-group">
      <?php echo form_label('User Name','inputEmail', ["class"=>"labeltext col-lg-3 col-md-3 col-sm-3 control-label"]) ?>
      <div class="col-lg-4 col-md-4 col-sm-4">
      <?php echo form_input( ["name"=>"username","value"=>set_value("username"),"class"=>"form-control","id"=>"inputEmail", "placeholder"=>"User Name"]); ?>        
      </div>
       <div class="col-lg-5 col-md-5 col-sm-5">
      		<?php echo form_error('username') ?>     
      </div>
    </div>
    <div class="form-group">
     <?php echo form_label('Password','inputPassword', ["class"=>"labeltext col-lg-3 col-md-3 col-sm-3 control-label"]) ?>
      <div class="col-lg-4 col-md-4 col-sm-4">
      <?php echo form_password( ["name"=>"password","value"=>set_value("password"),"class"=>"form-control","id"=>"inputPassword", "placeholder"=>"Password"]); ?>        
      </div>
       <div class="col-lg-5 col-md-5 col-sm-5">
      		<?php echo form_error('password') ?>     
      </div>
    </div>   
    <div class="form-group">
      <div class=" col-lg-8 col-md-8 col-sm-8 col-lg-offset-3 col-md-offset-3 col-sm-offset-3">
        <?php echo form_reset('reset','Reset',["class"=>"btn btn-default"])
                   ,form_submit('submit', 'Submit',["class"=>"btn btn-primary"]); ?>       
      </div>
    </div>
  </fieldset>
</form>
<?php include('public_footer.php'); ?>