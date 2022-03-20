@extends('layouts.main')
@section('content')

<div class="container py-4">
    @if(Session::flash('error'))
        <p class="alert alert-danger">{{Session::get('error')}}</p>
    @endif
    <form action="/register" method="POST">
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
        <div class="mb-3">
          <label for="no_hp" class="form-label">No HP</label>
          <input type="number" class="form-control" id="no_hp" name="no_hp">
        </div>
        @if($errors->first('no_hp'))
          @foreach ($errors->get('no_hp') as $message)
              <span class="alert alert-danger">{{$message}}</span>
          @endforeach
        @endif
        <div class="mb-3">
          <label for="alamat" class="form-label">Alamat</label>
          <textarea name="alamat" id="alamat" class="form-control" cols="30" rows="5"></textarea>
        </div>
        @if($errors->first('alamat'))
          @foreach ($errors->get('alamat') as $message)
              <span class="alert alert-danger">{{$message}}</span>
          @endforeach
        @endif
        <button type="submit" class="btn btn-primary">Register</button>
        <a href="/register" class="text-muted">Sudah punya akun? Login disini!</a>
      </form>
</div>

@endsection
