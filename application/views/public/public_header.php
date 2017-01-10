<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Home</title>
	<?= link_tag('assets/css/bootstrap.css');?>	
  <?= link_tag('assets/css/style.css');?> 
</head>
<body>	
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">Public Articles</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <?= form_open('user/search',["class" => "navbar-form navbar-left","role"=>"search"]); ?>
      <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" name='query' class="form-control" placeholder="Search">
        </div>
      <button type="submit" class="btn btn-default">Search</button>
      <?= form_close(); ?>
      <?= form_error("query") ?>
      <ul class="nav navbar-nav navbar-right">
          <li><a href="#">Log In</a></li>
      </ul>
    </div>
</div>
</nav>