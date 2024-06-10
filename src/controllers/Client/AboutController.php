<?php

namespace Admin\Asm\Controllers\Client;

use Admin\Asm\Commons\Controller;
use Admin\Asm\Commons\Helper;
use Admin\Asm\Model\User;

class AboutController extends Controller
{
    private User $user;

    public function __construct()
    {
        $this->user = new User();
    }

    public function showFormLogin()
    {
        avoid_login();

        $this->renderViewClient('login');
    }

  // Sửa phương thức login trong AboutController
public function login()
{
    avoid_login();

    try {
        $user = $this->user->findByEmail($_POST['email']);

        if (empty($user)) {
            throw new \Exception('Không tồn tại email: ' . $_POST['email']);
        }

        // Sử dụng isset để kiểm tra mật khẩu được nhập
        if (!isset($_POST['password'])) {
            throw new \Exception('Vui lòng nhập mật khẩu');
        }

        $flag = password_verify($_POST['password'], $user['password']);
        if ($flag) {

            $_SESSION['user'] = $user;

            if ($user['type'] == 'admin') {
                header('Location: ' . url('admin/'));
                exit;
            }

            header('Location: ' . url(''));
            exit;
        } else {
            throw new \Exception('Mật khẩu không đúng');
        }

    } catch (\Throwable $th) {
        $_SESSION['error'] = $th->getMessage();

        header('Location: ' . url('auth/login'));
        exit;
    }
}
    public function logout()
    {
        unset($_SESSION['user']);

        header('Location: ' . url(''));
        exit;
    }
}
