<?php include_once('public_header.php') ?>
 <div class="container">
 	<div class="row pull-right" style="margin-right:40px">
 		<?= $articles->created_at ?>
 	</div>
 	<div class="row " style="text-transform: capitalize;">
		<h1  style="margin-left: 20px;">
			<?= $articles->title ?>
		</h1>
 	</div>
 	<hr>
 	<div class="col-lg-8 jumbotron" style="margin-top:40px">
 		<p>
 			<?= $articles->title ?>
 		</p>
 	</div>
 </div>

<?php include_once('public_footer.php') ?>