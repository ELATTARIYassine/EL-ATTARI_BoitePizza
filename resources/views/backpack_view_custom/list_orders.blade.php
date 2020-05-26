<!DOCTYPE html>

<html lang="fr" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="robots" content="noindex, nofollow">
    <meta name="csrf-token" content="OTHR571Z4QcfHmcJUqhSLtGgk9dWf2jzeOZD11Sg" />
    <title>Elementsbases :: Backpack Admin Panel</title>


    <link rel="stylesheet" type="text/css"
        href="http://localhost:8000/packages/backpack/base/css/bundle.css?v=4.0.61@1977e0cc52fa7cf9547eaeadf03f5cd88402b574">
    <link rel="stylesheet" type="text/css"
        href="http://localhost:8000/packages/source-sans-pro/source-sans-pro.css?v=4.0.61@1977e0cc52fa7cf9547eaeadf03f5cd88402b574">
    <link rel="stylesheet" type="text/css"
        href="http://localhost:8000/packages/line-awesome/css/line-awesome.min.css?v=4.0.61@1977e0cc52fa7cf9547eaeadf03f5cd88402b574">


    <!-- DATA TABLES -->
    <link rel="stylesheet" type="text/css"
        href="http://localhost:8000/packages/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css"
        href="http://localhost:8000/packages/datatables.net-fixedheader-bs4/css/fixedHeader.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css"
        href="http://localhost:8000/packages/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css">

    <link rel="stylesheet" href="http://localhost:8000/packages/backpack/crud/css/crud.css">
    <link rel="stylesheet" href="http://localhost:8000/packages/backpack/crud/css/form.css">
    <link rel="stylesheet" href="http://localhost:8000/packages/backpack/crud/css/list.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
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
                    <li class='nav-item'><a class='nav-link' href='http://localhost:8000/admin/formula'><i
                                class="nav-icon fa fa-book"></i> Formules</a></li>
                    <li class='nav-item'><a class='nav-link' href='http://localhost:8000/admin/comment'><i
                                class="nav-icon fa fa-book"></i> Commentaires</a></li>
                    <li class='nav-item'><a class='nav-link' id="eb" href='http://localhost:8000/admin/elementsbase'><i
                                class='nav-icon fa fa-question'></i> éléments de base</a></li>
                    <li class='nav-item'><a class='nav-link' href='http://localhost:8000/admin/supplement'><i
                                class='nav-icon fa fa-question'></i> Supplements</a></li>
                    <li class='nav-item'><a onclick="func()" class='nav-link' href='http://localhost:8000/admin/order'><i
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
                            href="http://localhost:8000/admin/elementsbase">elementsbases</a></li>
                    <li class="breadcrumb-item text-capitalize active" aria-current="page">Liste</li>
                </ol>
            </nav>

            <div class="container-fluid">
                <h2>
                    <span class="text-capitalize">elementsbases</span>
                    <small id="datatable_info_stack"></small>
                </h2>
            </div>

            <div class="container-fluid animated fadeIn">


                <!-- Default box -->
                <div class="row">

                    <!-- THE ACTUAL CONTENT -->
                    <div class="col-md-12">
                        <div class="">

                            <div class="row mb-0">
                                <div class="col-6">
                                    <div class="hidden-print with-border">

                                        <a href="http://localhost:8000/admin/elementsbase/create"
                                            class="btn btn-primary" data-style="zoom-in"><span class="ladda-label"><i
                                                    class="fa fa-plus"></i> Ajouter elementsbase</span></a>

                                    </div>
                                </div>
                                <div class="col-6">
                                    <div id="datatable_search_stack" class="float-right"></div>
                                </div>
                            </div>



                            <div class="overflow-hidden mt-2">

                                <table id="crudTable"
                                    class="bg-white table table-striped table-hover nowrap rounded shadow-xs border-xs"
                                    cellspacing="0">
                                    <thead>
                                        <tr>

                                            <th data-orderable="true" data-priority="1" data-visible-in-table="false"
                                                data-visible="true" data-can-be-visible-in-table="true"
                                                data-visible-in-modal="true" data-visible-in-export="true"
                                                data-force-export="false">
                                                Client
                                            </th>
                                            <th data-orderable="true" data-priority="1" data-visible-in-table="false"
                                                data-visible="true" data-can-be-visible-in-table="true"
                                                data-visible-in-modal="true" data-visible-in-export="true"
                                                data-force-export="false">
                                                Montant
                                            </th>
                                            <th data-orderable="true" data-priority="1" data-visible-in-table="false"
                                                data-visible="true" data-can-be-visible-in-table="true"
                                                data-visible-in-modal="true" data-visible-in-export="true"
                                                data-force-export="false">
                                                Date du commande
                                            </th>

                                            <th data-orderable="false" data-priority="1" data-visible-in-export="false">
                                                Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders as $order)
                                        <tr>
                                            <td>{{ $order['client'] }}</td>
                                            <td>{{ $order['cart']->totalPrice + $order['cart']->supplementsPrice }} £</td>
                                            <td>
                                                {{ 
                                                   $order['cart']->purchaseDate->day.'/'.
                                                   $order['cart']->purchaseDate->month.'/'.
                                                   $order['cart']->purchaseDate->year.'  ('.
                                                   $order['cart']->purchaseDate->diffForHumans().')'  
                                                }}
                                            </td>
                                            <td>
                                                <a href="http://localhost:8000/admin/order/{{ $order['id'] }}/show" class="btn btn-sm btn-link"><i class="fa fa-eye"></i> Aperçu</a>
                                                <form style="display: inline-block;" action="http://localhost:8000/admin/order/{{$order['id']}}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-link"><i class="fa fa-trash"></i> supprimer</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>

                                            <th data-orderable="true" data-priority="1" data-visible-in-table="false"
                                                data-visible="true" data-can-be-visible-in-table="true"
                                                data-visible-in-modal="true" data-visible-in-export="true"
                                                data-force-export="false">
                                                Client
                                            </th>
                                            <th data-orderable="true" data-priority="1" data-visible-in-table="false"
                                                data-visible="true" data-can-be-visible-in-table="true"
                                                data-visible-in-modal="true" data-visible-in-export="true"
                                                data-force-export="false">
                                                Montant
                                            </th>
                                            <th data-orderable="true" data-priority="1" data-visible-in-table="false"
                                                data-visible="true" data-can-be-visible-in-table="true"
                                                data-visible-in-modal="true" data-visible-in-export="true"
                                                data-force-export="false">
                                                Date du commande
                                            </th>

                                            <th data-orderable="false" data-priority="1" data-visible-in-export="false">
                                                Actions</th>
                                        </tr>
                                    </tfoot>
                                </table>


                            </div><!-- /.box-body -->

                        </div><!-- /.box -->
                    </div>

                </div>



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
    <!-- DATA TABLES SCRIPT -->
    <script type="text/javascript" src="http://localhost:8000/packages/datatables.net/js/jquery.dataTables.min.js">
    </script>
    <script type="text/javascript"
        src="http://localhost:8000/packages/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript"
        src="http://localhost:8000/packages/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script type="text/javascript"
        src="http://localhost:8000/packages/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
    <script type="text/javascript"
        src="http://localhost:8000/packages/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script type="text/javascript"
        src="http://localhost:8000/packages/datatables.net-fixedheader-bs4/js/fixedHeader.bootstrap4.min.js"></script>

    {{-- <script>
        var saved_list_url = localStorage.getItem('adminelementsbase_list_url');

        //check if saved url has any parameter or is empty after clearing filters.

        if (saved_list_url && saved_list_url.indexOf('?') < 1) {
            var saved_list_url = false;
        } else {
            var persistentUrl = saved_list_url + '&persistent-table=true';
        }

        var arr = window.location.href.split('?');
        //check if url has parameters.
        if (arr.length > 1 && arr[1] !== '') {
            // IT HAS! Check if it is our own persistence redirect.
            if (window.location.search.indexOf('persistent-table=true') < 1) {
                // IF NOT: we don't want to redirect the user.
                saved_list_url = false;
            }
        }

        if (saved_list_url && persistentUrl != window.location.href) {
            window.location.href = persistentUrl;
        }

        var crud = {
            exportButtons: JSON.parse('null'),
            functionsToRunOnDataTablesDrawEvent: [],
            addFunctionToDataTablesDrawEventQueue: function (functionName) {
                if (this.functionsToRunOnDataTablesDrawEvent.indexOf(functionName) == -1) {
                    this.functionsToRunOnDataTablesDrawEvent.push(functionName);
                }
            },
            responsiveToggle: function (dt) {
                $(dt.table().header()).find('th').toggleClass('all');
                dt.responsive.rebuild();
                dt.responsive.recalc();
            },
            executeFunctionByName: function (str, args) {
                var arr = str.split('.');
                var fn = window[arr[0]];

                for (var i = 1; i < arr.length; i++) {
                    fn = fn[arr[i]];
                }
                fn.apply(window, args);
            },
            updateUrl: function (new_url) {
                new_url = new_url.replace('/search', '');
                window.history.pushState({}, '', new_url);
                localStorage.setItem('adminelementsbase_list_url', new_url);
            },
            dataTableConfiguration: {

                responsive: {
                    details: {
                        display: $.fn.dataTable.Responsive.display.modal({
                            header: function (row) {
                                // show the content of the first column
                                // as the modal header
                                // var data = row.data();
                                // return data[0];
                                return '';
                            }
                        }),
                        renderer: function (api, rowIdx, columns) {

                            var data = $.map(columns, function (col, i) {
                                var columnHeading = crud.table.columns().header()[col.columnIndex];

                                // hide columns that have VisibleInModal false
                                if ($(columnHeading).attr('data-visible-in-modal') == 'false') {
                                    return '';
                                }

                                return '<tr data-dt-row="' + col.rowIndex + '" data-dt-column="' + col
                                    .columnIndex + '">' +
                                    '<td style="vertical-align:top; border:none;"><strong>' + col.title
                                    .trim() + ':' + '<strong></td> ' +
                                    '<td style="padding-left:10px;padding-bottom:10px; border:none;">' +
                                    col.data + '</td>' +
                                    '</tr>';
                            }).join('');

                            return data ?
                                $('<table class="table table-striped mb-0">').append('<tbody>' + data +
                                    '</tbody>') :
                                false;
                        },
                    }
                },
                fixedHeader: true,

                stateSave: true,
                /*
                    if developer forced field into table 'visibleInTable => true' we make sure when saving datatables state
                    that it reflects the developer decision.
                */

                stateSaveParams: function (settings, data) {

                    localStorage.setItem('adminelementsbase_list_url_time', data.time);

                    data.columns.forEach(function (item, index) {
                        var columnHeading = crud.table.columns().header()[index];
                        if ($(columnHeading).attr('data-visible-in-table') == 'true') {
                            return item.visible = true;
                        }
                    });
                },
                autoWidth: false,
                pageLength: 10,
                lengthMenu: [
                    [10, 25, 50, 100, -1],
                    [10, 25, 50, 100, "Tous les "]
                ],
                /* Disable initial sort */
                aaSorting: [],
                language: {
                    "emptyTable": "Aucune donnée à afficher.",
                    "info": "Affichage des éléments _START_ à _END_ sur _TOTAL_",
                    "infoEmpty": "",
                    "infoFiltered": "(filtré à partir de _MAX_ éléments au total)",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "_MENU_ enregistrements par page",
                    "loadingRecords": "Chargement...",
                    "processing": "<img src='http://localhost:8000/packages/backpack/crud/img/ajax-loader.gif' alt='Traitement...'>",
                    "search": "<span class='d-none d-sm-inline'>Recherche : </span>",
                    "zeroRecords": "Aucun enregistrement correspondant trouvé",
                    "paginate": {
                        "first": "Premier",
                        "last": "Dernier",
                        "next": ">",
                        "previous": "<"
                    },
                    "aria": {
                        "sortAscending": ": activez pour trier la colonne par ordre croissant",
                        "sortDescending": ": activez pour trier la colonne par ordre décroissant"
                    },
                    "buttons": {
                        "copy": "Copier",
                        "excel": "Excel",
                        "csv": "CSV",
                        "pdf": "PDF",
                        "print": "Imprimer",
                        "colvis": "Affichage des colonnes"
                    },
                },
                processing: true,
                serverSide: true,
                ajax: {
                    "url": "http://localhost:8000/admin/elementsbase/search?",
                    "type": "POST"
                },
                dom: "<'row hidden'<'col-sm-6 hidden-xs'i><'col-sm-6 hidden-print'f>>" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row mt-2 '<'col-sm-6 col-md-4'l><'col-sm-2 col-md-4 text-center'B><'col-sm-6 col-md-4 hidden-print'p>>",
            }
        }

    </script> --}}


    <script type="text/javascript">
        jQuery(document).ready(function ($) {

            crud.table = $("#crudTable").DataTable(crud.dataTableConfiguration);

            // move search bar
            $("#crudTable_filter").appendTo($('#datatable_search_stack'));
            $("#crudTable_filter input").removeClass('form-control-sm');

            // move "showing x out of y" info to header
            $("#datatable_info_stack").html($('#crudTable_info'));

            // move the bottom buttons before pagination
            $("#bottom_buttons").insertBefore($('#crudTable_wrapper .row:last-child'));

            // override ajax error message
            $.fn.dataTable.ext.errMode = 'none';
            $('#crudTable').on('error.dt', function (e, settings, techNote, message) {
                new Noty({
                    type: "error",
                    text: "<strong>Erreur</strong><br>Erreur lors du chargement. Merci de réactualiser la page."
                }).show();
            });

            // make sure AJAX requests include XSRF token
            $.ajaxPrefilter(function (options, originalOptions, xhr) {
                var token = $('meta[name="csrf_token"]').attr('content');

                if (token) {
                    return xhr.setRequestHeader('X-XSRF-TOKEN', token);
                }
            });

            // on DataTable draw event run all functions in the queue
            // (eg. delete and details_row buttons add functions to this queue)
            $('#crudTable').on('draw.dt', function () {
                crud.functionsToRunOnDataTablesDrawEvent.forEach(function (functionName) {
                    crud.executeFunctionByName(functionName);
                });
            }).dataTable();

            // when datatables-colvis (column visibility) is toggled
            // rebuild the datatable using the datatable-responsive plugin
            $('#crudTable').on('column-visibility.dt', function (event) {
                crud.table.responsive.rebuild();
            }).dataTable();

            // when columns are hidden by reponsive plugin,
            // the table should have the has-hidden-columns class
            crud.table.on('responsive-resize', function (e, datatable, columns) {
                if (crud.table.responsive.hasHidden()) {
                    $("#crudTable").removeClass('has-hidden-columns').addClass('has-hidden-columns');
                } else {
                    $("#crudTable").removeClass('has-hidden-columns');
                }
            });

        });

    </script>


    <script src="http://localhost:8000/packages/backpack/crud/js/crud.js"></script>
    <script src="http://localhost:8000/packages/backpack/crud/js/form.js"></script>
    <script src="http://localhost:8000/packages/backpack/crud/js/list.js"></script>

    <!-- CRUD LIST CONTENT - crud_list_scripts stack -->
    <script>
        // Set active state on menu element
        var full_url = "http://localhost:8000/admin/elementsbase";
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
        function func(){
            console.log('f');
            
        }
        window.onload = function() {
            var element = document.getElementById("eb");
            element.classList.remove("active");
        }
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        @if(Session::has('delete'))
            toastr.error("{{ Session::get('delete') }}")
        @endif
    </script>
</body>

</html>
