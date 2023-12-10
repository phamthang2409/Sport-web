<h2 class="my-3">Đăng ký tài khoản</h2>
<?php if (isset($_SESSION['thongbao'])): ?>
    <div class="alert alert-success" role="alexrt">
        <?= $_SESSION['thongbao'] ?>
    </div>
<?php endif;
unset($_SESSION['thongbao']) ?>

<?php if (isset($_SESSION['loi'])): ?>
    <div class="alert alert-danger" role="alexrt">
        <?= $_SESSION['loi'] ?>
    </div>
<?php endif;
unset($_SESSION['loi']) ?>


<form action="" method="POST">
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Họ tên :</label>
        <input type="text" class="form-control" name="HoTen" id="HoTen" placeholder="Nhập họ và tên" onkeyup="fValid();">
        <span id="errName"></span>
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Email :</label>
        <input type="eamil" class="form-control" name="Email" id="Email" placeholder="Nhập Email" onkeyup="isValidMail();">
        <span id="errEmail"></span>
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Số điện thoại :</label>
        <input type="number" class="form-control" name="SoDienThoai" id="SoDienThoai" 
        onkeyup="checkPhone();" placeholder="Nhập số điện thoại">
        <span id="errPhone"></span>
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Địa chỉ :</label>
        <input type="text" class="form-control" name="DiaChi" id="DiaChi" placeholder="Nhập địa chỉ">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Mật khẩu :</label>
        <input type="password" class="form-control" name="MatKhau" id="MatKhau" onkeyup="checkPass();" placeholder="Nhập mật khẩu của bạn">
        <span id="errPass"></span>
    </div>

    <button type="submit" name="submit" value="submit" class="btn btn-primary">Đăng ký</button>
</form>

<script>
    function fValid() {

        let name = document.getElementById("HoTen").value;
        if (name.length < 8) {
            document.getElementById("errName").innerHTML = "Họ tên phải có hơn 7 ký tự";
            document.getElementById("HoTen").focus();
            return;
        }
        document.getElementById("errName").innerHTML = "";
        
        if(!isValidMail()){
        return;
        }


    }
    function isValidMail() {
        let email = document.getElementById("Email").value;
        let emailPtn = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailPtn.test(email)) {
            document.getElementById("errEmail").innerHTML = "Định dạng email của bạn đang bị sai";
            document.getElementById("Email").focus();
            return false;
        }
        document.getElementById("errEmail").innerHTML = "";
        return true;
    }

    function checkPhone(){
        let phone = document.getElementById("SoDienThoai").value;
        if(phone.length < 10){
            document.getElementById("errPhone").innerHTML = "Số điện thoại phải có 10 số";
            document.getElementById("SoDienThoai").foucs();
            return;
        }
        document.getElementById("errPhone").innerHTML = "";
    }
    
    function checkPass(){
        let pass = document.getElementById("MatKhau").value;
        if(pass.length < 8){
            document.getElementById("errPass").innerHTML = "Mật khẩu phải có hơn 8 ký tự";
            document.getElementById("MatKhau").foucs();
            return;
        }
        document.getElementById("errPass").innerHTML = "";
    }
</script>