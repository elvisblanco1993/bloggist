<?php

namespace App\Http\Livewire\Web\Article;

use Livewire\Component;

class Query extends Component
{
    public $term;

    public function search()
    {
        return redirect()->route('articles.search', [
            'term' => $this->term
        ]);
    }

    public function render()
    {
        return view('livewire.web.article.query');
    }
}
