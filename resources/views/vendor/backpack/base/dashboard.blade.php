@extends(backpack_view('blank'))

@php
    $productsCount = \App\Models\Product::count();
    $ordersCount = \App\Models\Order::count();
    $clientsCount = \App\Models\Client::count();
    $commentsCount = \App\Models\Comment::count();
    $totalMoney = 0;
    $orders = \App\Models\Order::all();

    $carts = $orders->transform(function($cart, $key){
                return unserialize($cart->cart);
            });
    foreach ($carts as $value) {
        $totalMoney += $value->totalPrice;
        if($value->supplementsPrice != null){
            $totalMoney += $value->supplementsPrice;
        }
    }

    $clients = \App\Models\Client::all()->take(7);
    $clientsNames = array();
    $clientsOrdersNumber = array();
    foreach ($clients as $key => $client) {
        array_push($clientsNames, $client->lastName);
        array_push($clientsOrdersNumber, $client->orders->count());
    }
@endphp

@section('content')
<div class="card-group mb-4">
    <div class="card">
      <div class="card-body">
        <div class="h1 text-muted text-right mb-4"><i class="las la-shopping-cart"></i></div>
        <div class="text-value">{{ $productsCount }}</div><small class="text-muted text-uppercase font-weight-bold">Nombre des produits</small>
        <div class="progress progress-xs mt-3 mb-0">
          <div class="progress-bar bg-info" role="progressbar" style="width: {{ $productsCount }}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-body">
        <div class="h1 text-muted text-right mb-4"><i class="las la-chalkboard"></i></div>
        <div class="text-value">{{ $ordersCount }}</div><small class="text-muted text-uppercase font-weight-bold">Nombre de commandes</small>
        <div class="progress progress-xs mt-3 mb-0">
          <div class="progress-bar bg-success" role="progressbar" style="width: {{ $ordersCount }}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-body">
        <div class="h1 text-muted text-right mb-4"><i class="las la-money-check-alt"></i></div>
        <div class="text-value">{{ $totalMoney }} £</div><small class="text-muted text-uppercase font-weight-bold">Solde total</small>
        <div class="progress progress-xs mt-3 mb-0">
          <div class="progress-bar bg-warning" role="progressbar" style="width: {{ $totalMoney / 5 }}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-body">
        <div class="h1 text-muted text-right mb-4"><i class="las la-user-tie"></i></div>
        <div class="text-value">{{ $clientsCount }}</div><small class="text-muted text-uppercase font-weight-bold">Clients</small>
        <div class="progress progress-xs mt-3 mb-0">
          <div class="progress-bar" role="progressbar" style="width: {{$clientsCount}}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-body">
        <div class="h1 text-muted text-right mb-4"><i class="las la-comment-dots"></i></div>
        <div class="text-value">{{$commentsCount}}</div><small class="text-muted text-uppercase font-weight-bold">Nombre des commentaires</small>
        <div class="progress progress-xs mt-3 mb-0">
          <div class="progress-bar bg-danger" role="progressbar" style="width: {{$commentsCount}}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
      </div>
    </div>
  </div>
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">Nombre de commandes par client
            </div>
            <div class="card-body">
              <div class="chart-wrapper"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                <canvas id="myChart" width="480" height="240" class="chartjs-render-monitor" style="display: block;"></canvas>
              </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">Nombre de commentaires par client
            </div>
            <div class="card-body">
              <div class="chart-wrapper"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                <canvas id="myChart1" width="480" height="240" class="chartjs-render-monitor" style="display: block;"></canvas>
              </div>
            </div>
          </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" integrity="sha256-R4pqcOYV8lt7snxMQO/HSbVCFRPMdrhAFMH+vr9giYI=" crossorigin="anonymous"></script>
<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var ctx1 = document.getElementById('myChart1').getContext('2d');

    function barChart() {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            $data = JSON.parse(this.responseText);
            var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: $data[0].names,
                datasets: [{
                    label: '',
                    data: $data[0].ordersCount,
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
                    borderWidth: 1
                }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
            }
        };
        xmlhttp.open("GET","{{ route('dashboard.barChart') }}",true);
        xmlhttp.send();
    }
    function pieChart() {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            $data = JSON.parse(this.responseText);
            console.log($data);
            var myChart = new Chart(ctx1, {
            type: 'pie',
            data: {
                labels: $data[0].names,
                datasets: [{
                    label: '',
                    data: $data[0].commentsCount,
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
                    borderWidth: 1
                }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
            }
        };
        xmlhttp.open("GET","{{ route('dashboard.pieChart') }}",true);
        xmlhttp.send();
    }
    barChart();
    pieChart()
</script>
@endsection