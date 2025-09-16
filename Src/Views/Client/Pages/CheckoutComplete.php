<?= $this->layout('Client/Components/Layout') ?>

<?= $this->start('main_content') ?>


<div style="margin: 0 auto; max-width: 900px; padding: 50px">
    <div class="woocommerce-order">
        <div class="alert alert-success d-flex p-4 rounded-3" role="alert">
            <div class="mb-0">Đơn hàng đã được đặt thành công</div>
            <button type="button" class="btn-close btn-sm ms-auto" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <ul class="woocommerce-order-overview woocommerce-thankyou-order-details order_details">
            <li class="woocommerce-order-overview__order order">
                Mã đơn hàng: <strong><?= $data['id'] ?></strong>
            </li>
            <li class="woocommerce-order-overview__date date">
                Ngày đặt: <strong><?= $data['created_at'] ?></strong>
            </li>
            <li class="woocommerce-order-overview__total total">
                Tổng: <strong><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">VNĐ </span><?= number_format($data['total_price']) ?></span></strong>
            </li>
            <li class="woocommerce-order-overview__payment-method method">
                Phương thức: <?= $method === 'international' ? 'Thanh toán quốc tế' : 'Khác' ?>
            </li>
        </ul>
        <h3 class="text-success text-center">Trên thế giới có rất nhiều sự lựa chọn, cảm ơn bạn đã chọn chúng tôi!</h3>
        <p class="text-center">Đơn hàng sẽ được giao trong thời gian sớm nhất!</p>
        <p class="text-center">Bạn có thể xuất hóa đơn trong trang chi tiết đơn hàng!</p>

        <div class="w-100 d-flex align-items-end justify-content-end">
            <a href="/" class="btn btn-primary text-end">Quay về</a>
        </div>
    </div> 
</div>
<?= $this->stop() ?>
<?= $this->push('styles') ?>

<?= $this->end() ?>