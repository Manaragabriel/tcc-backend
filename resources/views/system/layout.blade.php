<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <base href="{{asset('/')}}"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title>Gerenciador de Projetos</title>
        <link href="{{asset('assets/plugins/dragula/dragula.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/css/jquery-ui.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/css/metisMenu.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/css/app.min.css')}}" rel="stylesheet" type="text/css" />
        @livewireStyles
        @yield('styles')
      
    </head>
    <body>


        @include('system/includes/aside')
    
        @include('system/includes/header')
        
        <div class="page-wrapper">
            <div class="page-content-tab">
                @yield('content')
            </div>
        </div>
     

     
     

        <script src="{{asset('assets/js/jquery.min.js')}}"></script>
        <script src="{{asset('assets/js/jquery-ui.min.js')}}"></script>
        <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('assets/js/metismenu.min.js')}}"></script>
        <script src="{{asset('assets/js/waves.js')}}"></script>
        <script src="{{asset('assets/js/feather.min.js')}}"></script>
        <script src="{{asset('assets/js/jquery.slimscroll.min.js')}}"></script>
        <script src="{{asset('plugins/apexcharts/apexcharts.min.js')}}"></script>
        <script src="{{asset('assets/pages/jquery.projects-index.init.js')}}"></script>
        <script src="{{asset('assets/plugins/dragula/dragula.min.js')}}"></script>
        <script src="{{asset('assets/pages/jquery.dragula.init.js')}}"></script>
        <script src="{{asset('assets/js/app.js')}}"></script>
        @livewireScripts
        @yield('scripts')

       
    </body>
</html>