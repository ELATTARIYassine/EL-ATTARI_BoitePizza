@extends(backpack_view('blank'))

@php
    // $widgets['before_content'][] = [
    //     'type'        => 'jumbotron',
    //     'heading'     => trans('backpack::base.welcome'),
    //     'content'     => trans('backpack::base.use_sidebar'),
    //     'button_link' => backpack_url('logout'),
    //     'button_text' => trans('backpack::base.logout'),
    // ];
    // $widgets['before_content'][] = [
    //     'type'          => 'progress_white',
    //     'class'         => 'card mb-2',
    //     'value'         => '11.456',
    //     'description'   => 'Registered users.',
    //     'progress'      => 57, // integer
    //     'progressClass' => 'progress-bar bg-primary',
    //     'hint'          => '8544 more until next milestone.',
    // ];
    // $widgets['before_content'][] = [
    //     'type'          => 'progress_white',
    //     'class'         => 'card mb-2',
    //     'value'         => '11.456',
    //     'description'   => 'Registered users.',
    //     'progress'      => 57, // integer
    //     'progressClass' => 'progress-bar bg-primary',
    //     'hint'          => '8544 more until next milestone.',
    // ];
    // $widgets['before_content'][] = [
    //     'type'          => 'progress_white',
    //     'class'         => 'card mb-2',
    //     'value'         => '11.456',
    //     'description'   => 'Registered users.',
    //     'progress'      => 57, // integer
    //     'progressClass' => 'progress-bar bg-primary',
    //     'hint'          => '8544 more until next milestone.',
    // ];

    $productsCount = \App\Models\Product::count();
    $ordersCount = \App\Models\Order::count();
    $clientsCount = \App\Models\Client::count();
    $commentsCount = \App\Models\Comment::count();
    $totalMoney = 0;
    $orders = \App\Models\Order::all();
    // foreach ($orders as $key => $value) {
    //     $cart = unserialize($value);
    //     dd($cart);
    // }
    $carts = $orders->transform(function($cart, $key){
                return unserialize($cart->cart);
            });
    // dd($carts);
    foreach ($carts as $value) {
        $totalMoney += $value->totalPrice;
        if($value->supplementsPrice != null){
            $totalMoney += $value->supplementsPrice;
        }
    }
    // dd($totalMoney);

@endphp

@section('content')
{{-- {{ dd($data) }} --}}
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
  {{-- width: 400px; height:400px; --}}
{{-- <div class="row">
    <div class="col-md-10 offset-md-1">
        <canvas id="myChart" width="400" height="400"></canvas>
    </div>
</div> --}}
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">Bar Chart
              <div class="card-header-actions"><a class="card-header-action" href="http://www.chartjs.org" target="_blank"><small class="text-muted">docs</small></a></div>
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
            <div class="card-header">Pie Chart
              <div class="card-header-actions"><a class="card-header-action" href="http://www.chartjs.org" target="_blank"><small class="text-muted">docs</small></a></div>
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
var myChart1 = new Chart(ctx1, {
    type: 'pie',
    data: {
        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
        datasets: [{
            label: '# of Votes',
            data: [12, 19, 3, 5, 2, 3],
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
</script>
@endsection