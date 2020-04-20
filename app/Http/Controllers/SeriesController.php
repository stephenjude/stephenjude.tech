<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Builder;
use Wink\WinkPost;

class SeriesController extends Controller
{
    /**
     * Show blog homepage.
     *
     * @return View
     */
    public function laravelLessons()
    {
        $data = [
            'posts' => WinkPost::with('tags')
                ->live()
                ->whereHas('tags', function (Builder $query) {
                    $query->where('slug', 'laravel-lessons');
                })->orderBy('publish_date', 'DESC')
                ->simplePaginate(12),
            'series_banner' => 'https://i.ibb.co/0GKKZwx/ERAIStf-Xs-AA-u7-X-format-jpg-name-large.jpg',
            'series_title' => 'The Ultimate Revelation of Laravel For Biginners (Laravel Lessons) ',
            'series_description' => 'Learn the fundamentals on how to build web applications with Laravel. Its going to be simple and actionable, definitely a REVELATION!'
        ];

        return view('series', compact('data'));
    }
}
