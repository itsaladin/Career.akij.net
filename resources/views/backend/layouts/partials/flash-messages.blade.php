
@if (Session::has('success'))
  <script>
  new Noty({
    theme: 'sunset',
    type: 'success',
    layout: 'topCenter',
    text: "{!! Session::get('success') !!}",
    timeout: 2000
  }).show();
  </script>
@endif

@if (Session::has('error'))
  <script>
    var notify = $.notify("{!! Session::get('error') !!}", {
          type: 'theme',
          allow_dismiss: true,
          delay: 2000,
          timer: 300
      });
  </script>
@endif

