@extends('layouts.main')
@section('content')

<div class="container py-4">
    @if(Session::flash('success'))
        <p class="alert alert-success">{{Session::get('success')}}</p>
    @endif
    @if(Session::flash('error'))
        <p class="alert alert-danger">{{Session::get('error')}}</p>
    @endif
    <form action="/login" method="POST">
        @csrf
        <div class="mb-3">
          <label for="nik" class="form-label">NIK</label>
          <input type="text" class="form-control" id="nik" name="nik">
        </div>
        @if($errors->first('nik'))
          @foreach ($errors->get('nik') as $message)
              <span class="alert alert-danger">{{$message}}</span>
          @endforeach
        @endif
        <div class="mb-3">
          <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
          <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap">
        </div>
        @if($errors->first('nama_lengkap'))
          @foreach ($errors->get('nama_lengkap') as $message)
              <span class="alert alert-danger">{{$message}}</span>
          @endforeach
        @endif
        <button type="submit" class="btn btn-primary">Login</button>
        <a href="/register" class="text-muted">Buat akun disini!</a>
      </form>
</div>

@endsection
