<?php 

require('config.php');


error_reporting(0);

if ($_GET["page"]=='home'){
  include "home.php";
}
elseif ($_GET["page"]=='input'){
  include "input.php";
}
elseif ($_GET["page"]=='petani'){
  include "petani.php";
}
elseif ($_GET["page"]=='lahan'){
  include "lahan.php";
}


?>