<?php

namespace App\Http\Livewire\Web\Category;

use Livewire\Component;
use App\Models\Category;

class Show extends Component
{
    public $category;

    public function mount($category)
    {
        $this->category = Category::where('slug', $category)->with('articles')->firstorfail();
    }

    public function render()
    {
        return view('livewire.web.category.show')
            ->layout('layouts.guest');
    }
}
