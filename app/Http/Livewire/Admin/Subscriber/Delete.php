<?php

namespace App\Http\Livewire\Admin\Subscriber;

use Livewire\Component;
use Illuminate\Support\Facades\Log;

class Delete extends Component
{
    public $modal, $subscriber;

    public function delete()
    {
        try {
            $this->subscriber->delete();
            session()->flash('flash.banner', 'Subscriber successfully deleted!');
            session()->flash('flash.bannerStyle', 'success');
        } catch (\Throwable $th) {
            Log::error($th);
            session()->flash('flash.banner', $th->getMessage());
            session()->flash('flash.bannerStyle', 'danger');
        }
        return redirect()->route('admin.subscribers');
    }

    public function render()
    {
        return view('livewire.admin.subscriber.delete');
    }
}
