<!DOCTYPE html>
<html>
<head>
	<title>SIGN UP</title>
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
  width:700px;
  height: 750px;
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

.form input[type="password"], .form input[type="text"],.form input[type="number"], .form input[type="submit"], .form input[type="date"], .form input[type="email"], .form textarea {
  width: 100%;
}

.form-login input[type="text"],
.form-login input[type="password"],
.form-login input[type="submit"],
.form-login input[type="email"],
.form-login input[type="number"],
.form-login input[type="date"],
.form-login textarea {
  border-radius: 0.25rem;
  padding: 0.75rem;
  color: #3A3F44;  
}

.form-login input[type="text"],.form-login input[type="number"], .form-login input[type="password"],
.form-login input[type="date"], .form-login input[type="email"],.form-login textarea {
  background-color: #ffffff;
  border-bottom-left-radius: 0;
  border-top-left-radius: 0;
}
.form-login input[type="text"]:focus, .form-login input[type="text"]:hover,.form-login input[type="number"]:focus, .form-login input[type="number"]:hover,.form-login input[type="date"]:focus, .form-login input[type="date"]:hover,.form-login input[type="email"]:focus, .form-login input[type="email"]:hover, .form-login input[type="password"]:focus, .form-login input[type="password"]:hover, .form-login textarea:focus, .form-login textarea:hover {
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
  margin-bottom: 1.25rem;
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

</style>
</head>
<body>
	<script src="https://use.typekit.net/rjb4unc.js"></script>
<script>try{Typekit.load({ async: true });}catch(e){}</script>

<div class="container">
  
    <div class="logo">TẠO TÀI KHOẢN MỚI</div>
    <div class="login-item">
      <?php
      if(isset($_GET['error_sign_up'])){
        echo "Bạn chưa đăng ký";
      }
      elseif (isset($_GET['error'])) {
        echo "Lỗi xử lý";
      }
      elseif (isset($_GET['error_isset'])) {
        echo "Tài khoản đã đăng ký";
      }
      elseif (isset($_GET['error_page'])) {
        echo "Bạn chưa đăng ký";
      }
      elseif (isset($_GET['error_cookie'])) {
        echo "Lỗi cookie";
      }

    ?>
      <form action="process_sign_up_admin.php" method="post" class="form form-login">

        <span id="loi_ho_ten" style="color: lightblue"></span>
        <div class="form-field">
          <input type="text" id="ho_ten" name="ten_admin" placeholder="Họ tên" autofocus required/>
        </div>

       
          <span id="loi_email" style="color: lightblue"></span>
        <div class="form-field">
            <input type="email" id="email" name="email" placeholder="Nhập email" required/>
        </div>
        <span id="loi_mat_khau" style="color: lightblue"></span>
        <div class="form-field">
            <input type="password" id="mat_khau" placeholder="Nhập mật khẩu" required />
        </div>
        <span id="loi_mat_khau2" style="color: lightblue"></span>
        <div class="form-field">
            <input type="password" id="retype_password" name="mat_khau" placeholder="Nhập lại mật khẩu"  required/>
        </div>
        <span id="loi_sdt" style="color: lightblue"></span>
        <div class="form-field">
          <input type="text" name="sdt" id="sdt" placeholder="Nhập số điện thoại" required>
        </div>
        <span id="loi_dia_chi" style="color: lightblue"></span>
        <div class="form-field">
            <textarea id="dia_chi" rows="1" name="dia_chi" placeholder="Nhập địa chỉ" required></textarea>
        </div>
        <span id="loi_gioi_tinh" style="color: lightblue;"></span>
        <div class="form-field">
           Giới tính:&emsp;<input type="radio" id="nam" name="gioi_tinh" value="1"><label for="nam">Nam</label>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
            <input type="radio" id="nu" name="gioi_tinh" value="0"><label for="nu">Nữ</label>
        </div>
        <span id="loi_cap_do" style="color: lightblue"></span>
        <div class="form-field">
         Cấp độ:&emsp;&emsp;<input type="radio" id="admin" name="cap_do" value="2"><label for="admin">Admin</label>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
            <input type="radio" id="khach_hang" name="cap_do" value="1"><label for="khach_hang">SuperAdmin</label>
        </div>
  
        <div class="form-field">
          <input type="submit" name="myform" method="post" onclick="return dang_ky()" value="ĐĂNG KÝ">
        </div>
      </form>
    </div>
</div>
<script type="text/javascript">
  function dang_ky(){
    dem_sai=0;

    var ho_ten= document.getElementById('ho_ten').value;
    var regex_ho_ten= /^[a-z\sàáâãèéêếìíòóôõùúăđĩũơưăạảấầẩẫậắằẳẵặẹẻẽềềểễệỉịọỏốồổỗộớờởỡợụủứừửữựỳỵýỷỹ]+$/i;
    var result_ho_ten= regex_ho_ten.test(ho_ten);
    var regex_ho_ten_dung= /[a-z\sàáâãèéêếìíòóôõùúăđĩũơưăạảấầẩẫậắằẳẵặẹẻẽềềểễệỉịọỏốồổỗộớờởỡợụủứừửữựỳýỵỷỹ]+/gi;

    if(ho_ten==""){
      document.getElementById('loi_ho_ten').innerHTML=' Bạn chưa nhập họ tên';
    }
    else if(result_ho_ten==false){
      var mang_ho_ten_dung=ho_ten.match(regex_ho_ten_dung);
      if(mang_ho_ten_dung!=null){
        var chuoi_ho_ten_dung=mang_ho_ten_dung.join(" ");
        document.getElementById('ho_ten').value=chuoi_ho_ten_dung;
      }
      document.getElementById('loi_ho_ten').innerHTML='Nhập sai họ tên rồi';
      dem_sai=1;
    }
    else{
        document.getElementById('loi_ho_ten').style.display='none';
    }

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

    var firstpassword=document.getElementById('mat_khau').value;
    var secondpassword=document.getElementById('retype_password').value;
   
    if(secondpassword==""){
      document.getElementById('loi_mat_khau2').innerHTML="Nhập lại mật khẩu trên vào đây";
    }
    else if(firstpassword!=secondpassword){
      document.getElementById('loi_mat_khau2').innerHTML="Mật khẩu không khớp!";
      dem_sai=1;
      }
    else{
        document.getElementById('loi_mat_khau2').style.display='none';
    }

    var sdt= document.getElementById('sdt').value;
    var regex_sdt= /^[0-9]{10,13}$/i;
    var result_sdt= regex_sdt.test(sdt);

    if(sdt==""){
      document.getElementById('loi_sdt').innerHTML="Bạn chưa nhập số điện thoại";
      document.getElementById('loi_sdt').style.focus();
      return false;
    }
    else if(result_sdt==false){
      document.getElementById('loi_sdt').innerHTML="Nhập sai số điện thoại rồi!";
      document.getElementById('loi_sdt').style.focus();
      return false;
    }
    else{
        document.getElementById('loi_sdt').style.display='none';
    }

      var dia_chi= document.getElementById('dia_chi').value;
      var regex_dia_chi=/^[a-z\sàáâãèéêếìíòóôõùúăđĩũơưăạảấầẩẫậắằẳẵặẹẻẽềềểễệỉịọỏốồổỗộớờởỡợụủứừửữựỳỵýỷỹ\.\,\0-9]{10,}$/i;
      var result_dia_chi= regex_dia_chi.test(dia_chi);

      if(result_dia_chi==false){
        document.getElementById('loi_dia_chi').innerHTML="Hãy nhập đúng địa chỉ";
        document.getElementById('dia_chi').focus();
        return false;
      }
      else{
        document.getElementById('loi_dia_chi').style.display='none';
      }

       kiem_tra_gioi_tinh=0;
    var array_gioi_tinh= document.getElementsByName('gioi_tinh');
    for (var i = 0;i<array_gioi_tinh.length; i++) {
      if (array_gioi_tinh[i].checked==true) {
        kiem_tra_gioi_tinh=1;
        break;
      }     
    }
    if (kiem_tra_gioi_tinh==0) {
      document.getElementById('loi_gioi_tinh').innerHTML='Chưa điền giới tính';
      return false;
    }
    else{
      document.getElementById('loi_gioi_tinh').style.display='none';
    }

    kiem_tra_cap_do=0;
    var array_cap_do= document.getElementsByName('cap_do');
    for (var i = 0;i<array_cap_do.length; i++) {
      if (array_cap_do[i].checked==true) {
        kiem_tra_cap_do=1;
        break;
      }     
    }
    if (kiem_tra_cap_do==0) {
      document.getElementById('loi_cap_do').innerHTML='Chưa điền cấp độ';
      return false;
    }
    else{
      document.getElementById('loi_cap_do').style.display='none';
    }
    if(dem_sai==1){
      return false;
    }

  }
</script>

</body>
</html>