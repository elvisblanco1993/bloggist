<?php

namespace App\Http\Livewire\Admin\Article;

use App\Models\Article;
use Livewire\Component;
use Illuminate\Support\Facades\Log;

class Delete extends Component
{
    public $modal, $article;

    public function mount(Article $article)
    {
        $this->article = $article;
    }

    public function delete()
    {
        try {
            $this->article->delete();
            session()->flash('flash.banner', 'Article successfully deleted!');
            session()->flash('flash.bannerStyle', 'success');
        } catch (\Throwable $th) {
            Log::error($th);
            session()->flash('flash.banner', $th->getMessage());
            session()->flash('flash.bannerStyle', 'danger');
        }
        return redirect()->route('admin.articles');
    }

    public function restore()
    {
        try {
            $this->article->restore();
            session()->flash('flash.banner', 'Article successfully restored!');
            session()->flash('flash.bannerStyle', 'success');
        } catch (\Throwable $th) {
            Log::error($th);
            session()->flash('flash.banner', $th->getMessage());
            session()->flash('flash.bannerStyle', 'danger');
        }
        return redirect()->route('admin.articles');
    }

    public function render()
    {
        return view('livewire.admin.article.delete');
    }
}
