<?php

namespace Admin\Asm\Controllers\Admin;

use Admin\Asm\Commons\Controller;
use Admin\Asm\Model\Flight;
use Admin\Asm\Model\Category;
use Rakit\Validation\Validator as ValidationValidator;

class FlightController extends Controller
{
    private Flight $flight;
    private Category $category;

    public function __construct()
    {
        $this->flight = new Flight();
        $this->category = new Category();
    }
    public function index()
    {
        [$flights, $totalPage] = $this->flight->paginate($_GET['page'] ?? 1);
        $this->renderViewAdmin('flight.index', [
            'flights' => $flights,
            'totalPage' => $totalPage
        ]);
    }

    public function create()
    {
        $categories = $this->category->all();
        $this->renderViewAdmin('flight.create', ['categories' => $categories]);
    }

    public function store()
    {
        $errors = [];

        if (empty($_POST['origin']) || strlen($_POST['origin']) > 50) {
            $errors['origin'] = 'Origin is required and must be at most 50 characters.';
        }
        if (empty($_POST['destination']) || strlen($_POST['destination']) > 50) {
            $errors['destination'] = 'Destination is required and must be at most 50 characters.';
        }
        if (empty($_POST['departure_date']) || !preg_match('/^\d{4}-\d{2}-\d{2}$/', $_POST['departure_date'])) {
            $errors['departure_date'] = 'Departure date is required and must be in the format Y-m-d.';
        }
        if (empty($_POST['departure_time']) || !preg_match('/^\d{2}:\d{2}$/', $_POST['departure_time'])) {
            $errors['departure_time'] = 'Departure time is required and must be in the format H:i.';
        }
        if (empty($_POST['price']) || !is_numeric($_POST['price'])) {
            $errors['price'] = 'Price is required and must be a numeric value.';
        }
        if (empty($_POST['category_id']) || !is_numeric($_POST['category_id'])) {
            $errors['category_id'] = 'Category is required and must be a valid ID.';
        }
        if (empty($_FILES['image']['name']) || !in_array(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION), ['png', 'jpg', 'jpeg']) || $_FILES['image']['size'] > 2048 * 1024) {
            $errors['image'] = 'Image is required, must be a png, jpg, or jpeg file, and must be at most 2048 KB.';
        }

        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            header('Location: ' . url('admin/flights/create'));
            exit();
        } else {
            $data = [
                'Origin' => $_POST['origin'],
                'Destination' => $_POST['destination'],
                'DepartureDate' => $_POST['departure_date'],
                'DepartureTime' => $_POST['departure_time'],
                'Price' => $_POST['price'],
                'category_id' => $_POST['category_id'], // Thay 'CategoryID' bằng 'category_id'
                'description' => $_POST['description'], // Add description field
            ];
            if (!empty($_FILES['image']) && $_FILES['image']['size'] > 0) {
                $from = $_FILES['image']['tmp_name'];
                $to = 'assets/uploads/' . time() . '_' . $_FILES['image']['name'];

                if (move_uploaded_file($from, PATH_ASSET . $to)) {
                    $data['img'] = $to;
                } else {
                    $_SESSION['errors']['image'] = 'Upload không thành công!';
                    header('Location: ' . url('admin/flights/create'));
                    exit();
                }
            }

            $this->flight->insert($data);
            $_SESSION['status'] = true;
            $_SESSION['msg'] = 'Thao tác thành công!';
            header('Location: ' . url('admin/flights'));
            exit();
        }
    }

    public function show($id)
    {
        $flight = $this->flight->findByID($id);
        $this->renderViewAdmin('flight.show', ['flight' => $flight]);
    }

    public function edit($id)
    {
        $flight = $this->flight->findByID($id);
        $categories = $this->category->all();
        $this->renderViewAdmin('flight.edit', ['flight' => $flight, 'categories' => $categories]);
    }

    public function update($id)
{
    $flight = $this->flight->findByID($id);
    $errors = [];

    if (empty($_POST['origin']) || strlen($_POST['origin']) > 50) {
        $errors['origin'] = 'Origin is required and must be at most 50 characters.';
    }
    if (empty($_POST['destination']) || strlen($_POST['destination']) > 50) {
        $errors['destination'] = 'Destination is required and must be at most 50 characters.';
    }
    if (empty($_POST['departure_date']) || !preg_match('/^\d{4}-\d{2}-\d{2}$/', $_POST['departure_date'])) {
        $errors['departure_date'] = 'Departure date is required and must be in the format Y-m-d.';
    }
    if (empty($_POST['departure_time']) || !preg_match('/^\d{2}:\d{2}$/', $_POST['departure_time'])) {
        $errors['departure_time'] = 'Departure time is required and must be in the format H:i.';
    }
    if (empty($_POST['price']) || !is_numeric($_POST['price'])) {
        $errors['price'] = 'Price is required and must be a numeric value.';
    }
    if (empty($_POST['category_id']) || !is_numeric($_POST['category_id'])) {
        $errors['category_id'] = 'Category is required and must be a valid ID.';
    }
    if (!empty($_FILES['image']['name']) && (!in_array(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION), ['png', 'jpg', 'jpeg']) || $_FILES['image']['size'] > 2048 * 1024)) {
        $errors['image'] = 'Image must be a png, jpg, or jpeg file, and must be at most 2048 KB.';
    }

    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        header('Location: ' . url("admin/flights/{$id}/edit"));
        exit();
    } else {
        $data = [
            'Origin' => $_POST['origin'],
            'Destination' => $_POST['destination'],
            'DepartureDate' => $_POST['departure_date'],
            'DepartureTime' => $_POST['departure_time'],
            'Price' => $_POST['price'],
            'category_id' => $_POST['category_id'], 
            'description' => $_POST['description'], // Add description field
        ];

        $flagUpload = false;
        if (isset($_FILES['image']) && $_FILES['image']['size'] > 0) {
            $flagUpload = true;
            $from = $_FILES['image']['tmp_name'];
            $to = 'assets/uploads/' . time() . '_' . $_FILES['image']['name'];

            if (move_uploaded_file($from, PATH_ASSET . $to)) {
                $data['img'] = $to;
            } else {
                $_SESSION['errors']['image'] = 'Upload không thành công!';
                header('Location: ' . url("admin/flights/{$id}/edit"));
                exit();
            }
        }

        $this->flight->update($id, $data);

        if ($flagUpload && $flight['img'] && file_exists(PATH_ASSET . $flight['img'])) {
            unlink(PATH_ASSET . $flight['img']);
        }

        $_SESSION['status'] = true;
        $_SESSION['msg'] = 'Thao tác thành công!';
        header('Location: ' . url('admin/flights'));
        exit();
    }
}


    public function delete($id)
    {
        $flight = $this->flight->findByID($id);
        if ($flight['image'] && file_exists(PATH_ASSET . $flight['image'])) {
            unlink(PATH_ASSET . $flight['image']);
        }

        $this->flight->delete($id);
        header('Location: ' . url('admin/flights'));
        exit();
    }
}
