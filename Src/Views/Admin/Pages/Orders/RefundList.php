<?php $this->layout('Admin/Layouts/Layout') ?>

<?php
$this->start('main_content');
?>
<form action="/admin/order-search" class="mb-3" method="post" id="order-search">
    <div class="row">
        <div class="col-lg-12">
            <label for="order">Tìm kiếm đơn hàng</label>
            <input type="text" class="form-control" placeholder="Tìm kiếm đơn hàng" name="order" id="orderSearch">
        </div>
    </div>
</form>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="table-responsive pt-3">
                <table class="table table-striped project-orders-table" id="myTable">
                    <thead>
                        <tr>
                            <th class="ml-5">ID</th>
                            <th>Tên sản phẩm</th>
                            <th>Số điện thoại</th>
                            <th>Địa chỉ</th>
                            <th>Tổng giá sản phẩm</th>
                            <th>Trạng thái</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody id="orderTable">
                        <?php foreach ($data as $order): ?>
                            <tr>
                                <td><?= $order['id'] ?></td>
                                <td><?= $order['product_name'] ?></td>
                                <td><?= $order['phone'] ?></td>
                                <td><?= $order['address'] ?></td>
                                <td><?= number_format($order['total_price']) ?></td>
                                <td>
                                    <?php
                                    switch ($order['status']) {
                                        case 1:
                                            echo 'Đang xử lý';
                                            break;
                                        case 2:
                                            echo 'Chờ thanh toán';
                                            break;
                                        case 3:
                                            echo 'Đã thanh toán';
                                            break;
                                        case 4:
                                            echo 'Đang vận chuyển';
                                            break;
                                        case 5:
                                            echo 'Đã giao';
                                            break;
                                        default:
                                            echo 'Đã hủy';
                                            break;
                                    }
                                    ?>
                                </td>
                                <td>
                                    <div class="row">
                                        <button class="btn btn-danger mt-2 check-btn"  data-id="<?= $order['id'] ?>" data-bs-toggle="modal" data-bs-target="#exampleModal">Kiểm tra</button>
                                    </div>

                                </td>
                            </tr>
                        <?php endforeach ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title" style="font-size: 24px;" id="exampleModalLabel">Kiểm tra giao dịch</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table table-striped project-orders-table" id="myTable2">
                    <thead>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody id="orderTable">
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                    </tbody>
                </table>
            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                <button type="button" class="btn btn-primary">Tiến hành hoàn tiền</button>
            </div>
        </div>
    </div>
</div>
<?php

$this->stop();
?>
<?= $this->push('styles') ?>
<link rel="stylesheet" href="<?= $_ENV['APP_URL'] ?>/node_modules\datatables.net-dt\css\dataTables.dataTables.min.css">
<?=
$this->end();
?>
<?=
$this->push('scripts');
?>
<script src="<?= $_ENV['APP_URL'] ?>/public/Assets/Admin/js/Pages/OrderScript.js"></script>
<script src="<?= $_ENV['APP_URL'] ?>/node_modules/datatables.net/js/datatables.js"></script>

<script>
    $(document).ready(function() {
        $('.check-btn').on('click', function(e) {
            let id = $(this).data('id');
            $.ajax({
                method: 'POST',
                url: `/admin/get-payment/${id}`,
                success: function (response) {
                    console.log(response);
                }, error:function() {
                    console.log('loi');
                }
            });
        })
    });

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

    let table2 = new DataTable('#myTable2', {
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
<?=

$this->end();
?>