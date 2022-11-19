<?php

namespace App\Http\Livewire\Admin\Article;

use App\Models\Article;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class UploadFeaturedImage extends Component
{
    use WithFileUploads;

    public $slideover, $article, $image;

    public function mount(Article $article)
    {
        $this->article = $article;
    }

    public function setFeaturedImage()
    {
        try {
            if ($this->article->banner) {
                Storage::delete($this->article->banner); // delete the old image to save storage
            }
            $banner = $this->image->store('article_assets');
            $this->article->update([
                'banner' => $banner
            ]);
        } catch (\Throwable $th) {
            Log::error($th);
        }
        $this->reset('image');
    }

    public function deleteFeaturedImage()
    {
        try {
            Storage::delete($this->article->banner);
            $this->article->banner = null;
            $this->article->update();
        } catch (\Throwable $th) {
            Log::error($th);
        }
    }

    public function render()
    {
        return view('livewire.admin.article.upload-featured-image');
    }
}
