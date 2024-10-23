<!-- resources/views/news/index.blade.php -->
@extends('layouts.dashboard')

@section('title', 'Daftar Berita')

@section('content')
<div class="container">
    <h1>Daftar Berita</h1>

    <div class="row">
        @foreach($beritas as $berita)
        <div class="col-md-4">
            <div class="card mb-4">
                @if($berita->image)
                <img src="{{ asset('news-images/' . $berita->image) }}" class="card-img-top" alt="{{ $berita->title }}">
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $berita->title }}</h5>
                    <p class="card-text">{{ Str::limit($berita->content, 100) }}</p>
                    <a href="{{ route('news.show', $berita->id) }}" class="btn btn-primary">Baca selengkapnya</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
