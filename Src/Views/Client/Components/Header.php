<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SuwaFumo</title>
    <link rel="icon" type="image/x-icon" href="<?= client_img ?>/Icon.png">
    <?= $this->section('styles') ?>
    <link rel="stylesheet" href="<?= client_css ?>">
    <link rel="stylesheet" href="<?= bootstrap ?>">
</head>

<body>
    <header class="container-default">
        <div class="item-group">
            <a href="/home" class="menu-logo"><img type="image" src="<?= client_img ?>/LogoNoBg.png" alt="Website logo" class="page-logo"></a>
            <ul class="header-menu">
                <a href="#">
                    <li class="menu-item">Trang chủ</li>
                </a>
                <a href="#">
                    <li class="menu-item">Giới thiệu</li>
                </a>
                <a href="#">
                    <li class="menu-item">Sản phẩm</li>
                </a>
                <a href="#">
                    <li class="menu-item">Liên hệ</li>
                </a>
            </ul>
        </div>

        <div class="header-icon">
            <a href=""><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                </svg></a>
            <a href=""><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                </svg></a>
        </div>
    </header>
    <div class="header-space"></div>