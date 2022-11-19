<?php

namespace App\Http\Livewire\Web\Category;

use Livewire\Component;
use App\Models\Category;

class Aside extends Component
{
    public function render()
    {
        return view('livewire.web.category.aside', [
            'availableCategories' => Category::orderBy('updated_at', 'DESC')->get(),
        ]);
    }
}
