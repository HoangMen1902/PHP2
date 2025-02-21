<?php $this->layout('Admin/Layouts/Layout') ?>


<?php 
$this->start('main_content');
?>
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Danh sách thương hiệu</h4>
            <div class="table-responsive pt-3">
                <table class="table table-bordered" id="myTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên thương hiệu</th>
                            <th>Hình ảnh</th>
                            <th>Trạng thái</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if(isset($data)):
                                foreach($data as $brand):
                        ?>
                        <tr>
                            <td><?=$brand['id']?></td>
                            <td><?=$brand['name']?></td>
                            <td>
                                <img src="<?=$_ENV['APP_URL']?>/public/Uploads/Brands/<?=$brand['image']?>" 
                                     alt="Brand Image" 
                                     style="object-fit: contain; width: 100px; height: auto;">
                            </td>
                            <td><?=$brand['status'] == 1 ? 'Hoạt động' : 'Khóa'?></td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <a href="/admin/edit-brand/1" class="btn btn-success btn-sm btn-icon-text mr-3">
                                        Sửa
                                        <i class="typcn typcn-edit btn-icon-append"></i>
                                    </a>
                                    <button  onclick="deleteBrand(<?=$brand['id']?>)" class="btn btn-danger btn-sm btn-icon-text">
                                        Xóa
                                        <i class="typcn typcn-delete-outline btn-icon-append"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <?php
                        endforeach;
                    endif;
                    ?>
                        <!-- Thêm các hàng khác nếu cần -->
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

<?php
$this->stop();
?>
<?php

$this->push('scripts')

?>

<script src="<?=$_ENV['APP_URL']?>/public\Assets\Admin\js\Pages\BrandScript.js"></script>


<?php
$this->end();
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
