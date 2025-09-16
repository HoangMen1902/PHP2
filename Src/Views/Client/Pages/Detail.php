<?= $this->layout('Client/Components/Layout') ?>

<?= $this->start('main_content') ?>
<div class="product-container container-default">
    <div class="left-side">
        <div class="gallery">
            <?php foreach ($data as $product): ?>
                <img src="<?= uploads ?>/<?= $product['images'] ?>" 
                     data-sku="<?= $product['sku'] ?>" 
                     data-price="<?= $product['price'] ?>" 
                     data-sku-id="<?= $product['sku_id'] ?>"
                     class="gallery-img variant-option">
            <?php endforeach; ?>
        </div>
        <div class="main-image">
            <img src="<?= uploads ?>/<?= $data[0]['thumbnail'] ?>" alt="Product" class="main-img" style="min-height: 100%;">
        </div>
    </div>
    <div class="right-side">
        <h1 class="product-name"><?= $data[0]['name'] ?></h1>
        <p class="product-price"><?= number_format($data[0]['price']) ?> vnđ</p>
        <ul class="short-description">
            <span class="description-title">Mô tả ngắn:</span>
            <?= $data[0]['short_description'] ?>
        </ul>

        <div class="variant-group">
            <h5 class="variant-title">Lựa chọn:</h5>
            <div class="variant-img-group">
                <?php foreach ($data as $product): ?>
                    <img src="<?= uploads ?>/<?= $product['images'] ?>" 
                         data-sku="<?= $product['sku'] ?>" 
                         data-price="<?= $product['price'] ?>" 
                         data-sku-id="<?= $product['sku_id'] ?>"
                         class="variant-img variant-option">
                <?php endforeach; ?>
            </div>
            <p class="sku-label mt-4">Mã SKU: <span id="skuDisplay"><?= $data[0]['sku'] ?></span></p>
        </div>

        <div class="btn-group">
            <div class="quantity-group">
                <span>Số lượng</span>
                <form action="/them-san-pham" class="add-form" id="addForm" method="POST">
                    <input type="hidden" name="sku_id" id="skuInput" value="<?= $data[0]['sku_id'] ?>">                    
                    <button type="button" class="quantity-btn" id="decrease">-</button>
                    <input type="number" name="quantity" id="quantity" class="increment-quantity" value="1" min="1">
                    <button type="button" class="quantity-btn" id="increase">+</button>
                </form>
            </div>
            <button class="add-btn" type="submit" form="addForm">Thêm vào giỏ hàng</button>
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
        <div class="">
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
        <div class="">
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
        <div class="">
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
        <div class="">
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

<?=$this->push('scripts')?>
<script>
document.addEventListener("DOMContentLoaded", function () {
    const variants = document.querySelectorAll(".variant-option");
    const mainImage = document.querySelector(".main-img");
    const priceDisplay = document.querySelector(".product-price");
    const skuDisplay = document.getElementById("skuDisplay");
    const skuInput = document.getElementById("skuInput");
    const priceInput = document.getElementById("priceInput");

    variants.forEach(variant => {
        variant.addEventListener("click", function () {
            mainImage.src = this.src;
            priceDisplay.innerText = parseInt(this.dataset.price).toLocaleString("vi-VN") + " vnđ";
            skuDisplay.innerText = this.dataset.sku;
            skuInput.value = this.dataset.skuId;
            priceInput.value = this.dataset.price;
        });
    });

    // Số lượng sản phẩm
    const quantityInput = document.getElementById("quantity");
    document.getElementById("increase").addEventListener("click", function () {
        quantityInput.value = parseInt(quantityInput.value) + 1;
    });

    document.getElementById("decrease").addEventListener("click", function () {
        if (parseInt(quantityInput.value) > 1) {
            quantityInput.value = parseInt(quantityInput.value) - 1;
        }
    });
});
</script>

<?=$this->end()?>