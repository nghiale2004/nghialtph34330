@extends('layouts.master')

@section('title')
Show Category
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="white_card card_height_100 mb_30">
            <div class="white_card_header">
                <div class="box_header m-0">
                    <div class="main-title">
                        <h1 class="m-0">Chi tiết danh mục</h1>
                    </div>
                </div>
            </div>
            <div class="white_card_body">
                <div class="form-group">
                    <label for="CategoryID">ID</label>
                    <input type="text" class="form-control" id="CategoryID" value="{{ $category['id'] }}" readonly>
                </div>
                <div class="form-group">
                    <label for="CategoryName">Tên danh mục</label>
                    <input type="text" class="form-control" id="CategoryName" value="{{ $category['CategoryName'] }}" readonly>
                </div>
                <div class="form-group">
                    <label for="Description">Mô tả</label>
                    <textarea class="form-control" id="Description" rows="3" readonly>{{ $category['Description'] }}</textarea>
                </div>
              
            </div>
        </div>
    </div>
</div>
@endsection
