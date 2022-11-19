<?php

namespace App\Http\Livewire\Admin\Article;

use App\Models\Article;
use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Facades\Log;

class ManageCategories extends Component
{
    public $article, $newCategory, $available_categories = [];

    public function mount(Article $article)
    {
        $this->article = $article;
    }

    public function addCategory()
    {
        try {
            Category::create([
                'name' => $this->newCategory,
                'slug' => str($this->newCategory)->slug(),
            ]);
        } catch (\Throwable $th) {
            Log::error($th);
        }
        $this->reset('newCategory');
    }

    public function syncCategories($category)
    {
        try {
            if ($this->article->categories->where('id', $category)->count() == 1) {
                $this->article->categories()->detach([$category]);
            } else {
                $this->article->categories()->attach([$category]);
            }
        } catch (\Throwable $th) {
            Log::error($th);
        }
    }

    public function render()
    {
        return view('livewire.admin.article.manage-categories', [
            'categories' => Category::orderBy('created_at', 'DESC')->get()
        ]);
    }
}
