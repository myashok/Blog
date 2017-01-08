<?php include_once('admin_header.php') ?>
<div class="container">
	<table class="table">
    	<thead>
    		<th>Sr. No.</th>
    		<th>Title</th>
    		<th>Action</th>
    	</thead>
    	<tbody>
    	<?php if (count($articles)) : ?>
    		<?php foreach($articles as $article) : ?>
	    		<tr>
	    			<td>1</td>
	    			<td><?= $article->title ?></td>
	    			<td>
	    				<a href="" class="btn btn-primary">Edit</a><a href="" class="btn btn-danger">Delete</a>
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