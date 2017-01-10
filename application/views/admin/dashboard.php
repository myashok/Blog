<?php include_once('admin_header.php') ?>
<a class="col-lg-1 col-lg-offset-8 btn btn-primary" href="<?php echo base_url('admin/add_article') ?>">Add Article</a>
 <?php if($this->session->flashdata('feedback')): ?> 		
    	<div class="row" style="margin-top: 20px;">
			<div style="margin-top: 20px;" class="alert alert-dismissible <?php echo $this->session->flashdata('success'); ?>   col-lg-offset-5 col-md-offset-5 col-sm-offset-3 col-lg-4 col-md-4 col-sm-4">
				  <button type="button" class="close" data-dismiss="alert">&times;</button>
				  <?php echo $this->session->flashdata('feedback'); ?>
			</div>
		</div>
   <?php endif; ?>  
<div class="container col-lg-offset-3 col-lg-6" >
	<table class="table table-striped table-hover ">
    	<thead>
    		<th style="font-size: 24px; font-weight: bold" >Sr. No.</th>
    		<th style="font-size: 24px; font-weight: bold"> Title</th>
    		<th style="text-align:right;  font-size: 24px; font-weight: bold">Action</th>
    	</thead>
    	<tbody>
    	
    	<?php if (count($articles)) : ?>
    		<?php $i = $this->uri->segment(3)+1 ?>
    		<?php foreach($articles as $article) : ?>
	    		<tr>
	    			<td><?= $i++; ?></td>
	    			<td><?= $article->title ?></td>
	    			<td>
	    				<a href="<?php echo base_url("admin/edit_article/").$article->id ?>" class="btn btn-primary pull-right">Edit</a>
	    				<a href="<?php echo base_url("admin/delete_article/").$article->id ?>" class="btn btn-danger  pull-right">Delete</a>
	    			</td>
	    		</tr>
    		<?php endforeach; ?>
    	<?php else: ?>
    			<tr>
    				<td colspan="3" style ="font-size: 20px">
    					No Record Found
    				</td>
    			</tr>
    	<?php endif; ?> 	
    	</tbody>
    </table>
    <?= $this->pagination->create_links(); ?>
</div>
<?php include_once('admin_footer.php') ?>