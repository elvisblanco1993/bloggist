<?php

namespace App\Http\Livewire\Admin\Category;

use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Facades\Log;

class Create extends Component
{
    public $modal, $name;

    public function save()
    {
        $this->validate([
            'name' => 'required|unique:categories,name'
        ]);

        try {
            Category::create([
                'name' => $this->name,
                'slug' => str($this->name)->slug(),
            ]);
            session()->flash('flash.banner', 'Category successfully added!');
            session()->flash('flash.bannerStyle', 'success');
        } catch (\Throwable $th) {
            Log::error($th);
            session()->flash('flash.banner', $th->getMessage());
            session()->flash('flash.bannerStyle', 'danger');
        }
        return redirect()->route('admin.categories');
    }

    public function render()
    {
        return view('livewire.admin.category.create');
    }
}
