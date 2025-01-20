<?= $this->layout('Client/Components/Layout') ?>
<?= $this->start('main_content') ?>
<div class="container-default cart-container">
    <h2 class="cart-title">Giỏ hàng</h2>
    <div class="cart-block-item cart-block">
        <div class="info-tab">
            <span class="info-title info-product">Sản phẩm</span>
            <span class="info-title info-type">Loại</span>
            <span class="info-title info-quantity">Số lượng</span>
            <span class="info-title info-price">Giá tiền</span>
        </div>
        <hr>

        <div class="product-info-tab">
            <div class="product-info-group">
                <div class="cart-product-row">
                    <div class="product-info-show">
                        <div class="product-img-show">
                            <a href="" class="text-decoration-none"><img src="<?= client_img ?>/TempProduct/SuwakoFumo.jpg" alt="" class="prd-img"></a>
                            <div class="essential-info">
                                <a href="" class="text-decoration-none"><span class="prd-name">Suwako Fumo Version 1</span></a>
                                <p class="prd-description">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Necessitatibus voluptas laudantium sed nisi eveniet quam, debitis consequatur asperiores perferendis ea architecto, nemo vel provident, excepturi velit facilis voluptate dolorem? Dolor!</p>
                                <div class="detail-btn">
                                    <a href="" class="order-detail">Xem chi tiết</a>
                                </div>
                            </div>
                        </div>
                        <span class="prd-type">Version 1</span>
                        <div class="prd-quantity">
                            <form action="">
                                <label for="quantity">-</label>
                                <input type="number" class=" increment-quantity" value="1" min="1" readonly>
                                <label for="quantity">+</label>
                            </form>
                        </div>
                        <span class="prd-price">2.000.000đ</span>
                    </div>
                </div>
                <div class="cart-product-row">
                    <div class="product-info-show">
                        <div class="product-img-show">
                            <a href="" class="text-decoration-none"><img src="<?= client_img ?>/TempProduct/SuwakoFumo.jpg" alt="" class="prd-img"></a>
                            <div class="essential-info">
                                <a href="" class="text-decoration-none"><span class="prd-name">Suwako Fumo Version 1</span></a>
                                <p class="prd-description">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Necessitatibus voluptas laudantium sed nisi eveniet quam, debitis consequatur asperiores perferendis ea architecto, nemo vel provident, excepturi velit facilis voluptate dolorem? Dolor!</p>
                                <div class="detail-btn">
                                    <a href="" class="order-detail">Xem chi tiết</a>
                                </div>
                            </div>
                        </div>
                        <span class="prd-type">Version 1</span>
                        <div class="prd-quantity">
                            <form action="">
                                <label for="quantity">-</label>
                                <input type="number" class=" increment-quantity" value="1" min="1" readonly>
                                <label for="quantity">+</label>
                            </form>
                        </div>
                        <span class="prd-price">2.000.000đ</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="cart-block-item bill-block">
        <div class="bill-info">
            <h4 class="summary-title">Tóm tắt đơn hàng</h4>
            <div class="total-price">
                <span class="total-price-title">Tổng</span>
                <span class="total-price-amount">2.000.000đ</span>
            </div>
            <div class="external-fee">
                <div class="product-total">
                    <span class="product-total-title">Sản phẩm</span>
                    <span class="product-total-price">2.000.000đ</span>
                </div>
                <div class="sub-fee">
                    <div class="sub-fee-title">Phí phụ</div>
                    <div class="sub-fee-amount">0đ</div>
                </div>
            </div>
            <hr>
            <a href="" class="btn payment-btn">Thanh toán</a>
        </div>
    </div>
</div>
<?= $this->stop() ?>

<?= $this->push('scripts') ?>
<? $this->end() ?>