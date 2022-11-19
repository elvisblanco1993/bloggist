<?php

namespace App\Http\Livewire\Admin\Article;

use App\Models\Article;
use Livewire\Component;
use Illuminate\Support\Facades\Log;

class Create extends Component
{

    public $title, $body;

    protected $listeners = [
        'markdown-x:update' => 'updateBody',
    ];

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
            $article = Article::create([
                'title' => $this->title,
                'slug' => str($this->title)->slug(),
                'body' => $this->body,
                'time_to_read' => (round(str_word_count($this->body) / 200) == 0) ? 1 : round(str_word_count($this->body) / 200),
                'user_id' => auth()->user()->id
            ]);
            session()->flash('flash.banner', 'Article successfully saved!');
            session()->flash('flash.bannerStyle', 'success');
        } catch (\Throwable $th) {
            Log::error($th);
            session()->flash('flash.banner', $th->getMessage());
            session()->flash('flash.bannerStyle', 'danger');
        }
        return redirect()->route('admin.articles.edit', ['article' => $article->id]);
    }

    public function render()
    {
        return view('livewire.admin.article.create')
            ->layout('layouts.edit-article');
    }
}
