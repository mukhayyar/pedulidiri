@extends('layouts.main')
@section('content')
          <div class="container py-4">
            <div class="container py-4">
                <div class="p-5 mb-4 bg-light rounded-3">
                  <div class="container-fluid py-5">
                    <h1 class="display-5 fw-bold">PeduliDiri</h1>
                    <p class="col-md-8 fs-4">Catatan perjalanan diri, untuk membantu kapan terakhir kali kita bepergian.</p>
                    @if(Auth::check())
                    <a class="btn btn-primary btn-lg" href="/home/create">Mulai mencatat!</a>
                    @else
                    <a class="btn btn-primary btn-lg" href="/login">Login</a>
                    @endif
                    </div>
                </div>
                <footer class="pt-3 mt-4 text-muted border-top">
                  &copy; 2021
                </footer>
              </div>
          </div>
@endsection
