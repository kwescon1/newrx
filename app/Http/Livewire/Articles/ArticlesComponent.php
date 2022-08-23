<?php

namespace App\Http\Livewire\Articles;

use App\Models\Article;
use Livewire\Component;

class ArticlesComponent extends Component
{
    // protected $listeners = ['refreshComponent' => '$refresh'];

    public $updateMode = true, $slug;

    public function render()
    {
        $articles = Article::latest()->get();

        return view('livewire.articles.articles-component', ['articles' => $articles])->layout('layouts.app');
    }
}
