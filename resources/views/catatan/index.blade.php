@extends('layouts.main')
@section('content')
<div class="container py-4">
    <h1>Catatan Perjalanan</h1>
    <a href="/home/create" class="btn btn-success">Tambah Catatan</a>
    @if(Session::flash('success'))
        <p class="alert alert-danger">{{Session::get('success')}}</p>
    @endif
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Tanggal</th>
            <th scope="col">Waktu</th>
            <th scope="col">Lokasi</th>
            <th scope="col">Suhu Tubuh</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        @foreach ($catatans as $catatan)
        <tbody>
            <tr>
                <th scope="row">{{$loop->index+1}}</th>
                <td>{{$catatan->tanggal_pergi}}</td>
                <td>{{$catatan->waktu}}</td>
                <td>{{$catatan->lokasi}}</td>
                <td>{{$catatan->suhu_tubuh}} C</td>
                <td>
                    <a href="/home/edit/{{$catatan->id}}" class="btn btn-primary btn-sm m-1">Edit</a>
                    <form action="/home/{{$catatan->id}}" method="POST">
                        @csrf
                        @method("DELETE")
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin akan menghapus data ini?')">Delete</button>
                    </form>
                </td>
            </tr>
        </tbody>
        @endforeach
      </table>
</div>
@endsection
