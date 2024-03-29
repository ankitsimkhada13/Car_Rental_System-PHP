<?php require_once __DIR__ . "/admin.php"; 

 
$rents = query("SELECT * FROM `booking` ");
$rent_dates=array();
$rentcounts=array();



$dates=query("SELECT MIN(from_date) as from_date,MAX(to_date) as to_date FROM `booking` ");

// print_r($dates);
for($from=strtotime($dates[0]['from_date']);$from<=strtotime($dates[0]['to_date']);$from=strtotime('+1 day',$from)){
    
    $d=date('Y-m-d',$from);

    $rent_date=query("SELECT COUNT(from_date) as counts FROM `booking` WHERE from_date<=$d OR to_date>=$d GROUP BY from_date");

 
    $rent_dates[]=$d;

    $rentcounts[]=pluck($rent_date,'counts')[0];
}
// print_r($rentcounts);

// print_r(json_encode($rentcounts));


?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CR Admin - Dashboard</title>

    <!-- Custom fonts for this template-->
     <!-- Include Chart.js library -->
     <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Custom fonts for this template-->
    <link rel="stylesheet" href="vendor/fontawesome/css/all.min.css">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body id="page-top" style="color: #303130;">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <?php require 'header.php'; ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">
            <h1 class="h3 ml-4 mb-4 text-gray-800 font-weight-bold">Admin Dashboard</h1>

            <div class="starts-card d-flex flex-wrap mx-4 gap-4 justify-content-center my-5">
                <!-- stats-card starts -->

                <div class="card col-md-3 border hover-shadow bg-white hover-shadow-soft mx-2" style="cursor: pointer;">
                    <div class="card-body">
                        <p class="card-title text-left font-weight-bold " style="font-size: 1.2rem;"><a class="text-decoration-none text-dark" href="users.php">Total Users</a></p>
                        <p class="card-text h1 font-weight-bold text-left">
                            <?php $result = query('SELECT COUNT(id) AS total FROM `users`');
                            // echo "<pre>";
                            // print_r($result);
                            echo $result[0]['total'];
                            ?>
                        </p>
                    </div>
                </div>

                <div class="card col-md-3 border hover-shadow bg-white hover-shadow-soft mx-2" style="cursor: pointer;">
                    <div class="card-body">
                        <p class="card-title text-left font-weight-bold " style="font-size: 1.2rem;"><a class="text-decoration-none text-dark" href="brands/">Total Brands</a></p>
                        <p class="card-text h1 font-weight-bold text-left">
                            <?php $result = query('SELECT COUNT(id) AS total FROM `categories`');
                            // echo "<pre>";
                            // print_r($result);
                            echo $result[0]['total'];
                            ?>
                        </p>
                    </div>
                </div>

                
                <div class="card col-md-3 border hover-shadow bg-white hover-shadow-soft mx-2" style="cursor: pointer;">
                    <div class="card-body">
                        <p class="card-title text-left font-weight-bold " style="font-size: 1.2rem;"><a class="text-decoration-none text-dark" href="brands/">Total Owner Brand</a></p>
                        <p class="card-text h1 font-weight-bold text-left">
                            <?php $result = query('SELECT COUNT(id) AS total FROM `owner_brand`');
                            // echo "<pre>";
                            // print_r($result);
                            echo $result[0]['total'];
                            ?>
                        </p>
                    </div>
                </div>
              
                <div class="card col-md-3 border hover-shadow bg-white hover-shadow-soft mx-2 my-4" style="cursor: pointer;">
                    <div class="card-body">
                        <p class="card-title text-left  font-weight-bold " style="font-size: 1.2rem;"><a class="text-decoration-none text-dark" href="vehicles/">Total Vehicle</a></p>
                        <p class="card-text h1 font-weight-bold text-left">
                            <?php $result = query('SELECT COUNT(id) AS total FROM `vehicles`');
                            // echo "<pre>";
                            // print_r($result);
                            echo $result[0]['total'];
                            ?>
                        </p>
                    </div>
                </div>

                <div class="card col-md-3 border hover-shadow bg-white hover-shadow-soft mx-2 my-4" style="cursor: pointer;">
                    <div class="card-body">
                        <p class="card-title text-left  font-weight-bold " style="font-size: 1.2rem;"><a class="text-decoration-none text-dark" href="vehicles/">Total Owner Vehicle</a></p>
                        <p class="card-text h1 font-weight-bold text-left">
                            <?php $result = query('SELECT COUNT(id) AS total FROM `owner_vehicle`');
                            // echo "<pre>";
                            // print_r($result);
                            echo $result[0]['total'];
                            ?>
                        </p>
                    </div>
                </div>


                
                <div class="card col-md-3 border hover-shadow bg-white hover-shadow-soft mx-2 my-4" style="cursor: pointer;">
                    <div class="card-body">
                        <p class="card-title text-left  font-weight-bold " style="font-size: 1.2rem;"><a class="text-decoration-none text-dark" href="booking/">Approved Booking</a></p>
                        <p class="card-text h1 font-weight-bold text-left">
                            <?php $result = query('SELECT COUNT(id) AS total FROM `booking` WHERE (status = "booked")');
                            // echo "<pre>";
                            // print_r($result);
                            echo $result[0]['total'];
                            ?>
                        </p>
                    </div>
                </div>

                <div class="card col-md-3 border hover-shadow bg-white hover-shadow-soft mx-2 my-4" style="cursor: pointer;">
                    <div class="card-body">
                        <p class="card-title text-left  font-weight-bold " style="font-size: 1.2rem;"><a class="text-decoration-none text-dark" href="booking/">Pending Booking</a></p>
                        <p class="card-text h1 font-weight-bold text-left">
                            <?php $result = query('SELECT COUNT(id) AS total FROM `booking` WHERE (status = "pending")');
                            // echo "<pre>";
                            // print_r($result);
                            echo $result[0]['total'];
                            ?>
                        </p>
                    </div>
                </div>
                <!-- stats-card ends -->
            </div>
        </div>
        <!-- /.container-fluid -->
        <div class="card  m-4 border hover-shadow bg-white ">
            <h2 class="m-3">Booking Car Analysis</h2>
                <canvas id="lineChart"></canvas>
        </div>
    </div>
    <!-- End of Main Content -->
       <script>

// Sample data for the line chart
const data = {
    labels: <?php echo json_encode($rent_dates); ?>,
    datasets: [{
        label: 'Booking Counts',
        data: <?php echo json_encode($rentcounts); ?>,
        borderColor: 'black',
        backgroundColor: 'rgba(0, 0, 255, 0.2)',
        borderWidth: 2,
        pointRadius: 5,
        pointBackgroundColor: 'black'
    }]
};

// Chart configuration
const config = {
    type: 'line',
    data: data,
    options: {
        responsive: true,
        plugins: {
            legend: {
                display: true,
                position: 'top'
            }
        },
        scales: {
            x: {
                beginAtZero: true
            },
            y: {
                beginAtZero: true
            }
        }
    }
};

// Create a new line chart instance
var lineChart = new Chart(document.getElementById('lineChart'), config);


    </script>

    <?php require 'footer.php'; ?>