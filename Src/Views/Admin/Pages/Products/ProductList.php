<?php $this->layout('Admin/Layouts/Layout') ?>

<?php
$this->start('main_content');
?>

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Danh sách Sản phẩm</h4>

            <div class="table-responsive pt-3">
                <table class="table table-bordered" id="myTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên Sản phẩm</th>
                            <th>Hình ảnh</th>
                            <th>Trạng thái</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($data) && !empty($data)):
                            foreach ($data as $product):
                                $product['thumbnail'] = explode(',', $product['thumbnail']);
                        ?>
                                <tr>
                                    <td><?= $product['id'] ?></td>
                                    <td><?= $product['name'] ?></td>
                                    <td><img src="<?=$_ENV['APP_URL']?>/Public/Uploads/<?= $product['thumbnail'][0] ?>" alt="Hình ảnh sản phẩm" width="100%"></td>
                                    <td><?= $product['status'] == 1 ? 'Hoạt động' : 'Ẩn' ?></td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="bi bi-three-dots"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item d-flex align-items-center" href="/admin/change-status-product/<?=$product['id']?>" onclick="return confirm('Bạn chắc chứ?')">
                                                    <span><?=$product['status'] === 1 ? "Tạm ngưng" : "Hoạt động"?></span>
                                                    <i class="typcn typcn-delete-outline ms-auto"></i>
                                                </a>
                                                <a class="dropdown-item d-flex align-items-center" href="/admin/product/detail/<?=$product['id']?>">
                                                    <span>Chi tiết/Sửa</span>
                                                    <i class="typcn typcn-document ms-auto"></i>
                                                </a>

                                            </div>
                                        </div>
                                    </td>
                                </tr>
                        <?php
                            endforeach;
                        else:
                        ?>
                        <?php 
                    endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<?php
$this->stop();
?>

<?=$this->push('styles')?>
<link rel="stylesheet" href="<?= $_ENV['APP_URL'] ?>/node_modules\datatables.net-dt\css\dataTables.dataTables.min.css">
<?=$this->end()?>

<?=$this->push('scripts')?>
<script src="<?= $_ENV['APP_URL'] ?>/node_modules/datatables.net/js/datatables.js"></script>
<script>
    function closeAlert() {
        document.getElementById('alert-box').style.display = 'none';
    }


    let table = new DataTable('#myTable', {
        responsive: true,
        language: {
            decimal: ",",
            thousands: ".",
            search: "Tìm kiếm:",
            lengthMenu: "Hiển thị _MENU_ dòng mỗi trang",
            info: "Hiển thị _START_ đến _END_ trong tổng số _TOTAL_ dòng",
            infoEmpty: "Không có dữ liệu",
            infoFiltered: "(lọc từ _MAX_ dòng)",
            loadingRecords: "Đang tải...",
            zeroRecords: "Không tìm thấy kết quả phù hợp",
            emptyTable: "Không có dữ liệu trong bảng",
            paginate: {
                first: "Đầu",
                last: "Cuối",
                next: "Tiếp",
                previous: "Trước"
            },
            aria: {
                sortAscending: ": kích hoạt để sắp xếp cột tăng dần",
                sortDescending: ": kích hoạt để sắp xếp cột giảm dần"
            }
        }

    });
</script>
<?=$this->end()?>
