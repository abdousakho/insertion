<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

 {{--  <!-- Core plugin JavaScript--> --}}
  <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

  {{-- <!-- Page level plugin JavaScript--> --}}
  {{--  <script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>  --}}
  <script src="{{ asset('vendor/datatables/jquery.dataTables.js') }}"></script>
  <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.js') }}"></script>

  {{-- <!-- Custom scripts for all pages--> --}}
  <script src="{{ asset('js/sb-admin.min.js') }}"></script>

  {{-- <!-- Demo scripts for this page--> --}}
  <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
  {{--  <script src="{{ asset('js/demo/chart-area-demo.js') }}"></script>  --}}
  {{--  mon ajout  --}}
  {{--  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.js"></script>  --}}

{{-- script datables pour la pagination et la recherche avec ajax --}}
<script type="text/javascript" src="{{ asset('DataTables/datatables.min.js') }}"></script>

{{-- script qrcode --}}
<script type="text/javascript" src="{{ asset('qrcodejs-master\qrcode.min.js') }}"></script>

<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>

<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.colVis.min.js"></script>



@stack('scripts')



