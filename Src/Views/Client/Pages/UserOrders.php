<?php $this->layout('Client/Components/Layout');

$this->start('main_content');

?>
<section class="account">
    <div class="container-fluid">
        <div class="row g-0">
            <?php $this->Insert('Client/Components/sidebar'); ?>
            <div class="col-lg-9">
                <div class="order-info">
                    <div class="order-info-add">
                        <div class="order-info-add-title">
                            <p>Đơn Hàng</p>
                        </div>
                        <ul class="nav nav-tabs fs mb-3">
                            <li class="fw-bold">TẤT CẢ ĐƠN HÀNG</li>
                        </ul>
                        <div class="container-fluid">
    <?php if (empty($orderData)): ?>
        <div class="tab-content">
            <div id="in-progess" class="tab-pane fade in active">
                <div class="order-info-add-modal">
                    <div class="order-info-add-modal-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M8.25 18.75a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 0 1-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 0 0-3.213-9.193 2.056 2.056 0 0 0-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 0 0-10.026 0 1.106 1.106 0 0 0-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12" />
                        </svg>
                    </div>
                    <div class="order-info-add-modal-show">
                        <span>Không có đơn hàng nào!</span>
                        <p>Hãy mua sắm ngay lúc này để tận hưởng các ưu đãi hấp dẫn chỉ dành riêng cho bạn.</p>
                        <button type="button">
                            <a href="/products">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                    class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 4.5v15m7.5-7.5h-15" />
                                </svg>
                                DẠO MỘT VÒNG XEM NÀO
                            </a>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    <?php else: ?>
        <?php foreach ($orderData as $r): ?>
            <div class="tab-content">
                <div class="list-order-page">
                    <div class="items-orders-list p-3"">
                        <div class="wrap-head-order">
                            <div class="code-order-list">
                                <h4 class="col-6">
                                    <a href="/chi-tiet-don-hang/<?= $r['order_id'] ?>"
                                        aria-label="Đơn hàng <?= $r['order_id'] ?>"
                                        title="Đơn hàng <?= $r['order_id'] ?>">Đơn hàng <b><?= $r['order_id'] ?></b></a>
                                </h4>
                                <div class="status-order col-6">
                                    <span>
                                        <?php
                                        $statusMap = [
                                            1 => 'Đang xử lý',
                                            2 => 'Chờ thanh toán',
                                            3 => 'Đã thanh toán',
                                            4 => 'Đang vận chuyển',
                                            5 => 'Đã giao',
                                            6 => 'Đã hủy',
                                            7 => 'Yêu cầu hoàn tiền',
                                            8 => 'Đã hoàn tiền'
                                        ];
                                        echo $statusMap[$r['status']] ?? 'Không xác định';
                                        if($r['status'] === 6):
                                        ?>
                                        <form method="POST" action="/yeu-cau-hoan-tien/<?= $r['order_id'] ?>">
                                            <button type="submit" class="btn btn-danger btn-sm">Gửi yêu cầu hoàn tiền</button>
                                        </form>
                                        <?php
                                        endif;
                                        ?>
                                    </span>
                                    <?php if (in_array($r['status'], [1, 2, 3])): ?>
                                <div class="btnInCard d-flex justify-content-end">
                                    <form method="POST" action="/huy-don/<?= $r['order_id'] ?>">
                                        <button type="submit" class="btn btn-danger btn-sm">Hủy đơn</button>
                                    </form>
                                </div>
                            <?php endif; ?>

                                </div>
                            </div>
                        </div>
                        <div class="content-order">
                            <?php 
                            $products = json_decode("[" . $r['order_items'] . "]", true);
                            if (!empty($products)):
                                ?>
                                    <div class="items-prod-in-orders">
                                        
                                        <div class="media-prod">
                                            <img width="100px" src="<?=uploads?>/<?= htmlspecialchars($products[0]['sku_images']) ?>" alt="<?= htmlspecialchars($products[0]['product_name']) ?>">
                                        </div>
                                        <div class="info-prod">
                                            <div class="vendor-prod">
                                                <?= htmlspecialchars($products[0]['product_name']) ?>
                                            </div>
                                            <div class="wrap-price-quantity">
                                                <div class="price-prod">
                                                    <span><?= number_format($r['total_price']) ?> VNĐ</span>
                                                </div>
                                                <div class="quantity-prod">
                                                    Số lượng: <?= $products[0]['quantity'] ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            <?php endif; ?>
                            

                        </div>
                    </div>
                </div>
                <div class="paginate-list-order d-none"></div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>

                    </div>
                </div>
            </div>
        </div>
</section>
<?php $this->stop(); ?>