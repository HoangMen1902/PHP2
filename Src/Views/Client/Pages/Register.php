<?= $this->layout('Client/Components/Layout') ?>
<?= $this->start('main_content') ?>
<div class="container-default login-wrapper">
    <div class="login-img">
        <img src="<?= client_img ?>/Banner/Login.jpg" alt="Touhou Project">
    </div>
    <div class="login-form">
        <h1 class="login-title">Đăng ký</h1>

        <form action="" class="login-form-inside" id="loginForm" name="loginForm" method="post">
            <input type="text" class="form-control login-input" id="firstname" name="firstname" placeholder="Họ">
            <input type="text" class="form-control login-input" id="lastname" name="lastname" placeholder="Tên">
            <input type="text" class="form-control login-input" id="email" name="email" placeholder="E-mail">
            <input type="password" class="form-control login-input" id="password" name="password" placeholder="Mật khẩu">
        </form>
        <div class="d-flex flex-column">
            <a href="/quen-mat-khau" class="option">Quên mật khẩu</a>
            <button type="submit" class="submit-btn" form="loginForm">Đăng ký</button>
            <a href="/dang-nhap" class="option register-option">Đăng nhập</a>
        </div>
    </div>

</div>

<?= $this->stop() ?>