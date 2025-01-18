<?= $this->layout('Client/Components/Layout') ?>

<?= $this->start('main_content') ?>

<div class="about-banner">
    <img src="<?= client_img ?>/Banner/AboutBanner.jpg" alt="About banner" class="abt-banner-img">
    <div class="banner-text">
        <iframe src="https://discord.com/widget?id=1330072142368215050&theme=dark" width="350" height="500" allowtransparency="true" frameborder="0" sandbox="allow-popups allow-popups-to-escape-sandbox allow-same-origin allow-scripts"></iframe>
        <div class="text-content">
            <h2 class="banner-heading">Về chúng tôi</h2>
            <p>SUWAFUMO được hình thành vào ngày 18/01/2025 bởi một sinh viên FPT Polytechnic, với mục tiêu mang đến cho khách hàng những sản phẩm thú bông, Plushie và Fumo cao cấp. Với chất lượng vượt trội và thiết kế độc đáo, SUWAFUMO tự hào là lựa chọn hàng đầu cho những ai yêu thích các món đồ chơi dễ thương và ngọt ngào. Chúng tôi cam kết cung cấp những sản phẩm tinh tế và mang lại sự hài lòng tuyệt đối cho khách hàng, từ những món quà đặc biệt cho đến bộ sưu tập ấn tượng.</p>
            <div class="invite-btn">
                <a href="" class="discord-invite">Gia nhập Discord</a>
            </div>
            <div class="logo-banner">
                <img src="<?= client_img ?>/LogoNoBg.png" alt="Logo">
            </div>
        </div>
    </div>
</div>
<div class="container-default banner-spacing">
    <div class="service">
        <h2 class="text-center">Dịch vụ</h2>
        <div class="service-box-group">
            <div class="service-box">
                <img src="<?= client_img ?>/Icons/Package.png" alt="">
                <h3 class="service-title">Hỗ trợ</h3>
                <p> Với chất lượng vượt trội và thiết kế độc đáo, SUWAFUMO tự hào là lựa chọn hàng đầu cho những ai yêu thích các món đồ chơi dễ thương và ngọt ngào. Chúng tôi cam kết cung cấp những sản phẩm tinh tế và mang lại sự hài lòng tuyệt đối cho khách hàng, từ những món quà đặc biệt cho đến bộ sưu tập ấn tượng.</p>
            </div>
            <div class="service-box">
                <img src="<?= client_img ?>/Icons/Support.png" alt="">
                <h3 class="service-title">Hoàn trả</h3>
                <p> Với chất lượng vượt trội và thiết kế độc đáo, SUWAFUMO tự hào là lựa chọn hàng đầu cho những ai yêu thích các món đồ chơi dễ thương và ngọt ngào. Chúng tôi cam kết cung cấp những sản phẩm tinh tế và mang lại sự hài lòng tuyệt đối cho khách hàng, từ những món quà đặc biệt cho đến bộ sưu tập ấn tượng.</p>
            </div>
            <div class="service-box">
                <img src="<?= client_img ?>/Icons/Exchange.png" alt="">
                <h3 class="service-title">Hàng hóa</h3>
                <p> Với chất lượng vượt trội và thiết kế độc đáo, SUWAFUMO tự hào là lựa chọn hàng đầu cho những ai yêu thích các món đồ chơi dễ thương và ngọt ngào. Chúng tôi cam kết cung cấp những sản phẩm tinh tế và mang lại sự hài lòng tuyệt đối cho khách hàng, từ những món quà đặc biệt cho đến bộ sưu tập ấn tượng.</p>
            </div>
        </div>
    </div>
    <h2 class="text-center role">Người thành lập</h2>
    <div class="founder">
        <div class="detail-description">
            <h1>Giới thiệu</h1>
            <p>Chào bạn. Mình là Mến, một sinh viên năng động đến từ FPT Polytechnic Cần Thơ. Với niềm đam mê về công nghệ và lập trình, mình đang phát triển các dự án web, đặc biệt trong lĩnh vực thương mại điện tử. Hiện tại, mình đang xây dựng và phát triển SUWAFUMO, một dịch vụ cung cấp các mặt hàng thú bông, Plushie và Fumo cao cấp. Mình luôn tìm kiếm các cơ hội để học hỏi và cải thiện kỹ năng lập trình PHP, JavaScript, cùng với các công nghệ web mới nhất.</p>
        </div>
        <div class="founder-pic">
            <h4 class="founder-title">SuwaFumo Dev</h4>

            <figure>
                <img src="<?= client_img ?>/TempProduct/SuwakoFumo.jpg">
                <figcaption>Lý Hoàng Mến - 7CO</figcaption>
                <figcaption>Developer</figcaption>
            </figure>
        </div>
    </div>
    <div class="ref">
        <a href="/san-pham" class="product-ref">Tham khảo sản phẩm</a>

    </div>
</div>
<?= $this->stop() ?>