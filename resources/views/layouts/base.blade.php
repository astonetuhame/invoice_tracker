<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Sibed Invoice Tracker') }}</title>

    

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    @stack('scripts')


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">

    @livewireStyles
</head>
<body>
    <div id="app">
        {{ $slot }}
       {{-- @include('layouts.main') --}}
    </div>
    @livewireScripts

    <script type="text/javascript">

        window.livewire.on('alert', param => {
                toastr[param['type']](param['message']);
        });
      
      
      </script>


    <script type="text/javascript">


        window.livewire.on('openFormModal', () => {
            $('#form').modal('show');
        });

        
        window.livewire.on('openDeleteModal', () => {
            $('#modalFormDelete').modal('show');
        });

        window.livewire.on('closeDeleteModal', () => {
            $('#modalFormDelete').modal('hide');
        });

        $(document).ready(function(){
            $("#form").on('hide.bs.modal', function(){
                livewire.emit('forcedClosedModal');
            });
        });

        window.livewire.on('closeFormModal', () => {
            $('#form').modal('hide');
        });

    </script>
   {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

   <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script> --}}
</body>
</html>
