<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Slabo+27px" rel="stylesheet">

    @stack('styles')
</head>
<body>
    @include('partials.navigation')
    @yield('jumbotron')
    <div id="app">
        <main class="py-4">
            @if(session('message'))
                 <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="alert alert-{{session('message')[0]}}">
                            <H4 class="alert-heading">{{__("Mensaje Informativo")}}</H4>
                            <p>{{session('message')[1]}}<p>
                        </div> 
                    </div>
                </div>
            @endif 
            @yield('content')
        </main>
    </div>
@stack('scripts')
    
</body>
</html>
