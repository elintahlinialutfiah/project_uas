@extends('layouts.app')

@section('title','Daftar Artikel')

@section('content')
<div class="card" style="max-width:900px;margin:auto">

    <h1 style="margin-bottom:20px">Artikel Terbaru</h1>

    @forelse ($articles as $a)
        <div style="
            display:flex;
            gap:20px;
            margin-bottom:24px;
            padding-bottom:20px;
            border-bottom:1px solid #e5e7eb
        ">

            {{-- COVER --}}
            @if ($a->cover)
                <img src="{{ asset('storage/'.$a->cover) }}"
                     style="width:140px;height:auto;border-radius:8px">
            @endif

            <div>
                <h2 style="margin:0 0 6px 0">
                    <a href="/artikel/{{ $a->id }}"
                       style="text-decoration:none;color:#111827">
                        {{ $a->judul }}
                    </a>
                </h2>

                <p style="color:#6b7280;font-size:14px;margin-bottom:6px">
                    ✍ {{ $a->penulis }} |
                    📅 {{ $a->tanggal_publikasi }}
                </p>

                @if ($a->isbn)
                    <p style="font-size:13px;color:#374151">
                        ISBN: {{ $a->isbn }}
                    </p>
                @endif

                <p style="margin-top:8px">
                    {{ Str::limit($a->isi, 120) }}
                </p>
            </div>
        </div>
    @empty
        <p style="text-align:center;color:#9ca3af">
            Belum ada artikel
        </p>
    @endforelse

</div>
@endsection
