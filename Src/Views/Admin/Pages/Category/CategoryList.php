<?php $this->layout('Admin/Layouts/Layout') ?>


<?php
$this->start('main_content');
?>
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Danh sách Loại sản phẩm</h4>
            <div class="table-responsive pt-3">
                <table class="table table-bordered" id="myTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên Loại sản phẩm</th>
                            <th>Trạng thái</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php if (!empty($data)): ?>
                            <?php foreach ($data as $category): ?>
                                <tr>
                                    <td><?= htmlspecialchars($category['id']) ?></td>
                                    <td><?= htmlspecialchars($category['name']) ?></td>
                                    <td><?= $category['status'] == 1 ? 'Hoạt động' : 'Không hoạt động' ?></td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <a href="/admin/category-edit/<?= htmlspecialchars($category['id']) ?>" class="btn btn-success btn-sm btn-icon-text mr-3">
                                                Sửa
                                                <i class="typcn typcn-edit btn-icon-append"></i>
                                            </a>
                                            <a href="/admin/delete-category/<?= htmlspecialchars($category['id']) ?>" onclick="return confirm('Bạn chắc chứ?')" class="btn btn-danger btn-sm btn-icon-text">
                                                Xóa
                                                <i class="typcn typcn-delete-outline btn-icon-append"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; endif;?>
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
