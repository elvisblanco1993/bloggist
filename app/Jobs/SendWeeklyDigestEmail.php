<?php

namespace App\Jobs;

use App\Models\Article;
use App\Mail\WeeklyDigest;
use App\Models\Subscriber;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendWeeklyDigestEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $subscribers, $articles;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->subscribers = Subscriber::select('email')->get();
        $this->articles = Article::whereBetween('published_at', [
                Carbon::now()->subWeek()->startOfWeek(),
                Carbon::now()->subWeek()->endOfWeek()
            ])->get();

        if ($this->articles->count() > 0) {
            SendWeeklyDigestEmail::dispatch(
                $this->subscribers->toArray(),
                $this->articles
            );
        }
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        foreach ($this->subscribers as $recipient) {
            Mail::to($recipient['email'])->send(new WeeklyDigest($this->articles));
        }
    }
}
