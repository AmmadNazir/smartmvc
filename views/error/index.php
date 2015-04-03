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
  <script language="javascript">
function goback(){
history.back();
}
</script>
 </head>
<body>
<div class="container">
  <div class="row">
    <div class="span12">
      <div class="hero-unit center">
          <h1>Page Not Found <small><font face="Tahoma" color="red">Error 404</font></small></h1>
          <br />
          <p>The page you requested could not be found, either contact your webmaster or try again. Use your browsers <b>Back</b> button to navigate to the page you have prevously come from</p>
          <p><b>Or you could just press this neat little button:</b></p>
          <input type="button" class="btn btn-large btn-info" onclick="goback()" value="GO Back">
        </div>
    </div>
  </div>
</div>
</body>
</html>