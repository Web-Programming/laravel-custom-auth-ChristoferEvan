<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form Prodi</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
</head>
<body>
    <div class="cotainer">
        <div class="row rt-4">
            <div class="col">
                <h2>From Prodi</h2>
                @if(session()->has('info'))
                <div class="alert alert-success">
                    {{session()->get('info')}}
                </div>
                @endif
                <form action="{{url('prodi/store')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" id="nama" class="from-control"
                    value="{{old('nama')}}">
                    @error('nama')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary mt-2">Simpan</button>
                </form>
            </div>
        </div>
    </div>    
</body>
</html>