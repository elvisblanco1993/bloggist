<?php

namespace App\Http\Livewire\Web\Subscriber;

use App\Models\Subscriber;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class Form extends Component
{
    public $email, $subscribed = '';

    public function render()
    {
        return view('livewire.web.subscriber.form');
    }

    public function save()
    {
        $this->validate([
            'email' => 'required|email|unique:subscribers,email'
        ]);

        try {
            Subscriber::create([
                'email' => $this->email,
                'subscribed_at' => now(),
            ]);
            $this->subscribed = 'success';
            $this->reset('email');
        } catch (\Throwable $th) {
            Log::error($th);
        }
    }
}
