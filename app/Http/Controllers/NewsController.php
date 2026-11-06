<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class NewsController extends Controller
{
    public function show(?string $slug = null): View
    {
        $categories = json_decode(file_get_contents(resource_path('data/news-categories.json')), true, 512, JSON_THROW_ON_ERROR);
        $category = $slug ? collect($categories)->firstWhere('slug', $slug) : null;
        abort_if($slug && !$category, 404);

        $posts = json_decode(file_get_contents(resource_path('data/news-posts.json')), true, 512, JSON_THROW_ON_ERROR);
        $landPosts = json_decode(file_get_contents(resource_path('data/land-posts.json')), true, 512, JSON_THROW_ON_ERROR);
        $latestPosts = array_map(fn ($index) => $landPosts[$index], [0, 1, 3, 9, 4]);
        $breadcrumbs = [
            ['label' => 'Trang chủ', 'url' => route('home')],
            ['label' => 'Kiến thức pháp lý', 'url' => $category ? route('news') : null],
        ];
        if ($category) $breadcrumbs[] = ['label' => $category['title']];

        return view('pages.news', compact('category', 'posts', 'latestPosts', 'breadcrumbs'));
    }
}
