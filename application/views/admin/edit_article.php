<?php include_once('admin_header.php') ?>		
	<div class="container col-lg-8 col-md-8 col-sm-8 col-lg-offset-2 col-md-offset-2 col-sm-offset-2">

	<?php echo form_open('admin/store_article', ["class"=>"form-horizontal"]); ?>
  <?php echo form_hidden('created_at', $articles['created_at']); ?>
  <?php echo form_hidden('edit', 1); ?>
  <?php echo form_hidden('user_id', $articles['user_id']); ?>

  <fieldset>
    <legend style="font-size: 24px; margin-left: 110px; margin-right: 100px;">Edit  Articles</legend>    
    <div class="form-group">
      <?php echo form_label('Article Title','inputText', ["class"=>"labeltext col-lg-3 col-md-3 col-sm-3 control-label"]) ?>
      <div class="col-lg-4 col-md-4 col-sm-4">
      <?php echo form_input( ["name"=>"title","value"=>set_value("title", $articles['title']),"class"=>"form-control", "placeholder"=>"Article Title"]); ?>        
      </div>
        <?php echo form_error('title', '<div class="error text-danger col-lg-5 col-md-5 col-sm-5">', '</div>') ?>
    </div>
    <div class="form-group">
     <?php echo form_label('Article Body','inputText', ["class"=>"labeltext col-lg-3 col-md-3 col-sm-3 control-label"]) ?>
      <div class="col-lg-4 col-md-4 col-sm-4">
      <?php echo form_textarea( ["name"=>"body","value"=>set_value("body", $articles['body']),"class"=>"form-control", "placeholder"=>"Article Body"]); ?>        
      </div>
       <?php echo form_error('body', '<div class="error text-danger col-lg-5 col-md-5 col-sm-5">', '</div>') ?>
    </div>   
    <div class="form-group">
      <div class=" col-lg-8 col-md-8 col-sm-8 col-lg-offset-3 col-md-offset-3 col-sm-offset-3">
        <?php echo form_reset('reset','Reset',["class"=>"btn btn-default"])
                   ,form_submit('submit', 'Submit',["class"=>"btn btn-primary"]); ?>       
      </div>
    </div>
  </fieldset>
</form>
<?php include_once('admin_footer.php') ?>