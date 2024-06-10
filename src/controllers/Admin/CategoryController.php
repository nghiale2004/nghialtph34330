<?php

namespace Admin\Asm\Controllers\Admin;

use Admin\Asm\Commons\Controller;
use Admin\Asm\Model\Category;
use Rakit\Validation\Validator as ValidationValidator;

class CategoryController extends Controller
{
    private Category $category;

    public function __construct()
    {
        $this->category = new Category();
    }

    public function index()
    {
        [$categories, $totalPage] = $this->category->paginate($_GET['page'] ?? 1);
        $this->renderViewAdmin('categories.index', [
            'categories' => $categories,
            'totalPage' => $totalPage
        ]);
    }
    

    public function create()
    {
        $this->renderViewAdmin('categories.create');
    }

    public function store()
    {
        $validator = new ValidationValidator();
        $validation = $validator->make($_POST, [
            'CategoryName' => 'required|max:50',
            'Description' => 'max:255'
        ]);
        $validation->validate();

        if ($validation->fails()) {
            $_SESSION['errors'] = $validation->errors()->firstOfAll();
            header('Location: ' . url('admin/categories/create'));
            exit;
        } else {
            $data = [
                'CategoryName' => $_POST['CategoryName'],
                'Description' => $_POST['Description']
            ];

            $this->category->insert($data);
            $_SESSION['status'] = true;
            $_SESSION['msg'] = 'Thao tác thành công!';
            header('Location: ' . url('admin/categories'));
            exit;
        }
    }

    public function show($id)
    {
        $category = $this->category->findByID($id);
        $this->renderViewAdmin('categories.show', ['category' => $category]);
    }

    public function edit($id)
    {
        $category = $this->category->findByID($id);
        $this->renderViewAdmin('categories.edit', ['category' => $category]);
    }

    public function update($id)
    {
        $validator = new ValidationValidator();
        $validation = $validator->make($_POST, [
            'CategoryName' => 'required|max:50',
            'Description' => 'max:255'
        ]);
        $validation->validate();

        if ($validation->fails()) {
            $_SESSION['errors'] = $validation->errors()->firstOfAll();
            header('Location: ' . url("admin/categories/{$id}/edit"));
            exit;
        } else {
            $data = [
                'CategoryName' => $_POST['CategoryName'],
                'Description' => $_POST['Description']
            ];

            $this->category->update($id, $data);
            $_SESSION['status'] = true;
            $_SESSION['msg'] = 'Thao tác thành công!';
            header('Location: ' . url('admin/categories'));
            exit;
        }
    }

    public function delete($id)
    {
        $this->category->delete($id);
        header('Location: ' . url('admin/categories'));
        exit();
    }
}
?>
