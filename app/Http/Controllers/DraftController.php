<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Wink\WinkPost;

class DraftController extends Controller
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
                ->draft()
                ->simplePaginate(12)
        ];
        return view('drafts', compact('data'));
    }


    /**
     * Show a post given a slug.
     *
     * @param string $slug
     * @return View
     */
    public function findPostById($id)
    {

        $post = WinkPost::with('tags')->where('id', $id)->first();

        if ($post) {

            return view('draft', compact('post'));
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
     * Show about blog.
     *
     * @return View
     */
    public function about()
    {
        $meta = [
            'title'   => 'About',
            'description' => 'I am a software developer working primary on PHP and Android applications.',
        ];

        return view('about', compact('meta'));
    }


    /**
     * show email subscription form
     *
     * @return string
     */
    public function newsletter()
    {
        $meta = [
            'title'   => 'Weekly Newsletter',
            'description' => 'Join my weekly newsletter and never miss out on new tutorials, tips, and more.',
        ];

        return view('newsletter', compact('meta'));
    }

    public function seeder()
    {
        $posts = $this->extractJsonData('posts.json');
        $author = $this->extractJsonData('author.json');
        $post_tags = $this->extractJsonData('post_tags.json');
        $tags = $this->extractJsonData('tags.json');
        $migerations = $this->extractJsonData('migerations.json');

        $this->insertData('wink_posts', $posts);
        $this->insertData('wink_authors', $author);
        $this->insertData('migrations', $migerations);
        $this->insertData('wink_tags', $tags);
        $this->insertData('wink_posts_tags', $post_tags);

    }

    private function insertData($table, $data)
    {
       return DB::table($table)->insert($data);
    }

    private function extractJsonData($filename)
    {
        $posts = file_get_contents(public_path($filename));

        $posts = json_decode($posts, true);

        return collect($posts['values'])->map(function ($item, $key) use ($posts) {
            return $item = collect($item)->map(function ($item_deep, $key_deep) use ($posts) {
                return  [$posts['fields'][$key_deep] => $item_deep];
            })->flatMap(function ($value) {
                return $value;
            })->toArray();
        })->toArray();
    }
}
