<?= $this->layout('Client/Components/Layout') ?>

<?= $this->start('main_content') ?>

<div class="payment__section">
    <div class="payment__section__left">
        <div class="payment__section__left-text">
            <div class="payment__section__left-ttlh">
                <h3>Thông tin liên hệ</h3>
            </div>
            <form action="/order" method="post" id="paymentForm">
                <input type="hidden" name="method" value="POST">
                <div class="form-group">
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name='email' value='<?=$_SESSION['user']['email']?>' placeholder="Email">
                </div>


                <div class="payment__section__container">
                    <input class="payment__section__checkbox" type="checkbox">
                    <label for="">Gửi cho tôi tin tức và ưu đãi qua email</label>
                </div>

                <h3 class="payment__section__left-ttlh ">Giao hàng</h3>

                <div class="option">
                    <input type="radio" id="van_chuyen" name="shipping" value="van_chuyen" checked />
                    <label for="van_chuyen">
                        <span class="text">Vận chuyển</span>
                        <span class="icon">&#128663;</span>
                    </label>
                </div>

                <div class="option">
                    <input type="radio" id="nhan_tai_cua_hang" name="shipping" value="nhan_tai_cua_hang" />
                    <label for="nhan_tai_cua_hang">
                        <span class="text">Nhận hàng tại cửa hàng</span>
                        <span class="icon">&#127970;</span>
                    </label>
                </div>

                <div class="shipping-details">
                    <div class="name">
                        <input class="cnvc" type="text" placeholder="Tên" name="name" value="<?=$_SESSION['user']['firstname'] . ' ' . $_SESSION['user']['lastname']?>" />
                    </div>

                        <input class="cnvc" type="text" placeholder="Địa chỉ" name="address" value="" />

                        <input class="cnvc" type="text" placeholder="Địa chỉ" name="address" />

                    <input class="cnvc" type="text" placeholder="Điện thoại" name="phone" value="" />
                    <div class="checkbox">
                        <input type="checkbox" id="save-info" />
                        <label for="save-info">Lưu lại thông tin</label>
                    </div>
                </div>

                <div class="shipping-methods">
                    <h3>Phương thức thanh toán</h3>
                    <div class="method">
                        <label for="grab">Thanh toán quốc tế</label>
                        <input type="radio" id="visa" style="width: fit-content ;" name="delivery-method" />
                    </div>
                    <div class="method">
                        <label for="grab">Chuyển khoản ngân hàng</label>
                        <input type="radio" id="visa" style="width: fit-content ;" name="delivery-method" />
                    </div>
                    <div class="method">
                        <label for="grab">Thanh toán tiền mặt</label>
                        <input type="radio" id="visa" style="width: fit-content ;" name="delivery-method" />
                    </div>
                </div>
                <button type="submit" class="button_thanhtoan">THANH TOÁN NGAY</button>

            </form>
        </div>
    </div>

    <div class="payment__section__right">
        <div class="payment__section__right-ttlh">

                <div class="payment__section__container">

                    <div class="payment__section__right-img" style="position: relative;">
                        <div class="payment__section__right-circle">1</div>
                        <img src="<?= client_img ?>/TempProduct/Cirno.png" style="object-fit:cover; width:100%; height:100%">
                    </div>
                    <div class="payment__section__right-description dlnonene ">
                        <p class="clamp-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Suscipit, distinctio atque, debitis aliquid numquam soluta illo tenetur culpa sit doloremque cumque vitae possimus eligendi ullam? Modi, corrupti earum. Accusamus, cumque.</p>
                        <p>1</p>
                    </div>
                    <div class="payment__section__right-pcire">
                        <p><?= number_format(2000000) ?> ₫</p>
                    </div>
                </div>


            <input type="hidden" name="price" value="" form="paymentForm">


            <div class="order-summary">
                <div class="discount">
                    <input class="cnvc" type="text" placeholder="Mã giảm giá hoặc thẻ quà tặng" />
                    <button>Áp dụng</button>
                </div>
                <div class="totals">
                    <p>Vận chuyển: MIỄN PHÍ</p>
                    <h3>Tổng: <?= number_format(2000000) ?> ₫</h3>
               </div>
            </div>
        </div>
    </div>
</div>

<?= $this->stop() ?>