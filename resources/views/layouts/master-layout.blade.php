<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('layouts.includes.meta')
    <title>{{ config('app.name', 'Laravel') }}</title>
    @include('layouts.includes.css')
    
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar  -->
        @include('layouts.includes.sidebar')

        <!-- Page Content  -->
        <div id="content">
            @include('layouts.includes.top-nav')

            @yield('main-content')
        </div>
    </div>

    @include('layouts.includes.js')
</body>

</html>