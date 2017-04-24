<!DOCTYPE html>
<html>
<head>
 <script src="../../dist/sweetalert.min.js"></script> 
 <script src="../../dist/sweetalert.js"></script> 
 <script src="../../dev/sweetalert.es6.js"></script> 
 <link rel="stylesheet" type="text/css" href="../../dist/sweetalert.css">
</head>
<body>

<?php

class alerts{

  function alertSuccess(){

     /* echo '<script type="text/javascript">';
      echo 'setTimeout(function () { swal("Nice!","Successfuly Created!","success");';
      echo '}, 1000);</script>';
*/
      echo '<script type="text/javascript">';
      echo 'setTimeout(function () {  swal ({   title: "Nice!",
               text: "Successfuly Created!",
               imageUrl: "../images/thumbs-up.jpg" });';

      echo '}, 1000);</script>';
  }

   function alertSold(){

      echo '<script type="text/javascript">';
      echo 'setTimeout(function () { swal("Nice!","Press ok","success");';
      echo '}, 1000);</script>';
  }

  function alertWarning(){

      echo '<script type="text/javascript">';
      echo 'setTimeout(function () { swal("Opps! Sorry!","Data Already Existing!","error");';
      echo '}, 1000);</script>';
  }

   function alertWarnAsh(){

      echo '<script type="text/javascript">';
      echo 'setTimeout(function () { swal("Opps! Sorry!","An error occurred because: $error1,$error2","error");';
      echo '}, 1000);</script>';
  }

  function alertMax(){

      echo '<script type="text/javascript">';
      echo 'setTimeout(function () { swal("Opps! Sorry!","This section reach max limit of block!","warning");';
      echo '}, 1000);</script>';

  }
  
  function alertMax1(){

      echo '<script type="text/javascript">';
      echo 'setTimeout(function () { swal("Opps! Sorry!","Your lot unit reach max no. of deceased!","warning");';
      echo '}, 1000);</script>';

  }
  
  function alertMax2(){

      echo '<script type="text/javascript">';
      echo 'setTimeout(function () { swal("Opps! Sorry!","Your ashcrypt unit reach max no. of deceased!","warning");';
      echo '}, 1000);</script>';

  }

  function alertUpdate(){

      echo '<script type="text/javascript">';
      echo 'setTimeout(function () { swal("Nice!","Successfully Updated!","success");';
      echo '}, 1000);</script>';

  }

  function alertChange(){

      echo '<script type="text/javascript">';
      echo 'setTimeout(function () { swal("Opps! Sorry!","Insufficient Amount Paid!","error");';
      echo '}, 1000);</script>';
  }

  function alertRetrieve(){

      echo '<script type="text/javascript">';
      echo 'setTimeout(function () { swal("Good Job!","Successfuly Retrieved!","success");';
      echo '}, 1000);</script>';

  }

  function alertDeac(){

      echo '<script type="text/javascript">';
      echo 'setTimeout(function () { swal("Good!","Successfuly Deactivated!","success");';
      echo '}, 1000);</script>';
  }

  function alertInvalid(){

      echo '<script type="text/javascript">';
      echo 'setTimeout(function () { swal("Opps! Sorry!","Invalid Input!","error");';
      echo '}, 1000);</script>';
  }

  

}



?>


</body>
</html>