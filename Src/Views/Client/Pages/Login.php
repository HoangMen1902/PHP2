<?= $this->layout('Client/Components/Layout') ?>
<?= $this->start('main_content') ?>
<div class="container-default login-wrapper">
    <div class="login-img">
        <img src="<?= client_img ?>/Banner/Login.jpg" alt="Touhou Project">
    </div>
    <div class="login-form">
        <h1 class="login-title">Đăng nhập</h1>

        <form action="" class="login-form-inside" id="loginForm" name="loginForm" method="post">
            <input type="text" class="form-control login-input" id="email" name="email" placeholder="E-mail">
            <input type="password" class="form-control login-input" id="password" name="password" placeholder="Mật khẩu">
        </form>
        <div class="d-flex flex-column">
            <a href="/quen-mat-khau" class="option">Quên mật khẩu</a>
            <button type="submit" class="submit-btn" form="loginForm">Đăng nhập</button>
            <a href="/dang-ky" class="option register-option">Đăng ký</a>
        </div>
    </div>

</div>

<?= $this->stop() ?>