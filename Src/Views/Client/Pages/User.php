<?= $this->layout('Client/Components/Layout') ?>

<?= $this->start('main_content') ?>
<section class="account px-5">
    <div class="container-fluid">
        <div class="row g-0">
            <?php $this->Insert('Client/Components/sidebar'); ?>
            <div class="col-lg-9">
                <div class="account-info">
                    <div class="account-info-title">
                        <p>THÔNG TIN CÁ NHÂN</p>
                    </div>
                    <div class="account-info-form">
                        <form method="POST" action="/cap-nhat-profile" id="profileForm">
                            <div class="form-group">
                                <label for="firstname" class="form-label">Tên</label>
                                <input type="text" id="firstname" name="firstname" class="form-control form-control-lg"
                                    value="<?=$data['firstname']?>">
                                <div id="firstname-error" style="color: red; display: none;">Tên không được để trống *</div>
                            </div>

                            <div class="form-group">
                                <label for="lastname" class="form-label">Họ</label>
                                <input type="text" id="lastname" name="lastname" class="form-control form-control-lg"
                                    value="<?=$data['lastname']?>">
                                <div id="lastname-error" style="display: none;" class="text-danger">Họ không được để trống *</div>
                            </div>

                            <div class="form-group">
                                <label for="phone" class="form-label">Số điện thoại</label>
                                <input type="text" id="phone" name="phone" class="form-control form-control-lg"
                                    value="<?=$data['phone']?>">
                                <div id="phone-error" style="display: none;" class="text-danger">Số điện thoại không được để trống *</div>
                            </div>
                            <div class="form-group" id="email-group"
                                style="display: <?= isset($_SESSION['user']['google_id']) && !empty($_SESSION['user']['google_id']) ? 'none' : 'block'; ?>;">
                                <label for="email" class="form-label">Địa chỉ Email</label>
                                <?php if (isset($_SESSION['user']['google_id']) && !empty($_SESSION['user']['google_id'])): ?>
                                    <input type="text" id="email" name="email" class="form-control form-control-lg"
                                        value="<?= htmlspecialchars($_SESSION['user']['email']) ?>" readonly>
                                    <small class="text-muted">Email được liên kết với Google, không thể chỉnh sửa.</small>
                                <?php else: ?>
                                    <input type="text" id="email" name="email" class="form-control form-control-lg"
                                        value="<?=$data['email']?>">
                                    <div id="email-error" style="display: none;" class="text-danger">Email không được để trống *</div>
                                <?php endif; ?>
                            </div>



                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-lg">
                                    Lưu thay đổi
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->stop() ?>
<?= $this->push('scripts') ?>
<script>
    $(document).ready(function() {
        $("#profileForm").submit(function(event) {
            let isValid = true;

            $(".text-danger").hide();

            let firstname = $("#firstname").val().trim();
            let lastname = $("#lastname").val().trim();
            let phone = $("#phone").val().trim();
            let email = $("#email").val().trim();

            if (firstname === "") {
                $("#firstname-error").show();
                isValid = false;
            }

            if (lastname === "") {
                $("#lastname-error").show();
                isValid = false;
            }

            let phoneRegex = /^[0-9]{10,11}$/;
            if (phone === "") {
                $("#phone-error").text("Số điện thoại không được để trống *").show();
                isValid = false;
            } else if (!phoneRegex.test(phone)) {
                $("#phone-error").text("Số điện thoại không hợp lệ *").show();
                isValid = false;
            }

            let emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if ($("#email-group").is(":visible")) {
                if (email === "") {
                    $("#email-error").text("Email không được để trống *").show();
                    isValid = false;
                } else if (!emailRegex.test(email)) {
                    $("#email-error").text("Email không hợp lệ *").show();
                    isValid = false;
                }
            }

            // Nếu có lỗi, ngăn chặn form submit
            if (!isValid) {
                event.preventDefault();
            }
        });
    });
</script>
<?= $this->end() ?>