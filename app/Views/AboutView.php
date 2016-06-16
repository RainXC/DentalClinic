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

class AboutView
{
    private $settings = [
        'history'     => 'history',
        'recruitment' => 'recruitment',
        'partnership' => 'partnership',
    ];

    private $data = [];

    private function getHistory()
    {
        if ( !isset($this->data['history']) ) {
            $articles = new Article();
            $this->data['history'] = $articles->where('alias', '=', $this->settings['history'])->first();
        }
        return $this->data['history'];
    }

    private function getRecruitment()
    {
        if ( !isset($this->data['recruitment']) ) {
            $articles = new Article();
            $this->data['recruitment'] = $articles->where('alias', '=', $this->settings['recruitment'])->first();
        }
        return $this->data['recruitment'];
    }

    private function getPartnership()
    {
        if ( !isset($this->data['partnership']) ) {
            $articles = new Article();
            $this->data['partnership'] = $articles->where('alias', '=', $this->settings['partnership'])->first();
        }
        return $this->data['partnership'];
    }

    public function printTemplate()
    {
        return View::make('about', [
            'history'     => $this->getHistory(),
            'recruitment' => $this->getRecruitment(),
            'partnership' => $this->getPartnership()
        ]);
    }
}