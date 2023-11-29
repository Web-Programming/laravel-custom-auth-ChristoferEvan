@extends('layout')


@section('content')
<div class="row rt-4">
    <div class="col">
        <h2>Prodi</h2>
            <div class="d-md-flex justify-content-md-end">
                <a href="{{route('prodi.create')}}" class="btn btn-primary">Tambah</a>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Nama</th><th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($prodi as $item)
                    <td>
                        
                        <form action="{{route('prodi.destroy',['prodi'=>$item->id])}}"
                            method="POST">
                            <a href="{{url('prodi/'.$item->id)}}" class="btn btn-warning">Detail</a>
                            <a href="{{url('prodi/'.$item->id.'/edit')}}" class="btn btn-info">Ubah</a>
                            @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                        
                    </td>
                        {{-- <tr>
                            <td>{{$item->nama}}</td>
                            <td><a href="{{url('/prodi/'.$item->id)}}" class="btn btn-warning">Detail</a></td>
                        </tr> --}}
                    @endforeach
                </tbody>
            </table>
</div>
</div>
@endsection



{{-- <h2>Prodi</h2>
<table class="table table-striped">
    <thead>
        <tr>
            <th>NPM</th>
            <th>Nama Mahasiswa</th>
            <th>Nama Prodi</th>
            
        </tr>
    </thead>
    <tbody>
    @foreach ($allmahasiswaprodi as $item )
    <tr>
        <td>{{$item->npm}}</td>
        <td>{{$item->nama_mahasiswa}}</td>
        <td>{{$item->nama_prodi}}</td>
    </tr>
        
    @endforeach
</tbody>
</table>
@endsection --}}