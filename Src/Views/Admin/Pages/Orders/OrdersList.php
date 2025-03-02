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
                            <th>Action</th>
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
                                        <form action="/admin/cap-nhat-don-hang" method="post" id="statusForm-<?= htmlspecialchars($order['id']) ?>">
                                            <input type="hidden" name="order_id" value="<?= htmlspecialchars($order['id']) ?>">
                                            <select name="order_status" class="form-control order-status" data-order-id="<?= htmlspecialchars($order['id']) ?>" style="width: 200px;">
                                                <?php
                                                $statuses = [
                                                    1 => 'Đang xử lý',
                                                    2 => 'Chờ thanh toán',
                                                    3 => 'Đã thanh toán',
                                                    4 => 'Đang vận chuyển',
                                                    5 => 'Đã giao',
                                                    6 => 'Đã hủy'
                                                ];

                                                foreach ($statuses as $key => $value) {
                                                    $selected = ($order['status'] == $key) ? 'selected' : '';
                                                    $disabled = ($key < $order['status']) ? 'disabled' : ''; 
                                                    echo "<option value='$key' $selected $disabled>$value</option>";
                                                }
                                                ?>
                                            </select>
                                        </form>
                                        <button id="deleteBtn" class="btn btn-danger mt-2" data-id="<?= $order['id'] ?>">Xóa</button>
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
        $('#deleteBtn').on('click', function(e) {
            if (confirm('Bạn có chắc muốn xóa?')) {
                let id = $(this).data('id');
                window.location.href = `/admin/delete-order/${id}`;
            }
        });
        $('.order-status').on('change', function() {
            var status = $(this).val();
            var orderId = $(this).data('order-id');
            console.log('Order ID: ' + orderId + ', Status: ' + status);
            $.ajax({
                url: '/admin/cap-nhat-don-hang',
                method: 'POST',
                data: {
                    order_id: orderId,
                    order_status: status
                },
                success: function(response) {
                    if (response.success) {
                        console.log('Cập nhật trạng thái thành công');
                    } else {
                        console.log('Cập nhật thất bại');
                    }
                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseText);
                    console.log('Có lỗi xảy ra, vui lòng thử lại');
                }

            });
        });
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
</script>
<?=

$this->end();
?>