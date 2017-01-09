<?php include_once('admin_header.php') ?>
<a class="col-lg-1 col-lg-offset-8 btn btn-primary" href="<?php echo base_url('admin/add_article') ?>">Add Article</a>

<div class="container col-lg-offset-3 col-lg-6" >
	<table class="table table-striped table-hover ">
    	<thead>
    		<th style="font-size: 24px; font-weight: bold" >Sr. No.</th>
    		<th style="font-size: 24px; font-weight: bold"> Title</th>
    		<th style="text-align:right;  font-size: 24px; font-weight: bold">Action</th>
    	</thead>
    	<tbody>
    	<?php if (count($articles)) : ?>
    		<?php foreach($articles as $article) : ?>
	    		<tr>
	    			<td>1</td>
	    			<td><?= $article->title ?></td>
	    			<td>
	    				<a href="" class="btn btn-primary pull-right">Edit</a><a href="" class="btn btn-danger  pull-right">Delete</a>
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
</div>
<?php include_once('admin_footer.php') ?>