<?php
/**
 * Created by PhpStorm.
 * User: Gao
 * Date: 2017/7/28
 * Time: 20:38
 */
    session_start();
    if(!isset($_SESSION['su'])){
        Header("Location: http://13.125.47.211/signin.php");
    }
    $noone_email = $_SESSION['noone_email'];
?>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Fixed top navbar example for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/navbar-top.css" rel="stylesheet">
    <link href="assets/css/grid.css" rel="stylesheet">
</head>

<body>

<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="#">NOONE</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="http://13.125.47.211/">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="#">Mine</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#">More</a>
            </li>
        </ul>
        <form class="form-inline mt-2 mt-md-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>



<main role="main" class="container">
    <h1>您的服务状态</h1>
    <p class="lead">YOU CAN CREATE MORE IF YOU WANT.</p>

    <h3>已登记的账号</h3>
    <p>REMEMBER YOUR IPSEC SECRET IS "YOUYOUDEXIAOTUOLUO".</p>
    <div id="list"></div>
<!--    <div class="row">-->
        <button class="btn btn-lg btn-primary" type="button" onclick="add()">CREATE MORE</button>
<!--    </div>-->
    <form class="fade" id="create" style="margin-top: 3em">

        <h2>添加</h2>
<!--            <label for="inputEmail" class="sr-only">Email address</label>-->
        <div class="row" style="margin-left: 0.1em; margin-right: 0.1em">
            <input  id="vem" type="text" class="form-control" placeholder="Email address">
        </div>
        <div class="row" style="margin-left: 0.1em; margin-right: 0.1em">
            <input id="vpa" type="password" class="form-control" placeholder="Password">
        </div>
        <div class="row" style="margin-left: 0.1em; margin-right: 0.1em">
            <select id="vip" type="" class="custom-select">
            <option> 13.125.47.211 </option>
            </select>
        </div>
<!--            <label for="inputPassword" class="sr-only">Password</label>-->

<!--            <label class="checkbox">-->
<!--                <input type="checkbox" value="remember-me"> Remember me-->
<!--            </label>-->
        <button class="btn btn-lg btn-primary" type="button" onclick="addInfo()">添加</button>
    </form>

</main>


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<!--<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>-->
<!--<script>window.jQuery || document.write('<script src="assets/js/vendor/jquery.min.js"><\/script>')</script>-->
<script src="assets/js/jquery.js"></script>
<script src="assets/js/vendor/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script>
    function add(){
        var form = document.getElementById("create");
        form.className = "show";
        $('html, body').animate({
            scrollTop: $("#create").offset().top
        }, 1000);
    }
    function addInfo(){
        var email = $("#vem").val();
        var psw = $("#vpa").val();
        var ip = $("#vip").val();
        var owner = '<?php echo $noone_email;?>';
        var dat = {email: email, psw:psw, ip:ip, owner:owner};
        $.ajax({
            url: 'http://13.125.47.211/controller/add.php',
            data: dat,
            dataType: 'jsonp',
            type: 'get',
            cache: 'false',
            success:function(data){
                if(data.ac === "ACCESS"){
                    location = 'http://localhost/web/mine.php'
                }
                else{
                    alert("error1");
//                        $('#myModal').modal({
//                            keyboard: true
//                        })
                }
            },
            error:function(){
                alert("error2");
//                    $('#myModal').modal({
//                        keyboard: true
//                    })
            }
        });
    }
    $(document).ready(function(){
        var email = '<?php echo $noone_email;?>';
//        alert(email);
        var dat = {email: email};
        $.ajax({
            url: 'http://13.125.47.211/controller/info_exist.php',
            data: dat,
            dataType: 'jsonp',
            type: 'get',
            cache: 'false',
            success:function(data){
//                alert(data[1].type);
                var i = 0;
                if(data[i].type){
                    while(data[i]){
                        $("#list").append('<div class="row">\n' +
                            '        <div class="col-md-4">'+data[i].name+'</div>\n' +
                            '        <div class="col-md-4">'+data[i].server_ip+'</div>\n' +
                            '        <div class="col-md-4">'+data[i].type+'方式</div>\n' +
                            '    </div>');
                        i++;
                    }

                }

                else{
                    //alert("error1");
                    $("#list").append('<p>发现您还未创建用户名和密码，请点击按钮创建。</p>');
//                        $('#myModal').modal({
//                            keyboard: true
//                        })
                }
            },
            error:function(){
                alert("error3");
//                    $('#myModal').modal({
//                        keyboard: true
//                    })
            }
        });
    })
</script>
</body>
</html>


