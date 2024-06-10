@extends('layouts.master')

@section('title')
Category List
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-12">
        <div class="white_card card_height_100 mb_30">
            <div class="white_card_header">
                <div class="box_header m-0">
                    <div class="main-title">
                        <h1 class="m-0">Danh sách danh mục</h1>
                     
                    </div>
                </div>
            </div>
            <div class="white_card_body">
                <div class="table-responsive mt-3">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên danh mục</th>
                                <th>Mô tả</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
                            <tr>
                                <td>{{ $category['id'] }}</td>
                                <td>{{ $category['CategoryName'] }}</td>
                                <td>{{ $category['Description'] }}</td>
                                <td>
                                    <a href="categories/{{ $category['id'] }}/edit" class="btn btn-warning">Sửa</a>
                                    <a href="categories/{{ $category['id'] }}/delete" onclick="return confirm('Chắc chắn xóa không?')" class="btn btn-danger">Xóa</a>
                                    <a class="btn btn-info" href="{{ url('admin/categories/' . $category['id'] . '/show') }}">Xem</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <nav aria-label="Page navigation">
                    <ul class="pagination">
                        @for ($i = 1; $i <= $totalPage; $i++)
                            <li class="page-item"><a class="page-link" href="?page={{ $i }}">{{ $i }}</a></li>
                        @endfor
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
@endsection
