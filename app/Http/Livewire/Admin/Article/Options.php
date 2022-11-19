<?php

namespace App\Http\Livewire\Admin\Article;

use App\Models\Article;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class Options extends Component
{
    public $slideover, $article;

    public function mount(Article $article)
    {
        $this->article = $article;
        $this->comments = $this->article->comments;
    }

    public function setComments()
    {
        ($this->article->comments == 1)
            ? $this->article->comments = 0
            : $this->article->comments = 1;
        $this->article->update();
    }

    public function render()
    {
        return view('livewire.admin.article.options');
    }
}
