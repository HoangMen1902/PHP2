<?php $this->layout('Admin/Layouts/Layout') ?>


<?php
$this->start('main_content');
$this->insert(
    'Admin/Pages/Dashboard/Dashboard',
    [
        'product' => $product,
        'user' => $user,
        'category' => $category,
        'brand' => $brand,
        'order' => $order
    ]


);
$this->stop();
?>
