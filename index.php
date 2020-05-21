<!DOCTYPE html>
<html>

<head>

    <link href="assets\css\login.css" rel="stylesheet" type="text/css">
    <script src=" http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="<?php echo base_url('public/js/login.js')?>"></script>
</head>
  
<form>
    <div class="wrapper fadeInDown">
        <div id="formContent">
            <!-- Tabs Titles -->
            <!-- Icon -->
            <div class="fadeIn first">
                <h1>Login</h1>
            </div>
            <!-- Login Form -->
            <form>
                <input type="text" id="user" class="fadeIn second" name="login" placeholder="Username">
                <input type="text" id="password" class="fadeIn third" name="login" placeholder="password">
                <input type="submit" class="fadeIn fourth" id="btn" value="Log In">
            </form>
            <!-- Remind Passowrd -->
            <div id="formFooter">
                <a class="underlineHover" href="#">Forgot Password?</a>
            </div>
        </div>
    </div>
<?php
      function base_url($path)
    {
     // output: /myproject/index.php
     // $currentPath = $_SERVER['PHP_SELF'];
 
     // output: Array ( [dirname] => /myproject [basename] => index.php [extension] => php [filename] => index ) 
     $directory = "/Group6";
 
     // output: localhost
     $hostName = $_SERVER['HTTP_HOST'];
 
     // output: http://
     $protocol = strtolower(substr($_SERVER["SERVER_PROTOCOL"], 0, 5)) == 'https://' ? 'https://' : 'http://';
 
     // return: http://localhost/myproject/
     return $protocol . $hostName . $directory . "/" . $path;
    }
 ?>
</html>