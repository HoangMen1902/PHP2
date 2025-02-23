<?= $this->layout('Client/Components/Layout') ?>

<?=
$this->start('main_content');
$total = 0;
?>

<div class="payment__section">
    <div class="payment__section__left">
        <div class="payment__section__left-text">
            <div class="payment__section__left-ttlh">
                <h3>Thông tin liên hệ</h3>
            </div>
            <form action="/xu-ly-thanh-toan" method="post" id="paymentForm">
                <input type="hidden" name="method" value="POST">
                <div class="form-group">
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name='email' value='<?= $_SESSION['user']['email'] ?>' placeholder="Email">
                </div>


                <div class="payment__section__container">
                    <input class="payment__section__checkbox" type="checkbox">
                    <label for="">Gửi cho tôi tin tức và ưu đãi qua email</label>
                </div>

                <h3 class="payment__section__left-ttlh ">Giao hàng</h3>

                <div class="option">
                    <input type="radio" id="van_chuyen" checked />
                    <label for="van_chuyen">
                        <span class="text">Vận chuyển</span>
                        <span class="icon">&#128663;</span>
                    </label>
                </div>

                <div class="option">
                    <input type="radio" id="nhan_tai_cua_hang" />
                    <label for="nhan_tai_cua_hang">
                        <span class="text">Nhận hàng tại cửa hàng</span>
                        <span class="icon">&#127970;</span>
                    </label>
                </div>

                <div class="shipping-details">
                    <div class="select-address">
                        <select class="cnvc" id="selectAddress">
                            <option value="" data-address="" data-phone="">Chọn địa chỉ</option>
                            <?php foreach ($address as $option): ?>
                                <option value="<?= $option['id'] ?>"
                                    data-address="<?= $option['address'] ?>"
                                    data-phone="<?= $option['phone'] ?>"
                                    data-province="<?= $option['province_name'] ?>"
                                    data-district="<?= $option['district_name'] ?>"
                                    data-ward="<?= $option['ward_name'] ?>">
                                    <?= $option['address'] . ' - ' . $option['phone'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="name">
                        <input class="cnvc" type="text" placeholder="Tên" name="name"
                            value="<?= $_SESSION['user']['firstname'] . ' ' . $_SESSION['user']['lastname'] ?>" readonly />
                    </div>
                    <input class="cnvc" type="text" placeholder="Thành phố" name="province" id="province" readonly />
                    <input class="cnvc" type="text" placeholder="Phường/Xã" name="district" id="district" readonly />
                    <input class="cnvc" type="text" placeholder="Quận/Huyện" name="ward" id="ward" readonly />

                    <input class="cnvc" type="text" placeholder="Địa chỉ" name="address" id="address" readonly />
                    <input class="cnvc" type="text" placeholder="Điện thoại" name="phone" id="phone" readonly />
                </div>

                <div class="shipping-methods">
                    <h3>Phương thức thanh toán</h3>
                    <div class="method">
                        <label for="grab">Thanh toán quốc tế</label>
                        <input type="radio" id="visa" style="width: fit-content ;" name="payment-method" value="international" />
                    </div>
                    <div class="method">
                        <label for="grab">Chuyển khoản ngân hàng</label>
                        <input type="radio" id="banking" style="width: fit-content ;" name="payment-method" value="vnpay" />
                    </div>
                    <div class="method">
                        <label for="grab">Thanh toán tiền mặt</label>
                        <input type="radio" id="cáh" style="width: fit-content ;" name="delivery-method" value="cáh" />
                    </div>
                </div>
                <button type="submit" class="button_thanhtoan">THANH TOÁN NGAY</button>

            </form>
        </div>
    </div>

    <div class="payment__section__right">
        <div class="payment__section__right-ttlh">
            <?php
            foreach ($data as $cart):
            ?>
                <div class="payment__section__container">

                    <div class="payment__section__right-img" style="position: relative;">
                        <div class="payment__section__right-circle"><?= $cart['cart_quantity'] ?></div>
                        <img src="<?= uploads ?>/<?= $cart['images'] ?>" style="object-fit:cover; width:100%; height:100%">
                    </div>
                    <div class="payment__section__right-description dlnonene ">
                        <p class="clamp-text"><?= $cart['short_description'] ?></p>
                        <p>1</p>
                    </div>
                    <div class="payment__section__right-pcire">
                        <p><?= number_format($cart['price'] * $cart['cart_quantity']) ?> ₫</p>
                    </div>
                </div>

            <?php
                $total += $cart['price'] * $cart['cart_quantity'];
            endforeach;
            ?>




            <div class="order-summary">
                <div class="discount">
                    <input class="cnvc" type="text" placeholder="Mã giảm giá hoặc thẻ quà tặng" />
                    <button>Áp dụng</button>
                </div>
                <div class="totals">
                    <p>Vận chuyển: MIỄN PHÍ</p>
                    <h3>Tổng: <?= number_format($total) ?> ₫</h3>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->stop() ?>

<?= $this->push('scripts') ?>

<script>
    $(document).ready(function() {
        $('#selectAddress').on('change', function() {
            let selectedOption = $(this).find(':selected');
            let address = selectedOption.data('address');
            let phone = selectedOption.data('phone');
            let province = selectedOption.data('province');
            let district = selectedOption.data('district');
            let ward = selectedOption.data('ward');


            $('#province').val(province);
            $('#district').val(district);
            $('#ward').val(ward);
            $('#address').val(address);
            $('#phone').val(phone);
        });
        $('#paymentForm').on('submit', function() {
            $("input[readonly]").removeAttr("readonly");
        });
    });
</script>

<?= $this->end() ?>