<!DOCTYPE html>
<html lang="en">

<head>

  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  {{-- <title>SenForage</title> --}}
  <title>
    {{ config('app.name', 'SenForage') }}
  </title>
  <link rel="icon" href="{!! asset('vendor/icon.ico') !!}"/>

  {{--  <!-- Custom fonts for this template-->  --}}
  @include('layout.style')

</head>

<body id="page-top" style="background-image: url('{{ asset('images/pattern.png')}}')">

@include('layout.navbar')
  <div id="wrapper">

   {{--   <!-- Sidebar -->  --}}
 @include('layout.sidebar')
 <div id="content-wrapper">

    <div class="container-fluid">

     {{--   <!-- Breadcrumbs-->  --}}
     
@section('content')

<ol class="breadcrumb" style="background-image: url('{{ asset('images/pattern.png')}}')">
  <marquee>
  <li class="breadcrumb-item">
   {{--   <a class="text-white" href="{{ url('/accueil') }}">Bienvenue à SenForage</a>  --}}
  </li>
</marquee>
 {{--   <li class="breadcrumb-item active">Accueil</li>  --}}

</ol>

@include('layout.main')
   {{--   <!-- /.content-wrapper -->  --}}
@show
</div>
{{--  <!-- /.container-fluid -->  --}}

{{--  <!-- Sticky Footer -->  --}}
@include('layout.footer')

</div>
  </div>
  {{--  <!-- /#wrapper -->  --}}

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  {{--  <!-- Logout Modal-->  --}}
  @include('layout.logoutmodal')

  {{--  <!-- Bootstrap core JavaScript-->  --}}
  @include('layout.script')
</body>

</html>
