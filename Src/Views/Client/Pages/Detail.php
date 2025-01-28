<?= $this->layout('Client/Components/Layout') ?>

<?= $this->start('main_content') ?>
<div class="product-container container-default">
    <div class="left-side">
        <div class="gallery">
            <img src="<?= client_img ?>/TempProduct/Cirno.png" alt="Cirno" class="gallery-img">
            <img src="<?= client_img ?>/TempProduct/Cirno.png" alt="Cirno" class="gallery-img">
            <img src="<?= client_img ?>/TempProduct/Cirno.png" alt="Cirno" class="gallery-img">
            <img src="<?= client_img ?>/TempProduct/Cirno.png" alt="Cirno" class="gallery-img">
        </div>
        <div class="main-image">
            <img src="<?= client_img ?>/TempProduct/Cirno.png" alt="Cirno" class="main-img">
        </div>
    </div>
    <div class="right-side">
        <h1 class="product-name">Touhou Fumo Cirno Version 1</h1>
        <p class="product-price">2.000.000 đ</p>
        <ul class="short-description">
            <span class="description-title">Mô tả ngắn:</span>
            <li>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad ut molestiae sequi consequuntur fuga incidunt aliquid esse omnis, odit consequatur repellat, vel eligendi, iure impedit molestias placeat similique recusandae totam!
            </li>
            <li>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad ut molestiae sequi consequuntur fuga incidunt aliquid esse omnis, odit consequatur repellat, vel eligendi, iure impedit molestias placeat similique recusandae totam!
            </li>
        </ul>

        <div class="variant-group">
        <h5 class="variant-title">Lựa chọn:</h5>
            <div class="variant-img-group">
            <img src="<?=client_img?>/TempProduct/cirno.png" alt="variant" class="variant-img">
            <img src="<?=client_img?>/TempProduct/cirno.png" alt="variant" class="variant-img">
            <img src="<?=client_img?>/TempProduct/cirno.png" alt="variant" class="variant-img">

            </div>

        </div>

        <div class="btn-group">
            <div class="quantity-group">
            <span>Số lượng</span>
            <form action="/them-san-pham" class="add-form" id="addForm">
                <label for="quantity">-</label>
                <input type="number" class=" increment-quantity" value="1" min="1" readonly>
                <label for="quantity">+</label>

            </form>
            </div>
            
            <button class="add-btn" form="addForm">Thêm vào giỏ hàng</button>

        </div>

    </div>
</div>
<!-- <div class="description-part container-default">
    <div class="desc-title">
        <h4 class="title">Mô tả sản phẩm</h4>
    </div>
    <div class="desc-content">
    </div>
</div> -->
<div class="related-product container-default">
<h2>Sản phẩm liên quan</h2>
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

<?= $this->stop() ?>