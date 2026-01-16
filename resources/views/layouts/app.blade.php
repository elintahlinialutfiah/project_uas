<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Blog UAS')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        :root {
            --primary: #4f46e5;
            --bg: #f9fafb;
            --text: #111827;
            --muted: #6b7280;
            --card: #ffffff;
        }

        * {
            box-sizing: border-box;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
        }

        body {
            margin: 0;
            background: var(--bg);
            color: var(--text);
        }

        header {
            background: var(--primary);
            color: white;
            padding: 16px 24px;
        }

        header nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        header a {
            color: white;
            text-decoration: none;
            margin-left: 16px;
            font-weight: 500;
        }

        .container {
            max-width: 960px;
            margin: 32px auto;
            padding: 0 16px;
        }

        .card {
            background: var(--card);
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 10px 20px rgba(0,0,0,0.05);
        }

        h1, h2, h3 {
            margin-top: 0;
        }

        .muted {
            color: var(--muted);
            font-size: 14px;
        }

        button {
            background: var(--primary);
            color: white;
            border: none;
            padding: 10px 16px;
            border-radius: 8px;
            cursor: pointer;
        }

        input, textarea {
            width: 100%;
            padding: 10px;
            margin-top: 6px;
            margin-bottom: 16px;
            border-radius: 8px;
            border: 1px solid #d1d5db;
        }

        a.button {
            background: var(--primary);
            color: white;
            padding: 8px 14px;
            border-radius: 8px;
            text-decoration: none;
            font-size: 14px;
        }
    </style>
</head>
<body>

<header>
    <nav>
        <strong>Blog UAS</strong>
        <div>
            <a href="/">Home</a>
            @auth
                <a href="/admin/articles">Admin</a>
                <form action="/logout" method="POST" style="display:inline">
                    @csrf
                    <button style="margin-left:12px;background:#ef4444">Logout</button>
                </form>
            @else
                <a href="/login">Login</a>
            @endauth
			<a href="{{ route('about') }}">Tentang</a>
        </div>
    </nav>
</header>

<div class="container">
	@include('components.flash')
    @yield('content')
</div>
<footer style="
    margin-top:40px;
    padding:16px;
    text-align:center;
    font-size:14px;
    color:#6b7280;
    border-top:1px solid #e5e7eb
">
    © {{ date('Y') }} – {{ config('student.nama') }} |
    {{ config('student.prodi') }} |
    {{ config('student.universitas') }}
</footer>
</body>
</html>
