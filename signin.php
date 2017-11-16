<?php
/**
 * Created by PhpStorm.
 * User: Gao
 * Date: 2017/7/24
 * Time: 16:00
 */
    session_start();
    if(isset($_SESSION['su'])){
        Header("Location: http://localhost:8080/web/mine.php");
    }
    $noone_email = $_SESSION['noone_email'];
?>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Signin</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/signin.css" rel="stylesheet">
</head>

  <body>
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                  <h2 class="modal-title" id="myModalLabel">Ooooooops</h2>
              </div>
              <div class="modal-body"><h4>用户名或密码错误（按下 ESC 按钮退出）...</h4></div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
              </div>
          </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
  </div>
  <div class="container">

      <form class="form-signin"">
        <h2 class="form-signin-heading">Please sign in</h2>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input id="em" type="text" class="form-control" placeholder="Email address">
        <label for="inputPassword" class="sr-only">Password</label>
        <input id="pa" type="password" class="form-control" placeholder="Password">
        <label class="checkbox">
          <input type="checkbox" value="remember-me"> Remember me
        </label>
        <button class="btn btn-lg btn-primary btn-block" type="button" onclick="signIn()">Sign in</button>

  </div> <!-- /container -->

    <!-- Le javascript
================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

    <script src="assets/js/jquery.js"></script>
    <script>
        function signIn(){
            alert("yes");
            var email = $("#em").val();
            var psw = $("#pa").val();
            var dat = {email: email, psw: psw};
            $.ajax({
                url: 'http://13.125.47.211/controller/signin.php',
                data: dat,
                dataType: 'jsonp',
                type: 'get',
                cache: 'false',
                success:function(data){
                    if(data.ac === "ACCESS"){
                        location = 'http://13.125.47.211/web/mine.php'
                    }
                    else{
                        alert("error1");
//                        $('#myModal').modal({
//                            keyboard: true
//                        })
                    }
                },
                error:function(){
                    alert("error");
//                    $('#myModal').modal({
//                        keyboard: true
//                    })
                }
            });
        }
//        document.onkeydown = function(e){
//            if(!e){
//                e = window.event;
//            }
//            if((e.keyCode||e.which) == 13){
//                signIn();
//            }
//        }
    </script>

  </body>
</html>
