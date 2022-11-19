<?php

namespace App\Http\Livewire\Admin\Article;

use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $perPage = 10;

    public function render()
    {
        return view('livewire.admin.article.index', [
            'articles' => auth()->user()->articles()
            ->with('categories')
            ->withTrashed()
            ->orderBy('updated_at', 'DESC')
            ->paginate($this->perPage)
        ]);
    }
}
