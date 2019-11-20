@include('header')

<body id="page-top" style="background-image: url('{{ asset('images/pattern.png')}}')">

@include('navbar')

  <header class="bg-primary text-white">
    <div class="container text-center">
      <h1> {{ __("Bienvenue à  l'ONFP")}} </h1>
      <p class="lead">{{ ('Office national de Formation professionnelle!') }}</p>
    </div>
  </header>

  @include('section')

  @include('footer')

  @include('scripts')
</body>

</html>
