<form class="form-login mt-1" method="POST" action="">
    <h1>ĐĂNG NHẬP</h1>

    <?php if (isset($_SESSION['loi'])): ?>
        <div class="alert alert-danger" role="alexrt">
            <?= $_SESSION['loi'] ?>
        </div>
    <?php endif;
    unset($_SESSION['loi']) ?>

    <div class="mb-3">
        <label for="email" class="form-label">Email :</label>
        <input type="text" class="form-control" id="Email" name="Email" placeholder="Nhập email của bạn"
        onkeyup="isValidMail();">

        <span id="errEmail"></span> <br>
    </div>
    <div class="mb-3">
        <label for="pass" class="form-label">Password :</label>
        <input type="password" class="form-control" id="MatKhau" name="MatKhau" onkeyup="fValid();"
            placeholder="Nhập mật khẩu của bạn">

        <span id="errPass"></span> <br>
    </div>
    
    <button type="submit" class="btn btn-primary">Đăng Nhập</button>


    <div class="mb-3 mt-2">
        <a href="index.php?mod=user&act=register">Bạn chưa có tài khoản ?</a>
    </div>
    <div class="mb-3">
        <a href="index.php?mod=user&act=forget-password">Quên mật khẩu</a>
    </div>
</form>

<script>
        function fValid(){
        

        let Email = document.getElementById("Email").value;
        if(Email == "") {
            document.getElementById("errEmail").innerHTML = "Email không được để trống";
            document.getElementById("Email").focus();
            return; 
        }
        
        let passWord = document.getElementById("MatKhau").value;
        if(passWord.length < 8) {
            document.getElementById("errPass").innerHTML = "Mật khẩu phải có hơn 8 ký tự";
            document.getElementById("MatKhau").focus();
            return; 
        }
        document.getElementById("errPass").innerHTML = "";
        if(!isValidMail()){
        return;
    }
    
    }
    


    function isValidMail() {
        let email = document.getElementById("Email").value;
        let emailPtn = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailPtn.test(email)) {
            document.getElementById("errEmail").innerHTML = "Email đang bị sai hoặc thiếu";
            document.getElementById("Email").focus();
            return false;
        }
        document.getElementById("errEmail").innerHTML = "";
        return true;
    }
</script>
