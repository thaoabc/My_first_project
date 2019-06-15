<!DOCTYPE html>
<html>
<head>
	<title>SIGN IN</title>
  <meta charset="utf-8">
<style>
@import url('https://netdna.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.css');
@import url(https://fonts.googleapis.com/css?family=Lato:400,300,700);

html {
   height: 100%;
}

body {
/* Remember to use the other versions for IE 10 and older browsers! */
display: flex;
justify-content: center;
align-items: center;
min-height: 100%;
font-family: 'lato', sans-serif;
/*color: #fff;
background: #222222;
background: #16222A;*/ /* fallback for old browsers */
/*background: -webkit-linear-gradient(to top, #16222A , #3A6073);*/ /* Chrome 10-25, Safari 5.1-6 */
/*background: linear-gradient(to top, #16222A , #3A6073);*/ /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
}

.container {
  color: #fff;
  background: #222222;
  background: -webkit-linear-gradient(to top, #16222A , #3A6073);
  background: linear-gradient(to top, #16222A , #3A6073);
  border-radius: 5px;
  box-shadow: 0 1.5px 0 0 rgba(0,0,0,0.1);
  width:600px;
  height: 600px;
  display: flex;  
  flex-direction: column;
}

.logo{
  font-family: "museo-slab";  
  font-size:20px;
  text-align: center;
  padding: 20px 20px 0;
  margin:0;
}

.login-item {
	color: #ffff;
	padding:25px 25px 0;
	margin: 20px 20px 0;	
	border-radius: 3px;
}

input {
  border: 0;
  color: inherit;
  font: inherit;
  margin: 0;
  outline: 0;
  padding: 0;
  -webkit-transition: background-color .3s;
  transition: background-color .3s;
}

.user:before {
  content: '\f007';
  font: 14px fontawesome;
	color: #5b5b5b;
}

.lock:before {
  content: '\f023';
  font: 14px fontawesome;
	color: #5b5b5b;
}

.form input[type="password"], .form input[type="email"],.form input[type="checkbox"], .form input[type="submit"] {
  width: 100%;
}

.form-login label,
.form-login input[type="email"],
.form-login input[type="password"],
.form-login input[type="submit"],
.form-login input[type="checkbox"]{
  border-radius: 0.25rem;
  padding: 1rem;
  color: #3A3F44;  
}

.form-login label {
  background-color: #222222;
  border-bottom-right-radius: 0;
  border-top-right-radius: 0;
  padding-left: 1.25rem;
  padding-right: 1.25rem;
}

.form-login input[type="email"], .form-login input[type="password"],.form-login input[type="checkbox"] {
  background-color: #ffffff;
  border-bottom-left-radius: 0;
  border-top-left-radius: 0;
}
.form-login input[type="email"]:focus, .form-login input[type="email"]:hover, .form-login input[type="password"]:focus, .form-login input[type="password"]:hover,.form-login input[type="checkbox"]:hover {
  background-color: #eeeeee;
}
.form-login input[type="submit"] {
  background-color: #00B9BC;
  color: #eee;
  font-weight: bold;
  text-transform: uppercase;
}
.form-login input[type="submit"]:focus, .form-login input[type="submit"]:hover {
  background-color: #197071;
}
.form-field {
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  margin-bottom: 2rem;
}


.hidden {
  border: 0;
  clip: rect(0 0 0 0);
  height: 1px;
  margin: -1px;
  overflow: hidden;
  padding: 0;
  position: absolute;
  width: 1px;
}

.text--center {
  text-align: center;
}
a{
  color: white;
}

</style>
</head>
<body>
	<script src="https://use.typekit.net/rjb4unc.js"></script>
<script>try{Typekit.load({ async: true });}catch(e){}</script>
  
<div class="container">

    <div class="logo">ĐĂNG NHẬP</div>
    <div class="login-item">
      <?php
            if (isset($_GET['empty_data'])) {
              echo "Bạn nhập sai email hoặc mật khẩu";
            }
            elseif (isset($_GET['error_sign_in'])) {
              echo "Bạn chưa đăng nhập";
            }
            elseif (isset($_GET['error_empty_session'])) {
              echo "Bạn chưa đăng nhập";
            }
            elseif (isset($_GET['logout_success'])) {
              echo "Bạn đăng xuất thành công";
            }
      ?>
      <form action="process_sign_in.php" method="post" class="form form-login">
        <span id="loi_email" style="color: lightblue"></span>
        <div class="form-field">
          <input id="email" class="form-input" name="email" type="email" placeholder="Nhập Email" autofocus required>
        </div>

        <span id="loi_mat_khau" style="color: lightblue"></span>
        <div class="form-field">
          <input id="mat_khau" class="form-input" name="mat_khau" type="password" placeholder="Mật Khẩu" required>
        </div>
        <div class="form-field">
          Ghi nhớ tài khoản cho lần đăng nhập sau:
          <input type="checkbox" name="cookie">
        </div>
        <div class="form-field">
          <input type="submit" name="dang_nhap" onclick="return dang_ky()" value="Đăng Nhập">
        </div>
      </form>
      <p class="text--center">Chưa đăng ký?&emsp; <a href="sign_up.php">Tạo tài khoản tại đây</a></p>
    </div>
</div>
<script type="text/javascript">
  function dang_ky(){
    var dem_sai=0;

    var email= document.getElementById('email').value;
    var regex_email= /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/;
    var result_email=regex_email.test(email);
  
    if(email==""){
      document.getElementById('loi_email').innerHTML='Bạn chưa nhập email';
    }
    else if(result_email==false){
      document.getElementById('loi_email').innerHTML='Nhập sai email rồi';
      dem_sai=1;
    }
    else{
        document.getElementById('loi_email').style.display='none';
    }

    var mat_khau= document.getElementById('mat_khau').value;
    var regex_mat_khau= /^[a-z0-9]{6,}$/i;
    var result_mat_khau= regex_mat_khau.test(mat_khau);
    var do_dai_mat_khau= mat_khau.length;

    if(mat_khau==""){
      document.getElementById('loi_mat_khau').innerHTML="Bạn chưa nhập mật khẩu";
    }
    else if(do_dai_mat_khau<6){
     document.getElementById('loi_mat_khau').innerHTML="Mật khẩu phải có ít nhất 6 kí tự"
    }
     else if(result_mat_khau==false){
      document.getElementById('loi_mat_khau').innerHTML="Nhập sai mật khẩu rồi!";
      dem_sai=1;
    }
    else{
        document.getElementById('loi_mat_khau').style.display='none';
    }

    if(dem_sai==1){
      return false;
    }
  }
</script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript">
  $("main").addClass("pre-enter").removeClass("with-hover");
setTimeout(function(){
  $("main").addClass("on-enter");
}, 500);
setTimeout(function(){
  $("main").removeClass("pre-enter on-enter");
  setTimeout(function(){
    $("main").addClass("with-hover");
  }, 50);
}, 3000);

$("h1 a").click(function(){
  $(this).siblings().removeClass("active");
  $(this).addClass("active");
  if ($(this).is("#link-signup")) {
    $("#form-login").removeClass("active");
    $("#intro-login").removeClass("active");
    setTimeout(function(){
      $("#form-signup").addClass("active");
      $("#intro-signup").addClass("active");
    }, 50);
  } else {
    $("#form-signup").removeClass("active");
    $("#intro-signup").removeClass("active");
    setTimeout(function(){
      $("#form-login").addClass("active");
      $("#intro-login").addClass("active");
    }, 50);
  }
});
</script>

</body>
</html>