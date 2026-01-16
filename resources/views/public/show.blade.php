@extends('layouts.app')

@section('title', $article->judul)

@section('content')
<div class="card" style="max-width:800px;margin:auto">

    {{-- COVER --}}
    @if ($article->cover)
        <img src="{{ asset('storage/'.$article->cover) }}"
             style="max-width:240px;border-radius:10px;margin-bottom:20px">
    @endif

    <h1>{{ $article->judul }}</h1>

    <p style="color:#6b7280;margin-bottom:12px">
        ✍ {{ $article->penulis }} |
        📅 {{ $article->tanggal_publikasi }}
    </p>

    @if ($article->isbn)
        <p style="font-size:14px;color:#374151;margin-bottom:16px">
            <strong>ISBN:</strong> {{ $article->isbn }}
        </p>
    @endif

    <hr style="margin:20px 0">

    <div style="line-height:1.8">
        {!! nl2br(e($article->isi)) !!}
    </div>

    <div style="margin-top:30px">
        <a href="/" class="button"
           style="background:#6b7280">
            ← Kembali ke daftar
        </a>
    </div>
</div>
@endsection
