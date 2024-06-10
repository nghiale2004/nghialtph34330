<?php
// $router->get('/', function(){
//     echo "Trang chủ";
// });

// Website có các trang khác là:
//     Trang chủ
//     Giới thiệu
//     Sản phẩm
//     Chi tiết sản phẩm
//     Liên hệ

// Để định nghĩa được, điều kiện đầu tiên làm là phải tạo Controller trước
// Tiếp theo, khao báo function tương ứng để xử lý
// Bước cuối định nghĩa đường dẫn 

// HTTP Method: GET, POST, PUT, (PATH), DELETE, OPTION, HEAD

use Admin\Asm\Controllers\Client\AboutController;
use Admin\Asm\Controllers\Client\HomeController;



$router->get('/',               HomeController::class    .    '@index');
$router->get('/about',          AboutController::class   .    '@index');
$router->get('/auth/login',            AboutController::class . '@showFormLogin');
$router->post('/auth/handle-login',    AboutController::class . '@login');
$router->get('/auth/logout',           AboutController::class . '@logout');
$router->get('/{id}', HomeController::class . '@showFlightDetail');
