<!DOCTYPE html>
<html lang="en" ng-app="myApp">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Chi tiết chuyến bay</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body ng-controller="myController">
  <div class="container-fluid">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container">
        <img src="{{ asset('img/black-logo.webp') }}" alt="" class="mr-auto">
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item active">
              <a class="nav-link" href="{{ url('/') }}">Trang chủ</a>
            </li>
            @if (!is_logged())
            <a class="nav-link" href="{{ url('auth/login') }}">Login</a>
            @endif
            @if (is_logged())
            <a class="nav-link" href="{{ url('auth/logout') }}">Logout</a>
            @endif
          </ul>
        </div>
      </div>
    </nav>
    <header>
      <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <video class="d-block w-100 vh-100" autoplay loop muted>
              <source src="{{ asset('img/Mixivivuduthuyen.mp4') }}" type="video/mp4">
            </video>
          </div>
        </div>
      </div>
    </header>
    <section class="rounded p-3">
      <div class="container">
        <div class="row section-header">
          <div class="col-md-12">
            <h2>Chi tiết chuyến bay</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="flight-details">
              <p><strong>Origin:</strong> {{ $flight['Origin'] }}</p>
              <p><strong>Destination:</strong> {{ $flight['Destination'] }}</p>
              <p><strong>Departure Date:</strong> {{ $flight['DepartureDate'] }}</p>
              <p><strong>Departure Time:</strong> {{ $flight['DepartureTime'] }}</p>
              <p><strong>Loại vé:</strong> {{ $flight['CategoryName'] }}</p>
              <p><strong>Price:</strong> {{ number_format($flight['Price']) }} VND/Người</p>
            </div>
          </div>
          <div class="col-md-6">
            <img src="{{ asset($flight['img']) }}" class="img-fluid" alt="Flight Image">
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <p><strong>Mô tả chuyến bay:</strong> {{ $flight['description'] }}</p>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <a href="#" class="btn btn-primary">Đặt vé</a>
          </div>
        </div>
      </div>
    </section>
  </div>
</body>

</html>
