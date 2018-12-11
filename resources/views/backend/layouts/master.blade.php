<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Panal</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{asset('public/backend/')}}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{asset('public/backend/')}}/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{asset('public/backend/')}}/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="{{asset('public/backend/')}}/vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{asset('public/backend/')}}/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    
    <!-------Toster-------------->
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    
    <!-------Sweet Alert-2-------------->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    
    <!-------Select-2 CSS-------------->
    <link rel="stylesheet" type="text/css" href="{{asset('public/backend/css/select2.min.css')}}">

    <!--------DataTable CSS-------------->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">

            @include('backend.includes.header')

            @include('backend.includes.menu') 
        </nav>

        <div id="page-wrapper">
            @yield('content')
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="{{asset('public/backend/')}}/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{asset('public/backend/')}}/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="{{asset('public/backend/')}}/vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="{{asset('public/backend/')}}/vendor/raphael/raphael.min.js"></script>
    <script src="{{asset('public/backend/')}}/vendor/morrisjs/morris.min.js"></script>
    <script src="{{asset('public/backend/')}}/data/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="{{asset('public/backend/')}}/dist/js/sb-admin-2.js"></script>

    <!-- Sweet Alert JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.30.0/dist/sweetalert2.all.min.js"></script>
    
    <!-- Select 2 JavaScript -->
    <script src="{{asset('public/backend/js/select2.full.min.js')}}"></script>

    <!-- Tiny MCE JavaScript -->
    <script src="{{asset('public/backend/tinymce/tinymce.min.js')}}"></script>
    <script>tinymce.init({ selector:'textarea' });</script>
    
    <!-- DataTable JavaScript -->
    <script src="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"></script>
    <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>

</body>

</html>
