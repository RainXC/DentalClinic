<?php
/**
 * Created by PhpStorm.
 * User: rainx_000
 * Date: 29.02.2016
 * Time: 21:37
 */

namespace App\Views;

use App\Article\Models\Article;
use Illuminate\Support\Facades\View;

class IndexView
{
    private $settings = [
        'mainArticle' => 'forMainPage'
    ];

    private $mainArticle;

    private function getMainArticle()
    {
        if ( !$this->mainArticle ) {
            $articles = new Article();
            $this->mainArticle = $articles->where('alias', '=', $this->settings['mainArticle'])->first();
        }
        return $this->mainArticle;
    }

    public function printTemplate()
    {
        return View::make('welcome', [
            'mainArticle' => $this->getMainArticle()
        ]);
    }
}