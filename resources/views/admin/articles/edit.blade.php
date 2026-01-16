@extends('layouts.app')

@section('title','Edit Artikel')

@section('content')
<div class="card" style="max-width:720px;margin:auto">
    <h2>Edit Artikel</h2>

    <form method="POST"
          action="/admin/articles/{{ $article->id }}"
          enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label>Judul Artikel</label>
        <input type="text" name="judul"
               value="{{ $article->judul }}" required>

        <label>Isi Artikel</label>
        <textarea name="isi" rows="6" required>{{ $article->isi }}</textarea>

        <label>Tanggal Publikasi</label>
        <input type="date" name="tanggal_publikasi"
               value="{{ $article->tanggal_publikasi }}" required>

        <label>Penulis</label>
        <input type="text" name="penulis"
               value="{{ $article->penulis }}" required>

        <label>ISBN</label>
        <input type="text" name="isbn"
               value="{{ $article->isbn }}">

        <label>Cover Buku</label>
        <input type="file" name="cover" accept="image/*">

        @if($article->cover)
            <p class="muted">Cover saat ini:</p>
            <img src="{{ asset('storage/'.$article->cover) }}"
                 style="max-width:150px;border-radius:8px">
        @endif

        <div style="display:flex;gap:12px;margin-top:16px">
            <button type="submit">Update</button>
            <a href="/admin/articles" class="button"
               style="background:#6b7280">Batal</a>
        </div>
    </form>
</div>
@endsection
