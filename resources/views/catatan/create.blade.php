@extends('layouts.main')
@section('content')

<div class="container p-4">
    <form action="/home/create" method="POST">
        @csrf
        <div class="row">
            <div class="col">
                <div class="mb-3">
                    <label for="tanggal" class="form-label">Tanggal</label>
                    <input type="date" class="form-control" id="tanggal" name="tanggal">
                </div>
                @if($errors->first('tanggal'))
                    @foreach ($errors->get('tanggal') as $message)
                        <span class="alert alert-danger">{{$message}}</span>
                    @endforeach
                @endif
            </div>
            <div class="col">
                <div class="mb-3">
                    <label for="waktu" class="form-label">Waktu</label>
                    <input type="time" class="form-control" id="waktu" name="waktu">
                </div>
                @if($errors->first('waktu'))
                    @foreach ($errors->get('waktu') as $message)
                        <span class="alert alert-danger">{{$message}}</span>
                    @endforeach
                @endif
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="mb-3">
                    <label for="lokasi" class="form-label">Lokasi</label>
                    <input type="text" class="form-control" id="lokasi" name="lokasi">
                </div>
                @if($errors->first('lokasi'))
                    @foreach ($errors->get('lokasi') as $message)
                        <span class="alert alert-danger">{{$message}}</span>
                    @endforeach
                @endif
            </div>
            <div class="col">
                <div class="mb-3">
                    <label for="suhu" class="form-label">Suhu Tubuh</label>
                    <input type="number" class="form-control" id="suhu" name="suhu">
                </div>
                @if($errors->first('suhu'))
                    @foreach ($errors->get('suhu') as $message)
                        <span class="alert alert-danger">{{$message}}</span>
                    @endforeach
                @endif
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Tambah</button>
      </form>
</div>

@endsection
