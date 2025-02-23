<?= $this->layout('Client/Components/Layout') ?>
<?= $this->start('main_content') ?>
<?php $total_amount = 0 ?>
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
                <?php foreach ($data as $cart): ?>
                    <div class="cart-product-row cart-item">
                        <div class="product-info-show">
                            <div class="product-img-show">
                                <a href="" class="text-decoration-none"><img src="<?= uploads ?>/<?=$cart['images']?>" alt="" class="prd-img"></a>
                                <div class="essential-info">
                                    <a href="" class="text-decoration-none"><span class="prd-name"><?=$cart['product_name']?></span></a>
                                    <p class="prd-description"><?=$cart['short_description']?></p>
                                    <div class="detail-btn">
                                        <a href="/chi-tiet/<?=$cart['product_id']?>" class="order-detail">Xem chi tiết</a>
                                    </div>
                                </div>
                            </div>
                            <span class="prd-type"><?=isset($cart['sku_options']) ? $cart['sku_options'] : 'Không'?></span>
                            <div class="prd-quantity">
                                <form action="">
                                    <label for="quantity">-</label>
                                    <input type="number" class=" increment-quantity" value="<?=$cart['cart_quantity']?>" min="1" readonly>
                                    <label for="quantity">+</label>
                                </form>
                                <button class="delete-btn" data-cart-id="<?=$cart['cart_id']?>">Xóa khỏi giỏ hàng</button>
                            </div>
                            <span class="prd-price"><?=number_format($cart['price'])?>đ</span>
                        </div>
                    </div>
                <?php 
                $total_amount += $cart['price'] * $cart['cart_quantity'];
                endforeach 
                ?>
            </div>
        </div>
    </div>
    <div class="cart-block-item bill-block">
        <div class="bill-info">
            <h4 class="summary-title">Tóm tắt đơn hàng</h4>
            <div class="total-price">
                <span class="total-price-title">Tổng</span>
                <span class="total-price-amount"><?=number_format($total_amount)?>đ</span>
            </div>
            <div class="external-fee">
                <div class="product-total">
                    <span class="product-total-title">Sản phẩm</span>
                    <span class="product-total-price"><?=number_format($total_amount)?>đ</span>
                </div>
                <div class="sub-fee">
                    <div class="sub-fee-title">Phí phụ</div>
                    <div class="sub-fee-amount">0đ</div>
                </div>
            </div>
            <hr>
            <a href="/thanh-toan" class="btn payment-btn">Thanh toán</a>
        </div>
    </div>
</div>

<?= $this->stop() ?>
<?= $this->push('scripts') ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
$(document).ready(function () {
    
    $(".delete-btn").on('click', function () {
        
        let cartId = $(this).data("cart-id");
        let button = $(this);

        if (!cartId) {
            alert("Không tìm thấy sản phẩm trong giỏ hàng!");
            return;
        }

        $.ajax({
            url: "/xoa-gio-hang",
            type: "POST", // Dùng POST thay vì DELETE
            data: JSON.stringify({ cart_id: cartId }),
            contentType: "application/json",
            dataType: "json",
            success: function (response) {
                if (response.success) {
                    button.closest(".cart-item").fadeOut(300, function () {
                        $(this).remove();
                    });
                } else {
                    alert(response.message || "Xóa sản phẩm thất bại!");
                }
            },
            error: function () {
                alert("Lỗi khi gửi yêu cầu xóa. Vui lòng thử lại!");
            }
        });
    });
});
</script>
<?= $this->end() ?>