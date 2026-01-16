@extends('layouts.app')

@section('title','Tentang Aplikasi')

@section('content')
@php $s = config('student'); @endphp

<div class="card" style="max-width:800px;margin:auto">
    <h1 style="margin-bottom:20px">Tentang Aplikasi</h1>

    @if($s['logo'])
        <img src="{{ asset($s['logo']) }}"
             style="max-width:120px;margin-bottom:20px">
    @endif

    <table cellpadding="8">
        <tr><td>Nama Mahasiswa</td><td>: {{ $s['nama'] }}</td></tr>
        <tr><td>NPM</td><td>: {{ $s['npm'] }}</td></tr>
        <tr><td>Program Studi</td><td>: {{ $s['prodi'] }}</td></tr>
        <tr><td>Fakultas</td><td>: {{ $s['fakultas'] }}</td></tr>
        <tr><td>Universitas</td><td>: {{ $s['universitas'] }}</td></tr>
        <tr><td>Mata Kuliah</td><td>: {{ $s['mata_kuliah'] }}</td></tr>
        <tr><td>Dosen Pengampu</td><td>: {{ $s['dosen'] }}</td></tr>
        <tr><td>Semester</td><td>: {{ $s['semester'] }}</td></tr>
        <tr><td>Judul Proyek</td><td>: {{ $s['judul'] }}</td></tr>
        <tr><td>Email</td><td>: {{ $s['email'] }}</td></tr>
        <tr><td>WhatsApp</td><td>: {{ $s['whatsapp'] }}</td></tr>
    </table>
</div>
@endsection
