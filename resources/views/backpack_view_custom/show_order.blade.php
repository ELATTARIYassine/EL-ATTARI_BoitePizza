<!DOCTYPE html>

<html lang="fr" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="robots" content="noindex, nofollow">
    <meta name="csrf-token" content="OTHR571Z4QcfHmcJUqhSLtGgk9dWf2jzeOZD11Sg" />
    <title>Aperçu commande :: Backpack Admin Panel</title>


    <link rel="stylesheet" type="text/css"
        href="http://localhost:8000/packages/backpack/base/css/bundle.css?v=4.0.61@1977e0cc52fa7cf9547eaeadf03f5cd88402b574">
    <link rel="stylesheet" type="text/css"
        href="http://localhost:8000/packages/source-sans-pro/source-sans-pro.css?v=4.0.61@1977e0cc52fa7cf9547eaeadf03f5cd88402b574">
    <link rel="stylesheet" type="text/css"
        href="http://localhost:8000/packages/line-awesome/css/line-awesome.min.css?v=4.0.61@1977e0cc52fa7cf9547eaeadf03f5cd88402b574">


    <link rel="stylesheet" href="http://localhost:8000/packages/backpack/crud/css/crud.css">
    <link rel="stylesheet" href="http://localhost:8000/packages/backpack/crud/css/show.css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <style>
      .badgePadding {
          padding: 5px;
      }

      .section-gap {
          padding: 90px 0 !important;
      }

      .ordersTable {
          background-color: steelblue;
      }

      .rowSpan {
          vertical-align: inherit !important;
      }
      tr, th, td {
        border: 1px solid black !important;
      }
    </style>
</head>

<body class="app aside-menu-fixed sidebar-lg-show">

    <header class="app-header navbar navbar-color bg-primary border-0">
        <!-- Logo -->
        <button class="navbar-toggler sidebar-toggler d-lg-none mr-auto ml-3" type="button" data-toggle="sidebar-show">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="http://localhost:8000">
            <b>EL_ATTARI</b>
        </a>
        <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button" data-toggle="sidebar-lg-show">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- =================================================== -->
        <!-- ========== Top menu items (ordered left) ========== -->
        <!-- =================================================== -->
        <ul class="nav navbar-nav d-md-down-none">

            <!-- Topbar. Contains the left part -->
            <!-- This file is used to store topbar (left) items -->



        </ul>
        <!-- ========== End of top menu left items ========== -->



        <!-- ========================================================= -->
        <!-- ========= Top menu right items (ordered right) ========== -->
        <!-- ========================================================= -->
        <ul class="nav navbar-nav ml-auto ">
            <!-- Topbar. Contains the right part -->
            <!-- This file is used to store topbar (right) items -->



            <li class="nav-item dropdown pr-4">
                <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
                    aria-expanded="false">
                    <img class="img-avatar"
                        src="https://www.gravatar.com/avatar/12f9c4a20061abf12b30d8ce9002962e.jpg?s=80&amp;d=https%3A%2F%2Fplacehold.it%2F160x160%2F00a65a%2Fffffff%2F%26text%3DE&amp;r=g"
                        alt="EL ATTARI">
                </a>
                <div class="dropdown-menu dropdown-menu-right mr-4 pb-1 pt-1">
                    <a class="dropdown-item" href="http://localhost:8000/admin/edit-account-info"><i
                            class="fa fa-user"></i> Mon compte</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="http://localhost:8000/admin/logout"><i class="fa fa-lock"></i>
                        Déconnexion</a>
                </div>
            </li>
        </ul>
        <!-- ========== End of top menu right items ========== -->
    </header>

    <div class="app-body">

        <!-- Left side column. contains the sidebar -->
        <div class="sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <nav class="sidebar-nav overflow-hidden">
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="nav">
                    <!-- <li class="nav-title">ADMINISTRATION</li> -->
                    <!-- ================================================ -->
                    <!-- ==== Recommended place for admin menu items ==== -->
                    <!-- ================================================ -->

                    <!-- This file is used to store sidebar items, starting with Backpack\Base 0.9.0 -->
                    <li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="fa fa-dashboard nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>
                    <li class='nav-item'><a class='nav-link' href='{{ backpack_url('category') }}'><i class='nav-icon fa fa-cog'></i> Categories</a></li>
                    <li class='nav-item'><a class='nav-link' href='{{ backpack_url('product') }}'><i class='nav-icon fa fa-archive'></i> Produits</a></li>
                    <li class='nav-item'><a class='nav-link' href='{{ backpack_url('client') }}'><i class='nav-icon fa fa-users'></i> Clients</a></li>
                    <li class='nav-item'><a class='nav-link' href='{{ backpack_url('formula') }}'><i class="nav-icon las la-window-restore"></i> Formules</a></li>
                    <li class='nav-item'><a class='nav-link' href='{{ backpack_url('comment') }}'><i class="nav-icon las la-comment-dots"></i> Commentaires</a></li>
                    <li class='nav-item'><a class='nav-link' href='{{ backpack_url('elementsbase') }}'><i class='nav-icon lab la-wpforms'></i> éléments de base</a></li>
                    <li class='nav-item'><a class='nav-link' href='{{ backpack_url('supplement') }}'><i class='nav-icon las la-plus'></i> Supplements</a></li>
                    <li class='nav-item'><a class='nav-link' href='{{ backpack_url('order') }}'><i class='nav-icon las la-cart-plus'></i> Commandes</a></li>
                    <li class='nav-item'><a class='nav-link' href='{{ backpack_url('sector') }}'><i class='nav-icon las la-map-marked-alt'></i> Secteurs</a></li>
                    <li class='nav-item'><a class='nav-link' href='{{ backpack_url('area') }}'><i class='nav-icon las la-map-marker'></i> Région</a></li>
                    <!-- ======================================= -->
                    <!-- <li class="divider"></li> -->
                    <!-- <li class="nav-title">Entries</li> -->
                </ul>
            </nav>
            <!-- /.sidebar -->
        </div>



        <main class="main pt-2">

            <nav aria-label="breadcrumb" class="d-none d-lg-block">
                <ol class="breadcrumb bg-transparent p-0 justify-content-end">
                    <li class="breadcrumb-item text-capitalize"><a
                            href="http://localhost:8000/admin/dashboard">Administration</a></li>
                    <li class="breadcrumb-item text-capitalize"><a
                            href="http://localhost:8000/admin/order">commandes</a></li>
                    <li class="breadcrumb-item text-capitalize active" aria-current="page">Aperçu</li>
                </ol>
            </nav>

            <section class="container-fluid d-print-none">
                <a href="javascript: window.print();" class="btn float-right"><i class="fa fa-print"></i></a>
                <h2>
                    <span class="text-capitalize">commandes</span>
                    <small>Aperçu commande.</small>
                    <small class=""><a href="http://localhost:8000/admin/order" class="font-sm"><i
                                class="fa fa-angle-double-left"></i> Retour à la liste <span>commandes</span></a></small>
                </h2>
            </section>

            <div class="container-fluid animated fadeIn" style="margin-top: 50px">
              
              <div class="row">
                <div class="col-md-8 offset-md-1">
                  <table class="table table-bordered table-dark mt-2 mb-2 ordersTable">
                    <thead>
                        <tr>
                            <th scope="col">Nom du produit</th>
                            <th scope="col">Prix</th>
                            <th scope="col">Quantité</th>
                            <th scope="col">Adresse de livraison</th>
                            <th scope="col">Date d'achat</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($order['cart']->items as $item)
                    <tr>
                        <td>{{$item['item']['name'] }}</td>
                        <td>£{{$item['price'] }}</td>
                        <td>{{$item['qty'] }}</td>
                        @if ($loop->first)
                        <td rowspan="{{ count($order['cart']->items) }}" class="rowSpan">{{ $order['shipping_address'] }}</td>
                        @endif
                        @if ($loop->first)
                        <td rowspan="{{ count($order['cart']->items) }}" class="rowSpan">{{ $order['cart']->purchaseDate->diffForHumans() }}</td>
                        @endif
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                    @if (!is_numeric($order['cart']->sector) and isset($order['cart']->sector))
                    <p class="badge badge-pill badge-info mb-3 p-3 text-white">Total Price : ${{$order['cart']->totalPrice + $order['cart']->supplementsPrice }} | secteur : {{ $order['cart']->sector->name }} ({{ $order['cart']->sector->price ?? 'default' }}£)</p>
                    @else
                    <p class="badge badge-pill badge-info mb-3 p-3 text-white">Total Price : ${{$order['cart']->totalPrice + $order['cart']->supplementsPrice}} | secteur : {{ $order['cart']->sector->price ?? 'default' }}</p>
                    @endif
                </div>
                <div class="col-md-2">
                    <ul class="list-group">
                        @if ($order['cart']->supplementsNames != null)
                        @foreach ($order['cart']->supplementsNames as $supplement)
                        <li class="list-group-item">{{$supplement}}</li>
                        @endforeach
                        <li class="list-group-item active text-center" style="font-size: 1rem">
                            {{$order['cart']->supplementsPrice}}£
                        </li>
                        @endif
                    </ul>
                </div>
            </div>
            </div>

        </main>

    </div><!-- ./app-body -->

    <script type="text/javascript">
        /* Recover sidebar state */
        if (Boolean(sessionStorage.getItem('sidebar-collapsed'))) {
            var body = document.getElementsByTagName('body')[0];
            body.className = body.className.replace('sidebar-lg-show', '');
        }

        /* Store sidebar state */
        var navbarToggler = document.getElementsByClassName("navbar-toggler");
        for (var i = 0; i < navbarToggler.length; i++) {
            navbarToggler[i].addEventListener('click', function (event) {
                event.preventDefault();
                if (Boolean(sessionStorage.getItem('sidebar-collapsed'))) {
                    sessionStorage.setItem('sidebar-collapsed', '');
                } else {
                    sessionStorage.setItem('sidebar-collapsed', '1');
                }
            });
        }

    </script>

    <script type="text/javascript"
        src="http://localhost:8000/packages/backpack/base/js/bundle.js?v=4.0.61@1977e0cc52fa7cf9547eaeadf03f5cd88402b574">
    </script>



    <!-- page script -->
    <script type="text/javascript">
        window.onload = function(){
          var element = document.getElementById("formuleClass");
          element.classList.remove("active");  
          var el = document.getElementById("addclass");
          el.classList.add("active");
        }
    </script>
</body>

</html>
