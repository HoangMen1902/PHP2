<?php $this->layout('Admin/Layouts/Layout') ?>


<?php
$this->start('main_content');
?>
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Danh sách Loại sản phẩm</h4>
            <div class="table-responsive pt-3">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên Loại sản phẩm</th>
                            <th>Trạng thái</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                            <tr>
                                <td>1</td>
                                <td>Phân loại 1</td>
                                <td>Hoạt động</td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="bi bi-three-dots"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item d-flex" href="/admin/category/edit/">
                                                <p>Sửa</p>
                                                <i class="typcn typcn-edit btn-icon-append"></i>
                                            </a>
                                            <a class="dropdown-item d-flex" href="/admin/category/delete/" onclick="return confirm('Bạn chắc chứ?')">
                                                <p>Xóa</p>
                                                <i class="typcn typcn-delete-outline btn-icon-append"></i>
                                            </a>            

                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                    </tbody>
                </table>
                <?php
                if(!isset($category) || empty($category)):
                ?>
                <h4 class="text-center text-danger">Không có dữ liệu</h4>
                <?php
                endif;
                ?>
            </div>
        </div>
    </div>
</div>


<?php

$this->stop();
?>