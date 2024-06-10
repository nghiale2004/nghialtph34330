@extends('layouts.master')

@section('title')
Flight List
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-12">
        <div class="white_card card_height_100 mb_30">
            <div class="white_card_header">
                <div class="box_header m-0">
                    <div class="main-title">
                        <h1 class="m-0">Danh sách chuyến bay</h1>
                    </div>
                </div>
            </div>
            <div class="white_card_body">



                <div class="table-responsive mt-3">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Khởi Hành</th>
                                <th>Điểm đến</th>
                                <th>Ngày khởi Hành</th>
                                <th>Giờ khởi hành</th>
                                <th>Loại vé</th>
                                <th>Giá</th>
                                <th>Ảnh</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($flights as $flight)
                            <tr>
                                <td>{{ $flight['Origin'] }}</td>
                                <td>{{ $flight['Destination'] }}</td>
                                <td>{{ $flight['DepartureDate'] }}</td>
                                <td>{{ $flight['DepartureTime'] }}</td>

                                <td>{{ $flight['CategoryName'] }}</td> <!-- Display category name -->

                                <td>{{ number_format($flight['Price'], 0, ',', '.') }} VNĐ</td>
                                <td>
                                    <img src="{{ asset($flight['img']) }}" alt="" width="100px">
                                </td>
                                <td>
                                    <a href="flights/{{ $flight['id'] }}/edit" class="btn btn-warning">Sửa</a>
                                    <a href="flights/{{ $flight['id'] }}/delete" onclick="return confirm('Chắc chắn xóa không?')" class="btn btn-danger">Xóa</a>
                                    <a class="btn btn-info" href="{{ url('admin/flights/' . $flight['id'] . '/show') }}">Xem</a>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <nav aria-label="Page navigation">
                    <ul class="pagination">
                        @for ($i = 1; $i <= $totalPage; $i++) <li class="page-item"><a class="page-link" href="?page={{ $i }}">{{ $i }}</a></li>
                            @endfor
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
@endsection