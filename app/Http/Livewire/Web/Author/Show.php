<?php

namespace App\Http\Livewire\Web\Author;

use App\Models\User;
use Livewire\Component;

class Show extends Component
{
    public $author;

    public function mount($author)
    {
        $this->author = User::where('slug', $author)->with('articles')->firstorfail();
    }

    public function render()
    {
        return view('livewire.web.author.show')
            ->layout('layouts.guest');
    }
}
