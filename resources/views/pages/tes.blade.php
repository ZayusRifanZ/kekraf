<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    {{-- Style --}}
    @stack('prepend-style')
    @include('includes.style')
    @stack('addon-style')
    <style>

        .img{
        width:300px;
        height:300px;
        background-image: url( https://images.unsplash.com/photo-1563805042-7684c019e1cb);
        background-size:cover;
        background-position:center;
        }
    </style>
</head>
<body>
    {{-- Navbar --}}
    @include('includes.navbar')

    {{-- Page - Content --}}
    
    <div class="row mt-5">
        <div class="col-4">
            <div class="img full-width"></div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-4">
            <div class="image"
             style="
                position: relative;
                overflow: hidden;
                padding-bottom: 100%;
             ">
                <img 
                    src="https://images.unsplash.com/photo-1586227740560-8cf2732c1531?ixid=MnwxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=961&q=80" 
                    alt=""
                    style="
                        position: absolute;
                        width: 100%;
                        background-size: cover;
                        background-position: center;
                        top: -93px;
                        text-align: center;
                        margin: auto 0;
                        display: block;
                        bottom: 0;
                        top: 0;
                    ">
            </div>
        </div>
    </div>

    {{-- Footer --}}
    @include('includes.footer')

    {{-- Script --}}
    @stack('prepend-script')
    @include('includes.script')
    @stack('addon-script')
</body>
</html>


