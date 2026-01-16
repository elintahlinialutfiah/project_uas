@extends('layouts.app')

@section('title','Daftar Artikel')

@section('content')

<style>
.action-btn {
    position: relative;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    margin: 0 6px;
    cursor: pointer;
}

.action-btn svg {
    width: 20px;
    height: 20px;
    transition: transform .15s ease, opacity .15s ease;
}

.action-btn:hover svg {
    transform: scale(1.15);
    opacity: .85;
}

/* TOOLTIP */
.action-btn::after {
    content: attr(data-tooltip);
    position: absolute;
    bottom: 130%;
    left: 50%;
    transform: translateX(-50%);
    background: #111827;
    color: white;
    font-size: 12px;
    padding: 4px 8px;
    border-radius: 6px;
    white-space: nowrap;
    opacity: 0;
    pointer-events: none;
    transition: opacity .15s ease;
}

.action-btn:hover::after {
    opacity: 1;
}
</style>

<div class="card">
    <div style="display:flex;justify-content:space-between;align-items:center">
        <h2>Daftar Artikel</h2>
        <a href="/admin/articles/create" class="button">+ Tambah Artikel</a>
    </div>

    {{-- SEARCH --}}
    <form method="GET" style="margin:16px 0">
        <input type="text" name="search"
               placeholder="Cari judul artikel..."
               value="{{ request('search') }}">
        <button type="submit">Cari</button>
    </form>

    <table width="100%" cellpadding="10">
        <thead>
            <tr style="background:#f3f4f6;text-align:left">
                <th>Cover</th>
                <th>Judul</th>
                <th>Penulis</th>
                <th>Tanggal</th>
                <th>ISBN</th>
                <th style="text-align:center">Aksi</th>
            </tr>
        </thead>
        <tbody>
        @forelse ($articles as $a)
            <tr>
                <td width="90">
                    @if ($a->cover)
                        <img src="{{ asset('storage/'.$a->cover) }}"
                             style="max-width:80px;border-radius:6px">
                    @else
                        <span style="color:#9ca3af">—</span>
                    @endif
                </td>

                <td>{{ $a->judul }}</td>
                <td>{{ $a->penulis }}</td>
                <td>{{ $a->tanggal_publikasi }}</td>
                <td>{{ $a->isbn ?? '-' }}</td>

                {{-- AKSI --}}
                <td style="text-align:center">

                    {{-- EDIT --}}
                    <a href="/admin/articles/{{ $a->id }}/edit"
                       class="action-btn"
                       data-tooltip="Edit artikel"
                       style="color:#2563eb">

                        <svg fill="none" stroke="currentColor"
                             stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  d="M15.232 5.232l3.536 3.536M9 11l6 6M3 21l3-1 9-9-3-3-9 9-1 3z"/>
                        </svg>
                    </a>

                    {{-- DELETE --}}
                    <form method="POST"
                          action="/admin/articles/{{ $a->id }}"
                          style="display:inline"
                          onsubmit="return confirm('Yakin ingin menghapus artikel ini?')">

                        @csrf
                        @method('DELETE')

                        <button type="submit"
                                class="action-btn"
                                data-tooltip="Hapus artikel"
                                style="background:none;border:none;color:#dc2626">

                            <svg fill="none" stroke="currentColor"
                                 stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5-4h4m-6 4h8"/>
                            </svg>
                        </button>
                    </form>

                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6"
                    style="text-align:center;color:#9ca3af">
                    Tidak ada artikel
                </td>
            </tr>
        @endforelse
        </tbody>
    </table>

    {{-- PAGINATION --}}
    <div style="margin-top:20px">
        {{ $articles->withQueryString()->links('components.pagination') }}
    </div>
</div>
@endsection
