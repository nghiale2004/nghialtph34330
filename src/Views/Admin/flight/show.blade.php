@extends('layouts.master')

@section('title')
    Chi tiết vé máy bay:  {{ $flight['Origin'] }} - {{ $flight['Destination'] }}
@endsection

@section('content')
    <h1>Chi tiết người dùng:  {{ $flight['Origin'] }} - {{ $flight['Destination'] }}</h1>
<br>
<br>
<br>
<br>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Trường</th>
                <th>Giá trị</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($flight as $field => $value)
                <tr>
                    <td>{{ $field }}</td>
                    <td>{{ $value }}</td>
                </tr>
            @endforeach

        </tbody>
    </table>
@endsection