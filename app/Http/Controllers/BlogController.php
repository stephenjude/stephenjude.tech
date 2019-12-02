<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Artisan;
use Wink\WinkPost;

class BlogController extends Controller
{


    /**
     * Show blog homepage.
     *
     * @return View
     */
    public function index()
    {
        $data = [
            'posts' => WinkPost::with('tags')
                ->live()
                ->orderBy('publish_date', 'DESC')
                ->simplePaginate(12)
        ];
        return view('index', compact('data'));
    }


    /**
     * Show about blog.
     *
     * @return View
     */
    public function about()
    {
        return view('about');
    }


    /**
     * Show a post given a slug.
     *
     * @param string $slug
     * @return View
     */
    public function findPostBySlug(string $slug)
    {
        $posts = WinkPost::with('tags')
            ->live()->get();

        $post = $posts->firstWhere('slug', $slug);

        if (optional($post)->published) {

            $next = $posts->sortByDesc('publish_date')->firstWhere('publish_date', '>', optional($post)->publish_date);
            $prev = $posts->sortByDesc('publish_date')->firstWhere('publish_date', '<', optional($post)->publish_date);

            $data = [
                'author' => $post->author,
                'post'   => $post,
                'meta'   => $post->meta,
                'next'   => $next,
                'prev'   => $prev,
            ];

            return view('post', compact('data'));
        }

        abort(404);
    }



    /**
     * Update indexed articles.
     *
     * @return string
     */
    public function updateIndexedArticles()
    {
        Artisan::call('generate:feed');
        Artisan::call('generate:index');
        return "rss feed and indexed articles generated succesfully";
    }



    /**
     * show email subscription form
     *
     * @return string
     */
    public function newsletter()
    {
        return view('newsletter');
    }
}
