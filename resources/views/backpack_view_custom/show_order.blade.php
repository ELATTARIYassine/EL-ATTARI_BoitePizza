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
                    <li class="nav-item"><a class="nav-link" href="http://localhost:8000/admin/dashboard"><i
                                class="fa fa-dashboard nav-icon"></i> Tableau de bord</a></li>
                    <li class='nav-item'><a class='nav-link' href='http://localhost:8000/admin/category'><i
                                class='nav-icon fa fa-cog'></i> Categories</a></li>
                    <li class='nav-item'><a class='nav-link' href='http://localhost:8000/admin/product'><i
                                class='nav-icon fa fa-archive'></i> Produits</a></li>
                    <li class='nav-item'><a class='nav-link' href='http://localhost:8000/admin/client'><i
                                class='nav-icon fa fa-users'></i> Clients</a></li>
                    <li class='nav-item'><a class='nav-link' id="formuleClass" href='http://localhost:8000/admin/formula'><i
                                class="nav-icon fa fa-book"></i> Formules</a></li>
                    <li class='nav-item'><a class='nav-link' href='http://localhost:8000/admin/comment'><i
                                class="nav-icon fa fa-book"></i> Commentaires</a></li>

                    <li class='nav-item'><a class='nav-link' href='http://localhost:8000/admin/elementsbase'><i
                                class='nav-icon fa fa-question'></i> éléments de base</a></li>

                    <li class='nav-item'><a class='nav-link' href='http://localhost:8000/admin/supplement'><i
                                class='nav-icon fa fa-question'></i> Supplements</a></li>
                    <li class='nav-item'><a class='nav-link' id="addclass" href='http://localhost:8000/admin/order'><i
                                class='nav-icon fa fa-question'></i> Orders</a></li>
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
                <div class="col-md-6 offset-md-2">
                  <table class="table table-bordered table-dark mt-2 mb-2 ordersTable">
                    <thead>
                        <tr>
                            <th scope="col">Nom du produit</th>
                            <th scope="col">Prix</th>
                            <th scope="col">Quantité</th>
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
                        <td rowspan="{{ count($order['cart']->items) }}" class="rowSpan">{{ $order['cart']->purchaseDate->diffForHumans() }}</td>
                        @endif
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                    <p class="badge badge-pill badge-info mb-3 p-3 text-white">Total Price : ${{$order['cart']->totalPrice + $order['cart']->supplementsPrice}}</p>
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

                {{-- <div class="row">
                    <div class="col-md-8"> --}}

                        <!-- Default box -->
                        {{-- <div class="">
                            <div class="card no-padding no-border">
                                <table class="table table-striped mb-0">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <strong>Nom:</strong>
                                            </td>
                                            <td>
                                                <span>Formule Match</span> </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <strong>Description:</strong>
                                            </td>
                                            <td>
                                                <span>Formule Match description...</span> </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <strong>Prix:</strong>
                                            </td>
                                            <td>
                                                <span>100£</span> </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <strong>Image du formule:</strong>
                                            </td>
                                            <td>
                                                <span>
                                                    <a href="http://localhost:8000/storage/uploads/formulas_images//43bdf228e0991a7a62ac66908b8a6cc9.jpg"
                                                        target="_blank">
                                                        <img src="http://localhost:8000/storage/uploads/formulas_images//43bdf228e0991a7a62ac66908b8a6cc9.jpg"
                                                            style="
          max-height: 150px;
          width: auto;
          border-radius: 3px;" />
                                                    </a>
                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Actions</strong></td>
                                            <td>
                                                <!-- Single edit button -->
                                                <a href="http://localhost:8000/admin/formula/8/edit"
                                                    class="btn btn-sm btn-link"><i class="fa fa-edit"></i> Modifier</a>

                                                <a href="javascript:void(0)" onclick="deleteEntry(this)"
                                                    data-route="http://localhost:8000/admin/formula/8"
                                                    class="btn btn-sm btn-link" data-button-type="delete"><i
                                                        class="fa fa-trash"></i> Supprimer</a>




                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div><!-- /.box-body -->
                        </div><!-- /.box --> --}}

                    {{-- </div>
                </div> --}}


            </div>

        </main>

    </div><!-- ./app-body -->

    <footer class="app-footer d-none">
        <div class="text-muted ml-auto mr-auto">
            Artisé par <a target="_blank" href="http://tabacitu.ro">Cristian Tabacitu</a>.
            Propulsé par <a target="_blank" href="http://backpackforlaravel.com?ref=panel_footer_link">Backpack for
                Laravel</a>.
        </div>
    </footer>

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
        // To make Pace works on Ajax calls
        $(document).ajaxStart(function () {
            Pace.restart();
        });

        // Ajax calls should always have the CSRF token attached to them, otherwise they won't work
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        var activeTab = $('[href="' + location.hash.replace("#", "#tab_") + '"]');
        location.hash && activeTab && activeTab.tab('show');
        $('.nav-tabs a').on('shown.bs.tab', function (e) {
            location.hash = e.target.hash.replace("#tab_", "#");
        });

    </script>
    <script src="http://localhost:8000/packages/backpack/crud/js/crud.js"></script>
    <script src="http://localhost:8000/packages/backpack/crud/js/show.js"></script>
    <script>
        if (typeof deleteEntry != 'function') {
            $("[data-button-type=delete]").unbind('click');

            function deleteEntry(button) {
                // ask for confirmation before deleting an item
                // e.preventDefault();
                var button = $(button);
                var route = button.attr('data-route');
                var row = $("#crudTable a[data-route='" + route + "']").closest('tr');

                swal({
                    title: "Warning",
                    text: "Souhaitez-vous réellement supprimer cet élément?",
                    icon: "warning",
                    buttons: {
                        cancel: {
                            text: "Annuler",
                            value: null,
                            visible: true,
                            className: "bg-secondary",
                            closeModal: true,
                        },
                        delete: {
                            text: "Supprimer",
                            value: true,
                            visible: true,
                            className: "bg-danger",
                        }
                    },
                }).then((value) => {
                    if (value) {
                        $.ajax({
                            url: route,
                            type: 'DELETE',
                            success: function (result) {
                                if (result == 1) {
                                    // Show a success notification bubble
                                    new Noty({
                                        type: "success",
                                        text: "<strong>Élément supprimé</strong><br>L’élément a été supprimé avec succès."
                                    }).show();

                                    // Hide the modal, if any
                                    $('.modal').modal('hide');

                                    // Remove the details row, if it is open
                                    if (row.hasClass("shown")) {
                                        row.next().remove();
                                    }

                                    // Remove the row from the datatable
                                    row.remove();
                                } else {
                                    // if the result is an array, it means 
                                    // we have notification bubbles to show
                                    if (result instanceof Object) {
                                        // trigger one or more bubble notifications 
                                        Object.entries(result).forEach(function (entry, index) {
                                            var type = entry[0];
                                            entry[1].forEach(function (message, i) {
                                                new Noty({
                                                    type: type,
                                                    text: message
                                                }).show();
                                            });
                                        });
                                    } else { // Show an error alert
                                        swal({
                                            title: "NON supprimé",
                                            text: "Une erreur est survenue. Votre élément n’a peut-être pas été effacé.",
                                            icon: "error",
                                            timer: 4000,
                                            buttons: false,
                                        });
                                    }
                                }
                            },
                            error: function (result) {
                                // Show an alert with the result
                                swal({
                                    title: "NON supprimé",
                                    text: "Une erreur est survenue. Votre élément n’a peut-être pas été effacé.",
                                    icon: "error",
                                    timer: 4000,
                                    buttons: false,
                                });
                            }
                        });
                    }
                });

            }
        }

        // make it so that the function above is run after each DataTable draw event
        // crud.addFunctionToDataTablesDrawEventQueue('deleteEntry');

    </script>
    <script>
        // Set active state on menu element
        var full_url = "http://localhost:8000/admin/formula/8/show";
        var $navLinks = $(".sidebar-nav li a");

        // First look for an exact match including the search string
        var $curentPageLink = $navLinks.filter(
            function () {
                return $(this).attr('href') === full_url;
            }
        );

        // If not found, look for the link that starts with the url
        if (!$curentPageLink.length > 0) {
            $curentPageLink = $navLinks.filter(function () {
                if ($(this).attr('href').startsWith(full_url)) {
                    return true;
                }

                if (full_url.startsWith($(this).attr('href'))) {
                    return true;
                }

                return false;
            });
        }

        // for the found links that can be considered current, make sure 
        // - the parent item is open
        $curentPageLink.parents('li').addClass('open');
        // - the actual element is active
        $curentPageLink.each(function () {
            $(this).addClass('active');
        });


        window.onload = function(){
          var element = document.getElementById("formuleClass");
          element.classList.remove("active");  
          var el = document.getElementById("addclass");
          el.classList.add("active");
        }
    </script>
</body>

</html>
