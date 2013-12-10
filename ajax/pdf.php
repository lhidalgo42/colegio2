<?php
session_start();
print_r($_POST);
/** @var /$html="
#document
<html>
<head>
<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\" />
<link rel=\"stylesheet\" href=\"http://www.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css\">
 <style>
   body {
                font-style:italic;
                font-weight:bold;
                font-size:80%;
   }
 </style>
</head>
<body>
 <div class=\"span12\" id=\"panel_superior\">
  ".$_POST['table'][0]."
   <div class=\"offset2 span2\">
     ".$_POST['table'][1]."
   </div>
 </div>
 <div class=\"span12\">
  ".$_POST['table'][2]."
 </div>
 <div class=\"span12\">
  ".$_POST['table'][3]."
 </div>
</body>
</html>"; **/
echo $html;
$_SESSION['html']=$html;
?>