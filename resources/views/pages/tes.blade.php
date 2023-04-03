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

    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
    

</head>
<body>
    {{-- Navbar --}}
    @include('includes.navbar')

    {{-- Page - Content --}}
    
    <div class="container" style="margin-top: 100px">
        <div class="row">
            <div class="col-3">
                <input type="text" id="kota-asal" name="" class="form-control" placeholder="Kota pengirim">
            </div>
            <div class="col-3">
                <input type="text" class="form-control" placeholder="Kota tujuan">
            </div>
            <div class="col-3">
                <input type="text" class="form-control" placeholder="Berat barang (kg)">
            </div>
            <div class="col-3">
                <button class="btn btn-primary">Periksa Ongkir</button>
            </div>

        </div>
        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Deleniti saepe ad non est? Nobis possimus esse ratione repellat quae libero, illo, ad vel ducimus, natus deleniti perferendis. Aperiam, sequi magni?
        @php
            echo route('api-provinces');
            echo 'time stone';
        @endphp
    </div>

    {{-- Footer --}}
    @include('includes.footer')

    {{-- Script --}}
    @stack('prepend-script')
    @include('includes.script')
    @stack('addon-script')
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
    <script src="/vendor/axios/axios.min.js"></script>
    <script>
        $( function() {
            var availableTags = [
                "ActionScript",
                "AppleScript",
                "Asp",
                "BASIC",
                "C",
                "C++",
                "Clojure",
                "COBOL",
                "ColdFusion",
                "Erlang",
                "Fortran",
                "Groovy",
                "Haskell",
                "Java",
                "JavaScript",
                "Lisp",
                "Perl",
                "PHP",
                "Python",
                "Ruby",
                "Scala",
                "Scheme"
            ];
            $( "#kota-asal" ).autocomplete({
            source: '{{ return redirect()->route('api-city')->get() }}'
            // '{{ route('api-provinces') }}'
            });
        } );
    </script>
</body>
</html>


