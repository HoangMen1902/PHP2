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
            <p class="text-light">Pre-order Arknights Plush ngay!</p>
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
<div class="container-default home-main">
    <h2 class="content-heading">Danh mục nổi bật</h2>
    <div>

    </div>
    <div class="category-block">
        <div class="category-item">
            <div class="category-text">
                <p class="category-name"> Touhou Fumo</p>
                <p class="category-content">Những dòng Fumo cao cấp của những nhân vật đến từ tựa game Touhou Project.</p>
                <a href="" class="category-btn">Xem chi tiết</a>
            </div>
            <img src="<?= client_img ?>/Categories/Reimu.png" alt="Reimu Fumo" class="category-img">
        </div>
        <div class="category-item">
            <div class="category-text">
                <p class="category-name"> Blue Archive Plush</p>
                <p class="category-content">Plush chính hãng đến từ tựa game Gacha Blue Archive của nhà Nexon.</p>
                <a href="" class="category-btn">Xem chi tiết</a>

            </div>
            <img src="<?= client_img ?>/Categories/BlueArchivePlush.png" alt="Hoshilo" class="category-img">
        </div>
        <div class="category-item">
            <div class="category-text">
                <p class="category-name">Honkai: Star Rail</p>
                <p class="category-content">Plush chính hãng đến từ tựa game Honkai: Star Rail của nhà Hoyoverse.</p>
                <a href="" class="category-btn">Xem chi tiết</a>

            </div>
            <img src="<?= client_img ?>/Categories/HsrPlush.png" alt="Hsr" class="category-img">
        </div>
        <div class="category-item">
            <div class="category-text">
                <p class="category-name">Anime</p>
                <p class="category-content">Plush cao cấp được thiết kế theo hình tượng các nhân vật Anime nổi tiếng.</p>
                <a href="" class="category-btn">Xem chi tiết</a>
            </div>
            <img src="<?= client_img ?>/Categories/Anime.png" alt="Anime" class="category-img">
        </div>
    </div>
    <div class="best-seller">
        <h2>Sản phẩm tiêu biểu</h2>
        <div class="product-block">
            <div class="cont">
                <div class="product-card">
                    <div class="product-card__image">
                        <img src="<?= client_img ?>/TempProduct/Cirno.png" alt="">
                    </div>
                    <div class="product-card__info">
                        <h2 class="product-card__title">Touhou Plush Series 42 [Cirno (ver.1.5)] FumoFumo Cirno (Sono Ittengo) - Touhou Project - (Gift) Plush</h2>
                        <p class="product-card__description">Experience ultimate comfort and style with these iconic Nike Air Max sneakers. lorem</p>
                        <div class="product-card__price-row">
                            <span class="product-card__price">2.000.000đ</span>
                            <button class="product-card__btn">Xem Thêm</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="cont">
                <div class="product-card">
                    <div class="product-card__image">
                        <img src="<?= client_img ?>/TempProduct/Reimu.jpg" alt="">
                    </div>
                    <div class="product-card__info">
                        <h2 class="product-card__title">Touhou Plush Hakurei Reimu - Version 1</h2>
                        <p class="product-card__description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos aut quaerat voluptatum nisi repellat nemo assumenda eveniet hic velit in earum veniam minima, dicta nihil cupiditate illo commodi mollitia facilis?</p>
                        <div class="product-card__price-row">
                            <span class="product-card__price">2.000.000đ</span>
                            <button class="product-card__btn">Xem Thêm</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="cont">
                <div class="product-card">
                    <div class="product-card__image">
                        <img src="<?= client_img ?>/TempProduct/Marisa.jpg" alt="">
                    </div>
                    <div class="product-card__info">
                        <h2 class="product-card__title">Bộ 2 Touhou Plush Hakurei Reimu & Kirisame Marisa - Version 1</h2>
                        <p class="product-card__description">Experience ultimate comfort and style with these iconic Nike Air Max sneakers. lorem</p>
                        <div class="product-card__price-row">
                            <span class="product-card__price">2.000.000đ</span>
                            <button class="product-card__btn">Xem Thêm</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="cont">
                <div class="product-card">
                    <div class="product-card__image">
                        <img src="<?= client_img ?>/TempProduct/SuwakoFumo.jpg" alt="">
                    </div>
                    <div class="product-card__info">
                        <h2 class="product-card__title">Touhou Plush Suwako Moriya - Version 1</h2>
                        <p class="product-card__description">Experience ultimate comfort and style with these iconic Nike Air Max sneakers. lorem</p>
                        <div class="product-card__price-row">
                            <span class="product-card__price">2.000.000đ</span>
                            <button class="product-card__btn">Xem Thêm</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="special-product best-seller">
        <h2>Đặc biệt từ Honkai: Star Rail</h2>
        <div class="product-block">
            <div class="cont">
                <div class="product-card">
                    <div class="product-card__image">
                        <img src="<?= client_img ?>/TempProduct/Hanabi.png" alt="">
                    </div>
                    <div class="product-card__info">
                        <h2 class="product-card__title">Hanabi Plush</h2>
                        <p class="product-card__description">Experience ultimate comfort and style with these iconic Nike Air Max sneakers. lorem</p>
                        <div class="product-card__price-row">
                            <span class="product-card__price">2.000.000đ</span>
                            <button class="product-card__btn">Xem Thêm</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="cont">
                <div class="product-card">
                    <div class="product-card__image">
                        <img src="<?= client_img ?>/TempProduct/Kafka.jpg" alt="">
                    </div>
                    <div class="product-card__info">
                        <h2 class="product-card__title">Kafka Plush</h2>
                        <p class="product-card__description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos aut quaerat voluptatum nisi repellat nemo assumenda eveniet hic velit in earum veniam minima, dicta nihil cupiditate illo commodi mollitia facilis?</p>
                        <div class="product-card__price-row">
                            <span class="product-card__price">2.000.000đ</span>
                            <button class="product-card__btn">Xem Thêm</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="cont">
                <div class="product-card">
                    <div class="product-card__image">
                        <img src="<?= client_img ?>/TempProduct/Pompom.jpg" alt="">
                    </div>
                    <div class="product-card__info">
                        <h2 class="product-card__title">Pom-pom Plush</h2>
                        <p class="product-card__description">Experience ultimate comfort and style with these iconic Nike Air Max sneakers. lorem</p>
                        <div class="product-card__price-row">
                            <span class="product-card__price">2.000.000đ</span>
                            <button class="product-card__btn">Xem Thêm</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="cont">
                <div class="product-card">
                    <div class="product-card__image">
                        <img src="<?= client_img ?>/TempProduct/Hotaru.jpg" alt="">
                    </div>
                    <div class="product-card__info">
                        <h2 class="product-card__title">Hotaru Plush</h2>
                        <p class="product-card__description">Experience ultimate comfort and style with these iconic Nike Air Max sneakers. lorem</p>
                        <div class="product-card__price-row">
                            <span class="product-card__price">2.000.000đ</span>
                            <button class="product-card__btn">Xem Thêm</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<div class="secondary-banner">
    <video src="<?= client_img ?>/Banner/Video.mp4" muted autoplay loop>
        Trình duyệt của bạn không hỗ trợ video
    </video>
    <div class="banner-text-2">
            <h2 class="banner-heading text-light">Thỏa sức khám phá!</h2>
            <p class="text-light">Hãy vui vẻ, tận hưởng những phút giây tuyệt vời khi khám phá lượng sản phẩm tuyệt vời của trang web nhé!</p>
            <p class="text-light">Thông tin thêm về <em>SUWAFUMO</em></p>
            <div class="button-holder">
                <a href="/gioi-thieu" class="banner-btn">Giới Thiệu</a>
            </div>
        </div>
</div>
<div class="container-default">
<div class="special-product best-seller">
        <h2>Sản phẩm ngẫu nhiên</h2>
        <div class="product-block">
            <div class="cont">
                <div class="product-card">
                    <div class="product-card__image">
                        <img src="<?= client_img ?>/TempProduct/Hanabi.png" alt="">
                    </div>
                    <div class="product-card__info">
                        <h2 class="product-card__title">Hanabi Plush</h2>
                        <p class="product-card__description">Experience ultimate comfort and style with these iconic Nike Air Max sneakers. lorem</p>
                        <div class="product-card__price-row">
                            <span class="product-card__price">2.000.000đ</span>
                            <button class="product-card__btn">Xem Thêm</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="cont">
                <div class="product-card">
                    <div class="product-card__image">
                        <img src="<?= client_img ?>/TempProduct/Kafka.jpg" alt="">
                    </div>
                    <div class="product-card__info">
                        <h2 class="product-card__title">Kafka Plush</h2>
                        <p class="product-card__description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos aut quaerat voluptatum nisi repellat nemo assumenda eveniet hic velit in earum veniam minima, dicta nihil cupiditate illo commodi mollitia facilis?</p>
                        <div class="product-card__price-row">
                            <span class="product-card__price">2.000.000đ</span>
                            <button class="product-card__btn">Xem Thêm</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="cont">
                <div class="product-card">
                    <div class="product-card__image">
                        <img src="<?= client_img ?>/TempProduct/Pompom.jpg" alt="">
                    </div>
                    <div class="product-card__info">
                        <h2 class="product-card__title">Pom-pom Plush</h2>
                        <p class="product-card__description">Experience ultimate comfort and style with these iconic Nike Air Max sneakers. lorem</p>
                        <div class="product-card__price-row">
                            <span class="product-card__price">2.000.000đ</span>
                            <button class="product-card__btn">Xem Thêm</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="cont">
                <div class="product-card">
                    <div class="product-card__image">
                        <img src="<?= client_img ?>/TempProduct/Hotaru.jpg" alt="">
                    </div>
                    <div class="product-card__info">
                        <h2 class="product-card__title">Hotaru Plush</h2>
                        <p class="product-card__description">Experience ultimate comfort and style with these iconic Nike Air Max sneakers. lorem</p>
                        <div class="product-card__price-row">
                            <span class="product-card__price">2.000.000đ</span>
                            <button class="product-card__btn">Xem Thêm</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>
<?= $this->stop() ?>

<?= $this->push("scripts") ?>
<script src="<?= client_js ?>/Banner.js"></script>
<?= $this->end() ?>