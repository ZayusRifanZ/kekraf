<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    
</head>
<body>
    <form action="{{ route('coba-post') }}" method="POST">
        @csrf
        Kota asal
        <select name="" id="">
        @foreach ($city as $data)
            <option value="{{ $data['name'] }}">
                {{ $data['name'] }}
            </option>
        @endforeach
        </select>
        Kota tujuan
        <select name="" id="">
        @foreach ($city as $data)
            <option value="{{ $data['name'] }}">
                {{ $data['name'] }}
            </option>
        @endforeach
        </select>
        <br>
        <div id="app">
            <h1>
                @{{ message }}
            </h1>
            <select v-model="selected" name="select">
                <option v-for="option in options" v-bind:value="option">@{{option}}</option>
                               
            </select>
            <br>
            <span>Selected : @{{ options[selected] }}</span>
            <br>
            <select v-model="selected_prov" name="tes">
                <option v-for="option in data_saya.prov" v-bind:value="option.id">@{{option.name}}</option>
                               
            </select>


        </div>

        <br>
        <input type="submit">
           
    </form>

    <script src="/vendor/vue/vue.js"></script>
    <script src="/vendor/vue/vue-toasted.min.js"></script>
    
    <script>
        var app = new Vue({
            el: '#app',
            data: {
                selected_prov: 1,
                data_saya: {
                    prov: [{id:1, name: 'satu'}, {id:2, name: 'dua'}],
                    ex: {tes:1, tes_name: 'one'},
                    provinces: null
                },
                message: "Coba aja yah bisa ga yah ",
                selected: 'Doe',
                options: ['Jan', 'Doe', 'Khan']
            },
            
        })
    </script>
</body>
</html>