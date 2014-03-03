<!DOCTYPE html>
<html lang="en">
 <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= (isset($this->title)) ? $this->title : Company; ?></title>
  <link href="<?=URL?>assats/css/layout.css" rel="stylesheet"/>
  <link href="<?=URL?>assats/css/bootstrap.css" rel="stylesheet"/>
  <!--[if lt IE 9]>
  <script src="assats/js/html5shiv.js"></script><![endif]-->
  <script src="<?=URL?>assats/js/jQuery.js"></script>
 </head>
<body>
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?=URL?>"><?=Company;?></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="<?=URL?>">Home</a></li>
        <li><a href="<?=URL?>photo/">upload photo</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
    <div class="jumbotron">
   <div class="main"><div id="form">
   