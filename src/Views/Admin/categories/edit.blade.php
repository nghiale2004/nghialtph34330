@extends('layouts.master')

@section('title')
Edit Category
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="white_card card_height_100 mb_30">
            <div class="white_card_header">
                <div class="box_header m-0">
                    <div class="main-title">
                        <h1 class="m-0">Chỉnh sửa danh mục</h1>
                    </div>
                </div>
            </div>
            <div class="white_card_body">
                <form action="{{ url('admin/categories/' . $category['id'] . '/update') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="CategoryName">Tên danh mục</label>
                        <input type="text" class="form-control" id="CategoryName" name="CategoryName" value="{{ $category['CategoryName'] }}" required>
                    </div>
                    <div class="form-group">
                        <label for="Description">Mô tả</label>
                        <textarea class="form-control" id="Description" name="Description" rows="3" required>{{ $category['Description'] }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Lưu</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
