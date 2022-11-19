<?php

namespace App\Http\Livewire\Web\Article;

use App\Models\Article;
use Livewire\Component;
use Livewire\WithPagination;

class Search extends Component
{
    use WithPagination;

    public $term = '';

    public function mount($term)
    {
        $this->term = $term;
    }

    public function render()
    {
        return view('livewire.web.article.search', [
            'articles' => Article::search($this->term)->paginate(9)
        ])->layout('layouts.guest');
    }
}
