<?= $this->layout('Client/Components/Layout') ?>

<?= $this->start('main_content') ?>

<div class="banner">
    <div class="slider-item slider-item-1">
        <img src="<?= client_img ?>/Banner/TouhouProject.jpg" alt="Touhou Project" class="banner-img">
        <div class="banner-text">
            <img src="<?= client_img ?>/Banner/ExtraImg.png" alt="" class="special-bg">
            <img src="" alt="">
            <h2 class="banner-heading text-light">SUWAFUMO X Touhou Project</h2>
            <p class="text-light">Điều gì sẽ diễn ra tiếp theo ở Gensokyo đây? Hãy cùng theo chân Reimu giải quyết các dị biến nào!</p>
            <p class="text-light">Liệu bạn đã sẵn sàng để khám phá thế giới thú vị, huyền bí của Gensokyo?</p>
            <div class="button-holder">
                <a href="" class="banner-btn">Tìm hiểu thêm</a>
            </div>
        </div>
    </div>
    <div class="slider-item slider-item-2" style="display: none;">
        <img src="<?= client_img ?>/Banner/BlueArchive.jpg" alt="Blue Archive" class="banner-img">
        <div class="banner-text">
            <img src="<?= client_img ?>/Banner/ExtraImg2.png" alt="" class="special-bg">
            <img src="" alt="">
            <h2 class="banner-heading text-light">Blue Archive</h2>
            <p class="text-light">"Tương lai phía trước tràn đầy những khả năng vô hạn."</p>
            <p class="text-light">Kivotos, một thành phố với muôn vàn những câu chuyện. Hãy cùng nhau tạo nên những câu chuyện tuyệt vời nhé!</p>
            <div class="button-holder">
                <a href="" class="banner-btn">Tìm hiểu thêm</a>
            </div>
        </div>
    </div>
    <div class="slider-item slider-item-3" style="display: none;">
        <img src="<?= client_img ?>/Banner/Arknight.png" alt="Arknights" class="banner-img">
        <div class="banner-text">
            <img src="<?= client_img ?>/Banner/ExtraImg3.png" alt="" class="special-bg">
            <img src="" alt="">
            <h2 class="banner-heading text-light">Arknights</h2>
            <p class="text-light">Sẵn sàng xây dựng chiến thuật, phát triển đội hình, và chinh phục mọi khó khăn chưa?</p>
            <p class="text-light">Gia nhập ngay Arknights và để hành trình của bạn bắt đầu!</p>
            <div class="button-holder">
                <a href="" class="banner-btn">Tìm hiểu thêm</a>
            </div>
        </div>
    </div>
    <div class="banner-dot">
        <div class="dot dot-1 dot-active" onclick="chooseBanner(1)"></div>
        <div class="dot dot-2" onclick="chooseBanner(2)"></div>
        <div class="dot dot-3" onclick="chooseBanner(3)"></div>
    </div>
</div>

<?= $this->stop() ?>

<?= $this->push("scripts")?>
<script src="<?= client_js?>/Banner.js"></script>
<?= $this->end()?>
