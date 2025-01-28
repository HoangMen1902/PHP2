<?php $this->layout('Admin/Layouts/Layout') ?>


<?php
$this->push('styles');
?>
<style>
    .cke_notification {
    display: none !important;
}
</style>
<?php
$this->end();
?>
<?php
$this->start('main_content');
?>


<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Thêm sản phẩm</h4>
            <form action="/admin/product/store" id="productAddForm" method="post" enctype="multipart/form-data">

                <p class="card-description">Thông tin sản phẩm</p>
                <div class="form-group">
                    <label for="name">Tên sản phẩm</label>
                    <input type="text" class="form-control" name="name" placeholder="Tên sản phẩm" value="<?= htmlspecialchars($data['name'] ?? '') ?>">
                    <small id="name-required" class="text-danger" style="display:none">Vui lòng nhập tên sản phẩm</small>
                </div>

                <div class="form-group">
                    <label for="description">Mô tả ngắn</label>
                    <textarea class="form-control" name="short_description" id="short_description" rows="2" placeholder="Mô tả sản phẩm"><?= htmlspecialchars($data['description'] ?? '') ?></textarea>
                    <small id="description-required" class="text-danger" style="display:none">Vui lòng nhập mô tả sản phẩm</small>
                </div>

                <div class="form-group">
                    <label for="description">Mô tả sản phẩm</label>
                    <textarea class="form-control" name="description" id="description" rows="4" placeholder="Mô tả sản phẩm"><?= htmlspecialchars($data['description'] ?? '') ?></textarea>
                    <small id="description-required" class="text-danger" style="display:none">Vui lòng nhập mô tả sản phẩm</small>
                </div>

                <div class="form-group">
                    <label for="brand">Thương hiệu</label>
                    <select class="form-control" name="brand">
                        <?php
                        if (isset($brands) && !empty($brands)):
                            foreach ($brands as $brand):
                        ?>
                                <option value="<?= $brand['id'] ?>"><?= $brand['name'] ?></option>
                            <?php
                            endforeach;
                        else :
                            ?>
                            <option value="">Không có thương hiệu</option>

                        <?php
                        endif;
                        ?>
                    </select>
                    <small id="brand-required" class="text-danger" style="display:none">Vui lòng chọn thương hiệusản phẩm</small>

                </div>
                    <div class="form-group">
                        <label for="categories">Danh mục cha:</label>
                        <select class="form-control" id="categories" name="categories" >
                            <option value="">Chọn danh mục cha</option>
                            
                        </select>

                        <div id="child_category" style="display:none;">
                            <label for="child_category">Danh mục con:</label>
                            <select class="form-control" id="child_category" name="child_category">
                                <option value="">Chọn danh mục con</option>
                            </select>
                        </div>
                    <small id="categories-required" class="text-danger" style="display:none">Vui lòng chọn danh mục sản phẩm</small>
                    </div>



                <div class="form-group">
                    <label for="discount">Giá giảm (%)</label>
                    <input type="number" class="form-control" name="discount" placeholder="Giảm giá" min="0" max="100" value="<?= htmlspecialchars($data['discount'] ?? '') ?>">
                    <small id="discount-required" class="text-danger" style="display:none">Vui lòng nhập giá giảm</small>
                </div>

                <div class="form-group">
                    <label for="thumbnail">Hình ảnh sản phẩm</label>
                    <input type="file" class="form-control" name="thumbnail[]" accept="image/*" multiple>
                    <div id="imagesPreview" style="display: flex; gap: 10px; margin-top: 10px; flex-wrap: wrap;"></div>
                    <small id="thumbnail-required" class="text-danger" style="display:none">Vui lòng chọn hình ảnh sản phẩm</small>
                </div>

                <div class="form-group">
                    <label for="specifications_file">Tải lên file Excel cho thông số kỹ thuật (.xls hoặc .xlsx)</label>
                    <input type="file" class="form-control" name="specifications_file" accept=".xls, .xlsx">
                    <small id="categories-required" class="text-danger" style="display:none">Vui lòng tải lên file excel sản phẩm</small>
                </div>

                <div class="form-group">
                    <label for="status">Trạng thái</label>
                    <select class="form-control" name="status">
                        <option value="1" <?= isset($data['status']) && $data['status'] == 1 ? 'selected' : '' ?>>Hoạt động</option>
                        <option value="2" <?= isset($data['status']) && $data['status'] == 2 ? 'selected' : '' ?>>Không hoạt động</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Thêm biến thể</label>
                    <div id="sku_section">
                        
                    </div>
                    <a href="javascript:void(0)" onclick="addSku()" class="btn btn-success mt-3">Thêm SKU</a>
                </div>

                <button type="submit" name="submit" class="btn btn-primary">Thêm sản phẩm</button>
            </form>
        </div>
    </div>
</div>



<?php $this->stop(); ?>
<?php

$this->push('scripts');
?>
<script src="<?=$_ENV['APP_URL']?>/node_modules\ckeditor4\ckeditor.js"></script>
<script>

    CKEDITOR.replace('description', {
    height: 300,
});

</script>
<script src="<?= $_ENV['APP_URL'] ?>/public\Assets\Admin\js\Pages\ProductValidate.js"></script>
<?php

$this->end();