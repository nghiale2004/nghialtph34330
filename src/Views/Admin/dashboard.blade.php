@extends('layouts.master')

@section('title')
    Dashboard
@endsection

@section('content')
    <!-- Your content here -->

    <!-- Flight Count Chart -->
    <div id="flightChart" style="width: 100%; height: 300px;"></div>

    <!-- User Count Chart -->
    <div id="userChart" style="width: 100%; height: 300px;"></div>
@endsection

@section('script')
    <script src="https://www.gstatic.com/charts/loader.js"></script>

    <script>
        google.charts.load('current', { packages: ['corechart'] });
        google.charts.setOnLoadCallback(drawCharts);

        function drawCharts() {
            // Retrieve total flight count from PHP variable
            var totalFlightCount = <?php echo json_encode($totalFlightCount); ?>;
            // Create flight count data table
            var flightData = new google.visualization.DataTable();
            flightData.addColumn('string', 'Date');
            flightData.addColumn('number', 'Số Lượng Chuyến Bay');
            flightData.addRows([
                ['', totalFlightCount]
            ]);
            // Set flight count chart options
            var flightOptions = {
                title: 'Tổng Số Chuyến Bay'
            };
            // Draw flight count chart
            var flightChart = new google.visualization.ColumnChart(document.getElementById('flightChart'));
            flightChart.draw(flightData, flightOptions);

            // Retrieve user count by registration date from PHP variable
            var userCountBycreated_at = <?php echo json_encode($userCountBycreated_at); ?>;
            // Create user count data table
            var userData = new google.visualization.DataTable();
            userData.addColumn('string', 'Registration Date');
            userData.addColumn('number', 'Tài Khoản Người Dùng');
            userData.addRows(Object.entries(userCountBycreated_at));
            // Set user count chart options
            var userOptions = {
                title: 'Số lượng tài khoản theo ngày đăng ký'
            };
            // Draw user count chart
            var userChart = new google.visualization.ColumnChart(document.getElementById('userChart'));
            userChart.draw(userData, userOptions);
        }
    </script>
@endsection
