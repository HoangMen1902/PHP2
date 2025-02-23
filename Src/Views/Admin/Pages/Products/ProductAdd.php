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
                    <label for="name">Mã SKU</label>
                    <input type="text" class="form-control" name="sku_base" placeholder="SKU">
                    <small id="name-required" class="text-danger" style="display:none">Vui lòng nhập tên sản phẩm</small>
                </div>

                <div class="form-group">
                    <label for="name">Tên sản phẩm</label>
                    <input type="text" class="form-control" name="name" placeholder="Tên sản phẩm">
                    <small id="name-required" class="text-danger" style="display:none">Vui lòng nhập tên sản phẩm</small>
                </div>

                <div class="form-group">
                    <label for="description">Mô tả ngắn</label>
                    <textarea class="form-control" name="short_description" id="short_description" rows="2" placeholder="Mô tả sản phẩm"></textarea>
                    <small id="description-required" class="text-danger" style="display:none">Vui lòng nhập mô tả sản phẩm</small>
                </div>

                <div class="form-group">
                    <label for="description">Mô tả sản phẩm</label>
                    <textarea class="form-control" name="description" id="description" rows="4" placeholder="Mô tả sản phẩm"></textarea>
                    <small id="description-required" class="text-danger" style="display:none">Vui lòng nhập mô tả sản phẩm</small>
                </div>
                <div class="form-group">
                    <label for="quantity">Số lượng</label>
                    <input type="number" min="0" class="form-control" name="quantity_base" id="quantity">
                    <small id="quantity" class="text-danger" style="display:none">Vui lòng nhập số lượng</small>

                </div>
                <div class="form-group">
                    <label for="brand">Thương hiệu</label>
                    <select class="form-control select2-form" name="brand_id">
                        <option value="">Chọn danh thương hiệu</option>
                        <?php foreach ($brands as $key => $brand): ?>
                            <option value="<?= $brand['id'] ?>"><?= $brand['name'] ?></option>
                        <?php endforeach ?>
                    </select>
                    <small id="brand-required" class="text-danger" style="display:none">Vui lòng chọn thương hiệu sản phẩm</small>

                </div>
                <div class="form-group">
                    <label for="categories">Danh mục</label>
                    <select class="form-control select2-form" id="categories" name="category_id">
                        <option value="">Chọn danh mục sản phẩm</option>
                        <?php foreach ($categories as $key => $category): ?>
                            <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
                        <?php endforeach ?>

                    </select>

                    <small id="categories-required" class="text-danger" style="display:none">Vui lòng chọn danh mục sản phẩm</small>
                </div>
                <div class="form-group">
                    <label for="price">Giá</label>
                    <input type="number" class="form-control" name="price_base" placeholder="Giá" required>
                    <small id="categories-required" class="text-danger" style="display:none">Vui lòng nhập giá cho sản phẩm</small>
                </div>


                <div class="form-group">
                    <label for="thumbnail">Hình ảnh sản phẩm</label>
                    <input type="file" class="form-control" name="thumbnail" accept="image/*">
                    <div id="imagesPreview" style="display: flex; gap: 10px; margin-top: 10px; flex-wrap: wrap;"></div>
                    <small id="thumbnail-required" class="text-danger" style="display:none">Vui lòng chọn hình ảnh sản phẩm</small>
                </div>


                <div class="form-group">
                    <label>Thuộc tính sản phẩm</label>
                    <div id="productAttributes">
                        <div class="row attribute-group">
                            <div class="col-md-5">
                                <select class="form-control select2-form" name="options_base[]">
                                    <option value="">Chọn thuộc tính</option>
                                    <?php foreach ($options as $key => $option): ?>
                                        <option value="<?= $option['id'] ?>"><?= $option['name'] ?></option>
                                    <?php endforeach ?>

                                </select>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="values_base[]" placeholder="Giá trị (VD: Đỏ)">
                            </div>

                        </div>
                    </div>
                    <button type="button" class="btn btn-info btn-sm mt-2" id="addAttribute">Thêm thuộc tính</button>
                </div>

                <div class="form-group">
                    <label for="status">Trạng thái</label>
                    <select class="form-control" name="status">
                        <option value="1" <?= isset($data['status']) && $data['status'] == 1 ? 'selected' : '' ?>>Hoạt động</option>
                        <option value="2" <?= isset($data['status']) && $data['status'] == 2 ? 'selected' : '' ?>>Không hoạt động</option>
                    </select>
                </div>
                <div class="form-group" id="variantsContainer">

                </div>


                <button type="submit" class="btn btn-primary">Thêm sản phẩm</button>
                <button type="button" id="addVariant" class="btn btn-warning text-light" style="float: right;">Thêm biến thể</button>

            </form>
        </div>

    </div>
</div>



<?php $this->stop(); ?>
<?php

$this->push('scripts');
?>
<script src="<?= $_ENV['APP_URL'] ?>/node_modules\ckeditor4\ckeditor.js"></script>
<script>
    CKEDITOR.replace('description', {
        height: 300,
    });
</script>
<script src="<?= $_ENV['APP_URL'] ?>/public\Assets\Admin\js\Pages\ProductValidate.js"></script>
<script>
    $(document).ready(function() {

        let variantIndex = 0;

        function updateIndexes() {
            $(".variant-group").each(function(index) {
                $(this).attr("data-index", index);
                $(this).find("h5").text("SKU " + (index + 1));
            });
            variantIndex = $(".variant-group").length;
        }

        $("#addVariant").on("click", function() {
            let variantHtml = `
            <div class="form-group variant-group" data-index="${variantIndex}">
                <h5>SKU ${variantIndex + 1}</h5>
                <div class="row">
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="sku[]" placeholder="Mã SKU" required>
                    </div>
                    <div class="col-md-3">
                        <input type="number" class="form-control" name="price[]" placeholder="Giá" required>
                    </div>
                    <div class="col-md-2">
                        <input type="number" class="form-control" name="quantity[]" placeholder="Số lượng" required>
                    </div>
                    <div class="col-md-3">
                        <input type="file" class="form-control" name="image[]" accept="image/*">
                    </div>
                    <div class="col-md-1 d-flex align-items-end">
                        <button type="button" class="btn btn-danger remove-variant">X</button>
                    </div>
                </div>

                <!-- Nút thêm thuộc tính -->
                <button type="button" class="btn btn-info btn-sm add-attribute mt-2">Thêm thuộc tính</button>
                <div class="attributes-container mt-2"></div> 

            </div>
        `;

            $("#variantsContainer").append(variantHtml);
            variantIndex++;
        });

        // Xóa SKU
        $(document).on("click", ".remove-variant", function() {
            $(this).closest(".variant-group").remove();
            updateIndexes();
        });


        $(document).on("click", ".add-attribute", function() {
            let skuIndex = $(this).closest(".variant-group").attr("data-index");
            let attributeHtml = `
            <div class="row attribute-group mt-2">
                <div class="col-md-5">
                <select class="form-control select2-form" name="options[${skuIndex}][]">
                        <option value="">Chọn danh mục sản phẩm</option>
                        <?php foreach ($options as $key => $option): ?>
                            <option value="<?= $option['id'] ?>"><?= $option['name'] ?></option>
                        <?php endforeach ?>

                    </select>
                </div>
                <div class="col-md-5">
                    <input type="text" class="form-control" name="values[${skuIndex}][]" placeholder="Giá trị (Ví dụ: Đỏ)">
                </div>
                <div class="col-md-2 d-flex align-items-end">
                    <button type="button" class="btn btn-danger btn-sm remove-attribute">X</button>
                </div>
            </div>
        `;
            $(this).siblings(".attributes-container").append(attributeHtml);
        });


        $("#addAttribute").on("click", function() {
            let attributeHtml = `
            <div class="row attribute-group mt-2">
                <div class="col-md-5">
                <select class="form-control select2-form" name="options_base[]">
                        <option value="">Chọn danh mục sản phẩm</option>
                        <?php foreach ($options as $key => $option): ?>
                            <option value="<?= $option['id'] ?>"><?= $option['name'] ?></option>
                        <?php endforeach ?>

                    </select>
                </div>
                <div class="col-md-5">
                    <input type="text" class="form-control" name="values_base[]" placeholder="Giá trị (VD: Đỏ)">
                </div>
                <div class="col-md-2 d-flex align-items-end">
                    <button type="button" class="btn btn-danger btn-sm remove-attribute">X</button>
                </div>
            </div>
        `;
            $("#productAttributes").append(attributeHtml);
        });
        $(document).on("click", ".remove-attribute", function() {
            $(this).closest(".attribute-group").remove();
        });
        $('.select2-form').select2();


    });



</script>
<?php

$this->end();
?>

<?= $this->push('styles') ?>
<style>
    .error {
        color: red;
        font-size: 14px;
        margin-top: 5px;
    }

    .input-error {
        border: 2px solid red;
    }
</style>
<?php

$this->end();
?>