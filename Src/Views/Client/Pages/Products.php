<?= $this->layout('Client/Components/Layout') ?>

<?= $this->start('main_content') ?>
<div class="container-def">
    <div class="sidebar">
        <div class="category-list">
            <h4>Phan loai</h4>
            <input type="checkbox" name="category-temp" id="">
            <label for="">Touhou Project</label>
            <input type="checkbox" name="category-temp" id="">
            <label for="">Touhou Project</label>
            <input type="checkbox" name="category-temp" id="">
            <label for="">Touhou Project</label>
            <input type="checkbox" name="category-temp" id="">
            <label for="">Touhou Project</label>
            <input type="checkbox" name="category-temp" id="">
            <label for="">Touhou Project</label>
        </div>
        <div class="budget">
            
        </div>
    </div>
    <div class="product-block">
        <div class="row">
            <div class="item">
                <div class="product-card">
                    <div class="card-img">
                        <img src="<?=client_img?>/TempProduct/SuwakoFumo.jpg" alt="">
                    </div>
                    <div class="card-content">
                        <h3>Ten san pham</h3>
                        <p>Mo ta chut xiu</p>
                    </div>
                    <div class="widget">
                        <span class="price">1.000.000đ</span>
                        <a href="">Xem chi tiet</a>
                    </div>
                </div>
            </div>
            <div class="item">

            </div>
            <div class="item">

            </div>
            <div class="item">

            </div>
        </div>
        <div class="row">
            <div class="item">

            </div>
            <div class="item">

            </div>
            <div class="item">

            </div>
            <div class="item">

            </div>
        </div>
    </div>
</div>

<?= $this->stop() ?>