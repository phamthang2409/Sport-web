<form class="form-login mt-1" method="POST" action="index.php?mod=user&act=forget-password">
    <h1>Quên mật khẩu</h1>

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

    <div class="mb-3">
        <label for="email" class="form-label">Email :</label>
        <input type="email" class="form-control" id="Email" name="Email" placeholder="Nhập email của bạn để chúng tôi kiểm tra mật khẩu">
    </div>
    <div class="mb-3">
        <button type="submit" name="submit" class="btn btn-primary">Lấy lại mật khẩu</button>
    </div>

</form>

<script>

</script>