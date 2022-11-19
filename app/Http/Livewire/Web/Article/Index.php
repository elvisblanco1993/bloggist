<?php

namespace App\Http\Livewire\Web\Article;

use App\Models\Article;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.web.article.index', [
            'articles' => Article::whereNotNull('published_at')
                ->with('categories')
                ->orderBy('published_at', 'DESC')
                ->paginate('12'),
        ]);
    }
}
