<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    // ================= ADMIN =================

    public function index(Request $request)
    {
        $query = Article::query();

        if ($request->has('search') && $request->search != '') {
            $query->where('judul', 'like', '%' . $request->search . '%');
        }

        $articles = $query
            ->orderBy('tanggal_publikasi', 'desc')
            ->paginate(5);

        return view('admin.articles.index', [
            'articles' => $articles
        ]);
    }

    public function create()
    {
        return view('admin.articles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'tanggal_publikasi' => 'required|date',
            'penulis' => 'required',
            'isbn' => 'nullable|string|max:20',
            'cover' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('cover')) {
            $file = $request->file('cover');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('covers', $filename, 'public');
            $data['cover'] = $path;
        }

        Article::create($data);

        return redirect('/admin/articles')
            ->with('success', 'Artikel berhasil ditambahkan');
    }

    public function edit(Article $article)
    {
        return view('admin.articles.edit', [
            'article' => $article
        ]);
    }

    public function update(Request $request, Article $article)
    {
        $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'tanggal_publikasi' => 'required|date',
            'penulis' => 'required',
            'isbn' => 'nullable|string|max:20',
            'cover' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('cover')) {
            $file = $request->file('cover');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('covers', $filename, 'public');
            $data['cover'] = $path;
        }

        $article->update($data);

        return redirect('/admin/articles')
            ->with('success', 'Artikel berhasil diperbarui');
    }

    public function destroy(Article $article)
    {
        $article->delete();

        return redirect('/admin/articles')
            ->with('success', 'Artikel berhasil dihapus');
    }

    // ================= PUBLIK =================

    public function publicIndex()
    {
        $articles = Article::orderBy('tanggal_publikasi', 'desc')->get();

        return view('public.index', [
            'articles' => $articles
        ]);
    }

    public function show(Article $article)
    {
        return view('public.show', [
            'article' => $article
        ]);
    }
}
