<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminPostController extends Controller
{
    public function index()
    {
        $posts = Post::orderByDesc('created_at')->paginate(15);

        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'excerpt' => ['nullable', 'string', 'max:500'],
            'body' => ['required', 'string'],
            'cover_image' => ['nullable', 'image', 'max:3072'],
            'is_published' => ['nullable', 'boolean'],
        ]);

        $slugBase = Str::slug($data['title']);
        $slug = $slugBase;
        $counter = 1;
        while (Post::where('slug', $slug)->exists()) {
            $slug = $slugBase.'-'.$counter++;
        }

        $coverPath = null;
        if ($request->hasFile('cover_image')) {
            $coverPath = $request->file('cover_image')->store('blog/covers', 'public');
        }

        $post = Post::create([
            'title' => $data['title'],
            'slug' => $slug,
            'excerpt' => $data['excerpt'] ?? null,
            'body' => $data['body'],
            'cover_image' => $coverPath,
            'is_published' => (bool) ($data['is_published'] ?? false),
            'published_at' => ($data['is_published'] ?? false) ? now() : null,
        ]);

        return redirect()->route('admin.posts.edit', $post)->with('status', 'Post created');
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'excerpt' => ['nullable', 'string', 'max:500'],
            'body' => ['required', 'string'],
            'cover_image' => ['nullable', 'image', 'max:3072'],
            'is_published' => ['nullable', 'boolean'],
        ]);

        if ($post->title !== $data['title']) {
            $slugBase = Str::slug($data['title']);
            $slug = $slugBase;
            $counter = 1;
            while (Post::where('slug', $slug)->where('id', '!=', $post->id)->exists()) {
                $slug = $slugBase.'-'.$counter++;
            }
            $post->slug = $slug;
        }

        if ($request->hasFile('cover_image')) {
            $coverPath = $request->file('cover_image')->store('blog/covers', 'public');
            $post->cover_image = $coverPath;
        }

        $wasPublished = $post->is_published;

        $post->title = $data['title'];
        $post->excerpt = $data['excerpt'] ?? null;
        $post->body = $data['body'];
        $post->is_published = (bool) ($data['is_published'] ?? false);

        if ($post->is_published && ! $wasPublished) {
            $post->published_at = now();
        }

        $post->save();

        return redirect()->route('admin.posts.edit', $post)->with('status', 'Post updated');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('admin.posts.index')->with('status', 'Post deleted');
    }
}
