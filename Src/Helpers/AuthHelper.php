<?php
namespace Src\Helpers;

use Src\Notifications\Notification;

class AuthHelper {

    public static function middleware()
    {
        $admin = explode('/', $_SERVER['REQUEST_URI']);
        $admin = $admin[1];

        if ($admin == 'admin') {
            if (!isset($_SESSION['user'])) {
                Notification::error('Admin', 'Vui lòng đăng nhập');
                header('location: /dang-nhap');
                exit;
            }
            if ($_SESSION['user']['role'] != 2) {
                Notification::error('Admin', 'Tài khoản không có quyền truy cập');
                header('location: /home');
                exit;
            }
            
        }


    }
}

?>