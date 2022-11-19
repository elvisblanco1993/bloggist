<?php

namespace App\Http\Livewire\Admin\Subscriber;

use App\Models\Subscriber;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{

    use WithPagination;

    public $q, $subsPerPage;

    public function render()
    {
        return view('livewire.admin.subscriber.index', [
            'subscribers' => Subscriber::where('email', '%like%', $this->q)->orderBy('subscribed_at')->paginate($this->subsPerPage)
        ]);
    }
}
