<?php

namespace App\Http\Livewire\Admin\Article;

use App\Models\Article;
use Livewire\Component;
use Illuminate\Support\Facades\Log;

class Edit extends Component
{
    public $article, $status;

    protected $listeners = [
        'markdown-x:update' => 'updateBody',
    ];

    public function mount(Article $article)
    {
        $this->article = $article;
        $this->title = $this->article->title;
        $this->body = $this->article->body;
        $this->status = (is_null($this->article->published_at)) ? 'draft' : 'published';
    }

    public function updateBody($value)
    {
        $this->body = $value;
    }

    public function save()
    {
        $this->validate([
            'title' => 'required',
            'body' => 'required'
        ]);
        try {
            $this->article->update([
                'title' => $this->title,
                'slug' => str($this->title)->slug(),
                'body' => $this->body,
                'time_to_read' => (round(str_word_count($this->body) / 200) == 0) ? 1 : round(str_word_count($this->body) / 200),
                'user_id' => auth()->user()->id,
                'published_at' => ($this->status == 'draft') ? null : now(),
            ]);
            session()->flash('flash.banner', 'Article successfully saved!');
            session()->flash('flash.bannerStyle', 'success');
        } catch (\Throwable $th) {
            Log::error($th);
            session()->flash('flash.banner', $th->getMessage());
            session()->flash('flash.bannerStyle', 'danger');
        }
        return redirect()->route('admin.articles.edit', ['article' => $this->article->id]);
    }

    public function render()
    {
        return view('livewire.admin.article.edit')
            ->layout('layouts.edit-article');
    }
}
