<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Admin Panel</title>
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
        <a class="navbar-brand" href="<?= base_url('admin/dashboard') ?>">Admin Panel</a>

    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
          <li><a href="<?= base_url('user/index') ?>">All Articles</a></li>
          <li><a href="<?= base_url('login/admin_logout') ?>">Log Out</a></li>
      </ul>
    </div>
</div>
</nav>