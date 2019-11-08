<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Carbon;
use Wink\WinkPost;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->describe('Display an inspiring quote');

Artisan::command('generate:feed', function () {

    $this->info("Generating RSS Feed");

    // It is important that you sort by the latest post

    $posts = WinkPost::live()->get();

    $site = [

        'name' => 'stephenjude.tech', // Simplest Web

        'url' => 'http://stephenjude.tech/rss.xml', // Link to your rss.xml.

        'description' => 'I build for the next billion users',

        'language' => 'en', // eg. en, en-IN, jp

        'lastBuildDate' => ($posts[0]->published_date ?? Carbon::today())->format(DateTime::RSS),
        // This generates the latest posts date in RSS compatible format

    ];


    // Passes posts and site data into the rss.blade.view, out comes text in rss format

    $rssFileContents = view('rss', compact('posts', 'site'));

    // Saves the generated rss feed into a file called rss.xml in the public folder

    file_put_contents(public_path('rss.xml'), $rssFileContents);

    $this->info("Completed");
});

Artisan::command('generate:index', function () {

    $this->info("Indexing articles");

    $data = collect(WinkPost::live()
            ->orderBy('publish_date', 'DESC')
            ->get())->map(function ($item, $key) {
            return [
                "title" => $item->title,
                "link" => post_url($item->slug),
                "snippet" => $item->excerpt
            ];
        });

        $index_json_path = public_path('index.json');

        file_put_contents($index_json_path, $data->toJson());

    $this->info("All live aricles have been indexed.");
});

