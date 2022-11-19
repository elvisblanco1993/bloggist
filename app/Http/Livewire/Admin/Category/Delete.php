<?php

namespace App\Http\Livewire\Admin\Category;

use Livewire\Component;
use Illuminate\Support\Facades\Log;

class Delete extends Component
{
    public $modal, $category;

    public function delete()
    {
        try {
            $this->category->articles()->detach();
            $this->category->delete();
            session()->flash('flash.banner', 'Category successfully deleted!');
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
        return view('livewire.admin.category.delete');
    }
}
