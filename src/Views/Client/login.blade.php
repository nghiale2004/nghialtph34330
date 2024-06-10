<!DOCTYPE html>
<html lang="en" ng-app="myApp">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="libs/angular.min.js"></script>
    <script src="libs/app.js"></script>
</head>

<body ng-controller="myController">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Đăng nhập</h3>
                    </div>
                    @if (!empty($_SESSION['error']))
                    <div class="alert alert-warning">
                        {{ $_SESSION['error'] }}
                    </div>
                    @php
                    unset($_SESSION['error']);
                    @endphp
                    @endif
                    <div class="card-body">
                        <form action="{{ url('auth/handle-login') }}" method="POST">
                            <div class="mb-3 mt-3">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                            </div>
                            <div class="mb-3">
                                <label for="pwd">Password:</label>
                                <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password">
                            </div>
                            <button type="submit" class="btn btn-primary btn-block" ng-click="login()">Đăng nhập</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>