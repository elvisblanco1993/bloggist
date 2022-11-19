<?php

namespace App\Http\Livewire\Web\Article;

use App\Models\Article;
use App\Models\Category;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.web.article.index', [
            'articles' => Article::whereNotNull('published_at')
                ->with('categories')
                ->orderBy('published_at', 'DESC')
                ->paginate('25'),
        ]);
    }
}
