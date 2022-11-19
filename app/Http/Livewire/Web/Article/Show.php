<?php

namespace App\Http\Livewire\Web\Article;

use App\Models\Article;
use Livewire\Component;

class Show extends Component
{
    public $article;

    public function mount($article)
    {
        $this->article = Article::where('slug', $article)->firstorfail();
    }

    public function render()
    {
        return view('livewire.web.article.show')
            ->layout('layouts.article', [
                'title' => $this->article->title,
                'excerpt' => $this->article->excerpt,
                'image' => $this->article->banner,
                'comments' => $this->article->comments,
            ]);
    }
}
