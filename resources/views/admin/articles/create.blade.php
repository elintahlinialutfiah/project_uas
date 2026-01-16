@extends('layouts.app')

@section('title','Tambah Artikel')

@section('content')
<div class="card" style="max-width:720px;margin:auto">
    <h2>Tambah Artikel</h2>

    <form method="POST"
          action="/admin/articles"
          enctype="multipart/form-data">
        @csrf

        <label>Judul Artikel</label>
        <input type="text" name="judul" required>

        <label>Isi Artikel</label>
        <textarea name="isi" rows="6" required></textarea>

        <label>Tanggal Publikasi</label>
        <input type="date" name="tanggal_publikasi" required>

        <label>Penulis</label>
        <input type="text" name="penulis" required>

        <label>ISBN</label>
        <input type="text" name="isbn"
               placeholder="Contoh: 978-602-1234-56-7">

        <label>Cover Buku</label>
        <input type="file" name="cover" accept="image/*">

        <div style="display:flex;gap:12px;margin-top:16px">
            <button type="submit">Simpan</button>
            <a href="/admin/articles" class="button"
               style="background:#6b7280">Batal</a>
        </div>
    </form>
</div>
@endsection
