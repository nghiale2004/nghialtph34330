<!DOCTYPE html>
<html lang="en" ng-app="myApp">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Đặt vé du lịch</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <style>
    /* Add margin between flight cards */
    .flight-card {
      margin-bottom: 20px;
    }
  </style>
  <script src="libs/angular.min.js"></script>
  <script src="libs/app.js"></script>
</head>

<body ng-controller="myController">
  <div class="container-fluid">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container">
        <img src="img/black-logo.webp" alt="" class="mr-auto">
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item active">
              <a class="nav-link" href="{{url('')}}">Trang chủ</a>
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
              <source src="img/Mixivivuduthuyen.mp4" type="video/mp4">
            </video>
          </div>
        </div>
      </div>
    </header>
    <section class="rounded p-3">
      <div class="container">
      <div class="row section-header">
          <div class="col-md-6">
            <h2>Tận hưởng chuyến đi</h2>
          </div>
          <div class="col-md-6">
            <p>Tận hưởng sự xa hoa và đẳng cấp tối đa trên máy bay mới nhất và phổ biến nhất. Khám phá một hành trình
              tuyệt vời đưa bạn vào thế giới của sự sang trọng, tiện nghi và trải nghiệm không thể quên.</p>
          </div>
        </div>
        <div class="row d-flex flex-row align-items-stretch">
          @foreach($flights as $flight)
          <div class="col-md-4 flight-card"> <!-- Added flight-card class here -->
            <div class="product">
              <img src="{{ $flight['img'] }}" class="img-fluid img-max-height">
              <p>Từ: {{ $flight['Origin'] }}</p>
              <p>Đến: {{ $flight['Destination'] }}</p>
              <p>Khởi hành: {{ $flight['DepartureDate'] }}</p>
              <p>Giờ khởi hành: {{ $flight['DepartureTime'] }}</p>
              <div class="d-flex justify-content-between">
              <span class="bg-danger text-light rounded p-2">Giá: {{ number_format($flight['Price']) }} VNĐ/Người</span>

                <a class="btn btn-primary" href="{{ url('' . $flight['id'] . '/showFlightDetail') }}">Đặt Vé</a>
              </div>
            </div>
          </div>
          @endforeach
        </div>
        <nav aria-label="Page navigation">
          <ul class="pagination">
            @for ($i = 1; $i <= $totalPage; $i++)
            <li class="page-item {{ $i == $currentPage ? 'active' : '' }}">
              <a class="page-link" href="?page={{ $i }}">{{ $i }}</a>
            </li>
            @endfor
          </ul>
        </nav>
      </div>
    </section>
    <section class="featured-destinations">
      <div class="container">
        <div class="row section-header">
          <h2>Điểm đến nổi bật</h2>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="destination">
              <img src="img/phap.jpg" alt="Điểm đến 1">
              <h4>Paris, France</h4>
              <p>Khám phá vẻ đẹp lãng mạn của Paris với tháp Eiffel, Lầu Năm Góc và Louvre.</p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="destination">
              <img src="img/tokyo.webp" alt="Điểm đến 2">
              <h4>Tokyo, Japan</h4>
              <p>Trải nghiệm văn hóa độc đáo và công nghệ tiên tiến tại Tokyo, thành phố sôi động của Nhật Bản.</p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="destination">
              <img src="img/usa.jpg" alt="Điểm đến 3">
              <h4>New York City, USA</h4>
              <p>Khám phá cuộc sống đô thị sôi động và thị trấn nổi tiếng của New York.</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <footer>
      <p>&copy; 2024 Hệ thống đặt vé máy bay</p>
    </footer>
  </div>
</body>
</html>
