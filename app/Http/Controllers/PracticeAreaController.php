<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class PracticeAreaController extends Controller
{
    public function show(string $slug): View
    {
        $areas = json_decode(file_get_contents(resource_path('data/practice-areas.json')), true, 512, JSON_THROW_ON_ERROR);
        $area = collect($areas)->firstWhere('slug', $slug);
        abort_unless($area, 404);

        // Mockup: các lĩnh vực dùng chung bộ bài viết và ảnh của trang đất đai.
        $posts = json_decode(file_get_contents(resource_path('data/land-posts.json')), true, 512, JSON_THROW_ON_ERROR);
        $latestPosts = array_map(fn ($index) => $posts[$index], [0, 1, 3, 9, 4]);

        return view('pages.practice-area-detail', compact('area', 'posts', 'latestPosts'));
    }
}
