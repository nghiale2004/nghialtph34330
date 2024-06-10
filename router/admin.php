<?php
// $router->get('/admin', function(){
//     echo "Trang chủ Admin";
// });

// CRUD bao gồm : Danh sách, Thêm , Sửa, Xóa, Xem
// User:
// GET    -> USER/INDEX   -> INDEX  -> Danh sách
// GET    -> USER/CREATE  -> CREATE -> Hiển thị FORM thêm mới
// POST   -> USER/STORE   -> STORE  -> Lưu trữ dữ liệu từ FORM thêm mới vào DB
// GET    -> USER/ID      -> SHOW {$id}   -> Xem chi tiết
// GET    -> USER/ID/EDIT -> EDIT {$id}   -> Hiển thị FORM cập nhật
// POST   -> USER/ID/UPDATE     -> UPDATE {$id} -> Lưu dữ liệu từ FORM cập nhật vào DB
// GET -> USER/ID/Delete      -> DELETE {$id} -> Xóa bản ghi trong DB

use Admin\Asm\Controllers\Admin\UserController;
use Admin\Asm\Controllers\Admin\FlightController;
use Admin\Asm\Controllers\Admin\DashboardController;
use Admin\Asm\Controllers\Admin\CategoryController;

$router->before('GET|POST', '/admin/*.*', function () {

    if (!is_logged()) {
        header('location: ' . url('auth/login'));
        exit();
    }

    if (!is_admin()) {
        header('location: ' . url(''));
        exit();
    }
});

// CRUD USER
$router->mount('/admin', function () use ($router) {

    $router->get('/', DashboardController::class . '@dashboard');

    $router->mount('/users', function () use ($router) {
        $router->get('/',           UserController::class . '@index');
        $router->get('/create',     UserController::class . '@create');
        $router->post('/store',     UserController::class . '@store');
        $router->get('/{id}/show',  UserController::class . '@show');
        $router->get('/{id}/edit',  UserController::class . '@edit');
        $router->post('/{id}/update', UserController::class . '@update');
        $router->get('/{id}/delete', UserController::class . '@delete');
    });

    // CRUD FLIGHT
    $router->mount('/flights', function () use ($router) {
        $router->get('/',           FlightController::class . '@index');
        $router->get('/create',     FlightController::class . '@create');
        $router->post('/store',     FlightController::class . '@store');
        $router->get('/{id}/show',  FlightController::class . '@show');
        $router->get('/{id}/edit',  FlightController::class . '@edit');
        $router->post('/{id}/update', FlightController::class . '@update');
        $router->get('/{id}/delete', FlightController::class . '@delete');
    });
    // Assuming $router is already defined
    $router->mount('/categories', function () use ($router) {
        $router->get('/',           CategoryController::class . '@index');
        $router->get('/create',     CategoryController::class . '@create');
        $router->post('/store',     CategoryController::class . '@store');
        $router->get('/{id}/show',  CategoryController::class . '@show');
        $router->get('/{id}/edit',  CategoryController::class . '@edit');
        $router->post('/{id}/update', CategoryController::class . '@update');
        $router->get('/{id}/delete', CategoryController::class . '@delete');
    });
});
