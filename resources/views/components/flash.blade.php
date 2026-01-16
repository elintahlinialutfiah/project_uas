@if (session('success'))
    <div style="
        background:#ecfdf5;
        color:#065f46;
        padding:14px 16px;
        border-left:6px solid #10b981;
        border-radius:8px;
        margin-bottom:20px;
    ">
        ✅ {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div style="
        background:#fef2f2;
        color:#7f1d1d;
        padding:14px 16px;
        border-left:6px solid #ef4444;
        border-radius:8px;
        margin-bottom:20px;
    ">
        ❌ {{ session('error') }}
    </div>
@endif

@if ($errors->any())
    <div style="
        background:#fff7ed;
        color:#9a3412;
        padding:14px 16px;
        border-left:6px solid #fb923c;
        border-radius:8px;
        margin-bottom:20px;
    ">
        ⚠️ <strong>Periksa kembali input:</strong>
        <ul style="margin:8px 0 0 16px">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
