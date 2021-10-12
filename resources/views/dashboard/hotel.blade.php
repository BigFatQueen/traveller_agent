@extends('backendTemplate')
@section('main-content')
{{-- header start --}}
<div class="header bg-gradient-primary pb-7 pt-4 pt-md-7">
  <div class="container-fluid">
    <div class="my-ct-page-title text-white">
      <div class="row">
        <div class="col-xl-4 col-lg-3">
          <div class="card card-stats mb-4 mb-xl-0">
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <h5 class="card-title text-uppercase text-muted mb-0">ToTal Rooms</h5>
                  <span class="h2 font-weight-bold mb-0">{{$report->total_rooms}}</span>
                </div>
                <div class="col-auto">
                  <div class="icon icon-shape bg-danger  text-white rounded-circle shadow">
                    <i class="fas fa-chart-bar"></i>
                  </div>
                </div>
              </div>
              <p class="mt-3 mb-0 text-muted text-sm d-none">
                <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                <span class="text-nowrap">Since last month</span>
              </p>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-lg-3">
          <div class="card card-stats mb-4 mb-xl-0">
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <h5 class="card-title text-uppercase text-muted mb-0">Today Booking</h5>
                  <span class="h2 font-weight-bold mb-0">{{$report->today_unconfirmed_booking}}</span>
                </div>
                <div class="col-auto">
                  <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                    <i class="fas fa-chart-pie"></i>
                  </div>
                </div>
              </div>
              <p class="mt-3 mb-0 text-muted text-sm d-none">
                <span class="text-danger mr-2"><i class="fas fa-arrow-down"></i> 3.48%</span>
                <span class="text-nowrap">Since last week</span>
              </p>
            </div>
          </div>
        </div>

        <div class="col-xl-4 col-lg-3">
          <div class="card card-stats mb-4 mb-xl-0">
            <div class="card-body">
              <div class="row">
                <div class="col ">
                  <h5 class="card-title text-uppercase text-muted mb-0"> Booking</h5>
                  <span class="h2 font-weight-bold mb-0">{{$report->booking_count}}</span>
                </div>
                <div class="col-auto">
                  <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                    <i class="fas fa-chart-pie"></i>
                  </div>
                </div>
              </div>
              <p class="mt-3 mb-0 text-muted text-sm d-none">
                <span class="text-danger mr-2"><i class="fas fa-arrow-down"></i> 3.48%</span>
                <span class="text-nowrap">Since last week</span>
              </p>
            </div>
          </div>
        </div>
        
      </div>
      
    </div>
    
  </div>
</div>

 <div class="container-fluid mt--7">
  <div class="row">
    <div class="col-xl-8 mb-5 mb-xl-0">
      <div class="card bg-gradient-default shadow">
        <div class="card-header bg-transparent">
          <div class="row align-items-center">
            <div class="col">
              <h6 class="text-uppercase text-light ls-1 mb-1">Overview</h6>
              <h2 class="text-white mb-0">Income value</h2>
            </div>
            <div class="col">
              <ul class="nav nav-pills justify-content-end d-none">
                <li class="nav-item mr-2 mr-md-0" data-toggle="chart" data-target="#chart-sales" data-update='{"data":{"datasets":[{"data":[0, 20, 50, 30, 15, 40, 20, 40, 40]}]}}' data-prefix="$" data-suffix="k">
                  <a href="#" class="nav-link py-2 px-3 active" data-toggle="tab">
                    <span class="d-none d-md-block">Month</span>
                    <span class="d-md-none">M</span>
                  </a>
                </li>
                <li class="nav-item" data-toggle="chart" data-target="#chart-sales" data-update='{"data":{"datasets":[{"data":[0, 20, 5, 25, 10, 30, 15, 40, 40]}]}}' data-prefix="$" data-suffix="k">
                  <a href="#" class="nav-link py-2 px-3" data-toggle="tab">
                    <span class="d-none d-md-block">Week</span>
                    <span class="d-md-none">W</span>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="card-body">
          <!-- Chart -->
          <div class="chart">
            <!-- Chart wrapper -->
            <canvas id="report-chart" ></canvas>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-4">
      <div class="card shadow bg-dark">
        <div class="card-header bg-transparent">
          
        </div>
        <div class="card-body">
          <!-- Chart -->
          <div class="chart">
            <canvas id="report-pie-chart" class="chart-canvas"></canvas>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Footer -->
  <footer class="footer">
    <div class="row align-items-center justify-content-xl-between">
      <div class="col-xl-6">
        <div class="copyright text-center text-xl-left text-muted">
          &copy; 2018 <a href="https://www.creative-tim.com" class="font-weight-bold ml-1" target="_blank">Creative Tim</a>
        </div>
      </div>
      <div class="col-xl-6">
        <ul class="nav nav-footer justify-content-center justify-content-xl-end">
          <li class="nav-item">
            <a href="https://www.creative-tim.com" class="nav-link" target="_blank">Creative Tim</a>
          </li>
          <li class="nav-item">
            <a href="https://www.creative-tim.com/presentation" class="nav-link" target="_blank">About Us</a>
          </li>
          <li class="nav-item">
            <a href="http://blog.creative-tim.com" class="nav-link" target="_blank">Blog</a>
          </li>
          <li class="nav-item">
            <a href="https://github.com/creativetimofficial/argon-dashboard/blob/master/LICENSE.md" class="nav-link" target="_blank">MIT License</a>
          </li>
        </ul>
      </div>
    </div>
  </footer>
</div>
@endsection
@section('script')
@if (Session::get('success'))
<script>
Swal.fire(
  'Data is added','Plesae add pickup location of new Car','success'
)
</script>
             
@endif
<script>


 var optionsforreport={
  responsive: true,
          layout: {
            padding: {
                left: 50,
                right: 0,
                top: 0,
                bottom: 0
            }
        },
        scales: {
          
        yAxes: [{
          scaleLabel: {
                  display: true,
                  labelString: 'Incomes'
                },
          ticks: {
           
            
            
                       beginAtZero: true,
            stepSize: 5000,
                       
            
              // Return an empty string to draw the tick line but hide the tick label
              // Return `null` or `undefined` to hide the tick line entirely
             	userCallback: function(value, index, values) {
                // Convert the number to a string and splite the string every 3 charaters from the end

                
                return '$' + value;
            	}
          }
        }]
      },
         legend: {
            display: false,
            labels: {
                fontColor: 'rgb(255, 99, 132)'
            }
        },
        title: {
            display: true,
            text: 'Your income for past 6 Months Chart'
        }
    };

var optionforrating={
  responsive: true,
          layout: {
            padding: {
                left: 10,
                right: 0,
                top: 0,
                bottom: 0
            }
        },
        scales: {
          
        yAxes: [{
          scaleLabel: {
                  display: true,
                  labelString: 'Rating'
                },
          ticks: {
           
            beginAtZero: true,
            
                      steps: 5,
                      stepValue: 5,
                      max: 1000,
                       
            
              // Return an empty string to draw the tick line but hide the tick label
              // Return `null` or `undefined` to hide the tick line entirely
              userCallback: function(value, index, values) {
                // Convert the number to a string and splite the string every 3 charaters from the end
                
                return   value;
               }
          }
        }]
      },
         legend: {
            display: false,
            labels: {
                fontColor: 'rgb(255, 99, 132)'
            }
        },
        title: {
            display: true,
            text: 'Your Rating for past 6 Months Chart'
        }
    };
 var ctx = document.getElementById('report-chart');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
        datasets: [{
            label: '# of Votes',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 26, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 232, 1)',
                'rgba(54, 120, 335, 1)',
                'rgba(255, 26, 86, 1)',
                'rgba(23, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
     options: optionsforreport
    
    
});

//ajax stating


var ctx2 = document.getElementById('report-pie-chart');
var myChart2 = new Chart(ctx2, {
    type: 'bar',
    data:  {
      labels: [
        'Red',
        'Blue',
        'Yellow'
      ],
      datasets: [{
        label: 'My First Dataset',
        data: [300, 50, 100],
       backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1,
        hoverOffset: 4
      }]
    },
    options: optionforrating
});

$.ajax({
    type: 'get', //post method
    url: "{{route('getreport.hotel')}}", //ajaxformexample url
    success: function (result)
    {
      console.log(result);
      let report=result.report;
      myChart.data.labels=report.labels;
      myChart.data.datasets[0].data=report.data ;
      myChart.options.scales.yAxes[0].ticks.max=Math.max.apply(Math, report.data) ;
      
      myChart.update();

      let rating=result.rating;
      myChart2.data.labels=rating.labels;
      myChart2.data.datasets[0].data=rating.data ;
      myChart2.options.scales.yAxes[0].ticks.max=Math.max.apply(Math, rating.data) ;
      myChart2.update();
    }
});
</script>
@endsection