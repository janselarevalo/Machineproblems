<!DOCTYPE html>
<html>

<head>

  <meta charset="UTF-8">

  <title>Book - Login</title>

    <link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />
<center><p><big><font color="Gold"><font size="6">The Library</big></p></center></center>
</head>

<body>
<h2>  </h2>


<center><img src="books1.jpg" alt="Books" style="width:1450px;height:800px;"><center>

  <html lang="en-US">
  <head>
    <meta charset="utf-8">

    <title>Login</title>

    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,700">

    <!--[if lt IE 9]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
 <![endif]-->

  </head>
  <?php
$c = oci_connect("janselarevalo","jae900200","localhost/xe");
if (!$c) {
  $e= oci_error();
  trigger_error('Could not connect to the database:'.$e['message'],E_USER_ERROR);
}
?>


  <body>

    <div class="container">

      <div id="login">

        <form action="#" method="POST">

          <fieldset class="clearfix">

            <p><span class="fontawesome-user"></span><input type="text" name="username" value="Username" onBlur="if(this.value == '') this.value = 'Username'" onFocus="if(this.value == 'Username') this.value = ''" required></p> <!-- JS because of IE support; better: placeholder="Username" -->
            <p><span class="fontawesome-lock"></span><input type="password"  name="password" value="Password" onBlur="if(this.value == '') this.value = 'Password'" onFocus="if(this.value == 'Password') this.value = ''" required></p> <!-- JS because of IE support; better: placeholder="Password" -->
            <p><input type="submit" name= "submit" value="submit"></p>

          </fieldset>

        </form>

     <?php
  if(isset($_POST['submit'])){
  
    $c_user = addslashes($_POST['username']);
    $c_pass =addslashes ($_POST['password']);
    $sel_c = "select * from USERS where password ='".$c_pass."' AND username='".$c_user."'";
    $run_c = oci_parse($c, $sel_c);
    $ex = oci_execute($run_c);
    $a = oci_fetch_array($run_c);
    $check=oci_num_rows($run_c);
    echo $check;
    while(($row=oci_fetch_array($run_c, OCI_ASSOC + OCI_RETURN_NULLS))!=False){
    
  }
    if($check == 0){
      echo "<script>alert('password or email is incorrect!')</script>";
    }else{
      header("Location: index.php");
    }
    
    
  }

       ?>
        <p>  <a href="#"> </a><span class="fontawesome-arrow-right"></span></p>
 
      </div> 

    </div>

  </body>
</html>

</body>

</html>