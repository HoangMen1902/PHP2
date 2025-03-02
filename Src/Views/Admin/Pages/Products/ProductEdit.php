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
            <form action="/admin/product/edit/<?= $data[0]['product_id'] ?>" id="editForm" method="post" enctype="multipart/form-data">

                <p class="card-description">Thông tin sản phẩm</p>
                <div class="form-group">
                    <label for="name">Mã SKU</label>
                    <input type="text" class="form-control" name="sku_base" placeholder="SKU" value="<?= $data[0]['sku'] ?>">
                    <input type="hidden" class="form-control" name="sku_id" placeholder="SKU" value="<?= $data[0]['sku_id'] ?>">

                </div>

                <div class="form-group">
                    <label for="name">Tên sản phẩm</label>
                    <input type="text" class="form-control" name="name" placeholder="Tên sản phẩm" value="<?= $data[0]['name'] ?>">
                </div>

                <div class="form-group">
                    <label for="description">Mô tả ngắn</label>
                    <textarea class="form-control" name="short_description" id="short_description" rows="2" placeholder="Mô tả sản phẩm"> <?= $data[0]['short_description'] ?></textarea>
                </div>

                <div class="form-group">
                    <label for="description">Mô tả sản phẩm</label>
                    <textarea class="form-control" name="description" id="description" rows="4" placeholder="Mô tả sản phẩm"><?= $data[0]['description'] ?></textarea>
                </div>
                <div class="form-group">
                    <label for="quantity">Số lượng</label>
                    <input type="number" min="0" class="form-control" name="quantity_base" id="quantity" value="<?= $data[0]['quantity'] ?>">

                </div>
                <div class="form-group">
                    <label for="brand">Thương hiệu</label>
                    <select class="form-control select2-form" name="brand_id">
                        <option value="">Chọn danh thương hiệu</option>
                        <?php foreach ($brands as $key => $brand): ?>
                            <option value="<?= $brand['id'] ?>" <?= $brand['id'] === $data[0]['brand_id'] ? 'selected' : '' ?>> <?= $brand['name'] ?></option>
                        <?php endforeach ?>
                    </select>

                </div>
                <div class="form-group">
                    <label for="categories">Danh mục</label>
                    <select class="form-control select2-form" id="categories" name="category_id">
                        <option value="">Chọn danh mục sản phẩm</option>
                        <?php foreach ($categories as $key => $category): ?>
                            <option value="<?= $category['id'] ?>" <?= $category['id'] === $data[0]['category_id'] ? 'selected' : '' ?>><?= $category['name'] ?></option>
                        <?php endforeach ?>

                    </select>

                </div>
                <div class="form-group">
                    <label for="price">Giá</label>
                    <input type="number" class="form-control" name="price_base" placeholder="Giá" value="<?= $data[0]['price'] ?>">
                </div>


                <div class="form-group">
                    <label for="thumbnail">Hình ảnh sản phẩm</label>
                    <input type="file" class="form-control" name="thumbnail" accept="image/*">
                    <div id="imagesPreview" style="display: flex; gap: 10px; margin-top: 10px; flex-wrap: wrap;"></div>
                </div>


                <div class="form-group">
                    <label>Thuộc tính sản phẩm</label>
                    <div id="productAttributes">
                        <?php
                        $option_id = explode(',', $data[0]['option_ids']);
                        $value_id = explode(',', $data[0]['value_ids']);
                        $value_names = explode(',', $data[0]['value_names']);


                        foreach ($option_id as $index => $value):
                        ?>
                            <div class="row attribute-group">
                                <div class="col-md-5">
                                    <select class="form-control select2-form" name="options_base[]">
                                        <option value="">Chọn thuộc tính</option>
                                        <?php foreach ($options as $key => $option): ?>
                                            <option value="<?= $option['id'] ?>" <?= $value == $option['id'] ? 'selected' : '' ?>><?= $option['name'] ?></option>
                                        <?php endforeach ?>

                                    </select>
                                </div>

                                <div class="col-md-<?= array_key_first($option_id) === $index ? '6' : '5' ?>">
                                    <input type="text" class="form-control" name="values_base[]" placeholder="Giá trị (VD: Đỏ)" value="<?= $value_names[$index] ?>">
                                </div>
                                <?php
                                if (array_key_first($option_id) !== $index):
                                ?>
                                    <div class="col-md-2 d-flex align-items-end">
                                        <button type="button" onclick="deleteProperty(<?= $value_id[$index] ?>)" class="btn btn-danger btn-sm remove-attribute-2" data-id="<?= $value_id[$index] ?>">X</button>
                                    </div>
                                <?php
                                endif;
                                ?>
                            </div>
                        <?php
                        endforeach;
                        ?>

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

                    <?php $i = 1;
                    $key_index = 0;
                    for ($i = 1; $i < count($data); $i++):
                    ?>
                        <?php
                        $sku_option_id = explode(',', $data[$i]['option_ids']);
                        $sku_value_id = explode(',', $data[$i]['value_ids']);
                        $sku_value_names = explode(',', $data[$i]['value_names']);
                        ?>
                        <div class="form-group variant-group" data-index="<?= $i ?>">
                            <h5>SKU <?= $i ?></h5>
                            <div class="row">
                                <div class="col-md-3">
                                    <input type="text" class="form-control" name="sku[]" placeholder="Mã SKU" value="<?= $data[$i]['sku_name'] ?>">
                                </div>
                                <div class="col-md-3">
                                    <input type="number" class="form-control" name="price[]" placeholder="Giá" value="<?= $data[$i]['price'] ?>">
                                </div>
                                <div class="col-md-2">
                                    <input type="number" class="form-control" name="quantity[]" placeholder="Số lượng" value="<?= $data[$i]['quantity'] ?>">
                                </div>
                                <div class="col-md-3">
                                    <input type="file" class="form-control" name="image[]" accept="image/*">
                                </div>
                                <div class="col-md-1 d-flex align-items-end">
                                    <button type="button" class="btn btn-danger remove-variant-2" data-id="<?=$data[$i]['sku_id']?>">X</button>
                                </div>
                            </div>

                            <button type="button" class="btn btn-info btn-sm add-attribute mt-2">Thêm thuộc tính</button>
                            <div class="attributes-container mt-2">
                                <?php 
                                foreach ($sku_option_id as $keyIndex => $sku_option):
                                ?>
                                    <div class="row attribute-group mt-2">
                                        <div class="col-md-5">
                                            <select class="form-control select2-form" name="options[<?= $key_index ?>][]">
                                                <option value="">Chọn thuộc tính</option>
                                                <?php foreach ($options as $key => $option): ?>
                                                    <option value="<?= $option['id'] ?>" <?= $sku_option == $option['id'] ? 'selected' : '' ?>><?= $option['name'] ?></option>
                                                <?php endforeach ?>

                                            </select>
                                        </div>
                                        <div class="col-md-<?= array_key_first($sku_option_id) === $keyIndex ? '6' : '5' ?>">
                                            <input type="text" class="form-control" name="values[<?=$key_index?>][]" placeholder="Giá trị (Ví dụ: Đỏ)" value="<?= $sku_value_names[$keyIndex] ?>">
                                        </div>
                                        <?php
                                        if (array_key_first($sku_option_id) !== $keyIndex):
                                        ?>
                                            <div class="col-md-2 d-flex align-items-end">
                                                <button type="button" onclick="deleteProperty(<?= $sku_value_id[$keyIndex] ?>)" class="btn btn-danger btn-sm remove-attribute-2" data-id="<?= $sku_value_id[$keyIndex] ?>">X</button>
                                            </div>
                                        <?php
                                        endif;
                                        ?>
                                    </div>
                                <?php 
                                endforeach 
                                ?>
                            </div>

                        </div>
                    <?php
                    $key_index++;
                    endfor;
                    ?>
                </div>


                <button type="submit" class="btn btn-primary">Sửa sản phẩm</button>
                <button type="button" id="addVariant" class="btn btn-warning text-light" style="float: right;">Thêm biến thể</button>

            </form>
            <div id="response"></div>

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
<script>
    $(document).on("click", ".remove-attribute-2", function() {
        let $this = $(this);

        let id = $this.data("id");

        if (confirm("Bạn có chắc muốn xóa thuộc tính này không?")) {
            $.ajax({
                type: "POST",
                url: "/admin/delete-property",
                data: {
                    id: id
                },
                success: function(response) {
                    console.log(response);
                    if (response.trim() === "success") {
                        $this.closest(".attribute-group").remove();
                    } else {
                        alert("Xóa thất bại! Vui lòng thử lại.");
                    }
                },
                error: function() {
                    console.log("Lỗi");
                    alert("Có lỗi xảy ra khi xóa!");
                }
            });
        }
    });

    $(document).on("click", ".remove-variant-2", function() {
    let $this = $(this); 
    let id = $this.data("id"); 

    if (confirm("Bạn có chắc muốn xóa SKU này không?")) {
        $.ajax({
            type: "POST",
            url: "/admin/delete-sku",
            data: { id: id },
            success: function(response) {
                console.log(response);
                if (response.trim() === "success") {
                    $this.closest(".variant-group").remove(); 
            updateIndexes();
                } else {
                    alert("Xóa thất bại! Vui lòng thử lại.");
                }
            },
            error: function() {
                console.log("Lỗi");
                alert("Có lỗi xảy ra khi xóa!");
            }
        });
    }
});

    $(document).ready(function() {


        $('#editForm').on('submit', function(e) {
            e.preventDefault();
            for (instance in CKEDITOR.instances) {
                CKEDITOR.instances[instance].updateElement();
            }

            $.ajax({

                type: "POST",
                url: "/admin/product-validate",
                data: $(this).serialize(),
                success: function(response) {
                    console.log(response);
                    if (response.length !== 0) {
                        console.log(response);
                        html = `<small class="text-danger">* Vui lòng điền thông tin</small>`
                        $('.text-danger').remove();
                        response.forEach(element => {
                            if (element === 'options_base') {
                                let field = $(`[name="options_base[]"]`);
                                field.next('.select2').after(html);
                            }
                            if (element === 'values_base') {
                                let field = $(`[name="values_base[]"]`);
                                field.after(html);
                            }
                            let field = $(`[name="${element}"]`);
                            if (field.hasClass('select2-hidden-accessible')) {
                                field.next('.select2').after(html);
                            } else {
                                field.after(html);
                            }
                        });
                    } else {
                        $('#editForm').off('submit').submit();
                    }
                },
                error: function() {
                    console.log('loi');
                    $('#response').html('<p class="text-danger">Có lỗi xảy ra!</p>');
                }
            });
        });

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
                        <input type="text" class="form-control" name="sku[]" placeholder="Mã SKU" >
                    </div>
                    <div class="col-md-3">
                        <input type="number" class="form-control" name="price[]" placeholder="Giá" >
                    </div>
                    <div class="col-md-2">
                        <input type="number" class="form-control" name="quantity[]" placeholder="Số lượng" >
                    </div>
                    <div class="col-md-3">
                        <input type="file" class="form-control" name="image[]" accept="image/*">
                    </div>
                    <div class="col-md-1 d-flex align-items-end">
                        <button type="button" class="btn btn-danger remove-variant">X</button>
                    </div>
                </div>

                <button type="button" class="btn btn-info btn-sm add-attribute mt-2">Thêm thuộc tính</button>
                <div class="attributes-container mt-2"></div> 

            </div>
        `;

            $("#variantsContainer").append(variantHtml);
            variantIndex++;
        });

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
                        <option value="">Chọn thuộc tính </option>
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



    $(document).ready(function() {
        $('#productAddForm').on('submit', function(e) {
            e.preventDefault();
            console.log(e);

        })
    })
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