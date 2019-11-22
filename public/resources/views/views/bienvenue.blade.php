@include('header')

<body id="page-top" style="background-image: url('{{ asset('images/pattern.png')}}')">

@include('navbar')

  <header class="bg-primary text-white">
    <div class="container text-center">
      <h1>Bienvenue à  Sen Forage</h1>
      <p class="lead">{{ ('socièté de production et de distribution d\'eau potable au Sénégal!') }}</p>
    </div>
  </header>

  @include('section')

  @include('footer')

  @include('scripts')
</body>

</html>
