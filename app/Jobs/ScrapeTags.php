<?php

namespace App\Jobs;

use App\Models\WatchJob;
use App\Notifications\ContentFound;
use App\Notifications\NewContentFound;
use Exception;
use GuzzleHttp\Client;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Notification;

class ScrapeTags implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    protected  $watchJob;
    public function __construct(WatchJob $watchJob)
    {
        //
        $this->watchJob = $watchJob;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        //
        $client = new Client();

        $url = $this->watchJob->url;

        $tags = $this->watchJob->tags;

        Log::info('scraping');

        try {
            $response = $client->get($url);
            $responseBody = $response->getBody()->getContents();

            $newFoundTagsTotalCount = 0;

            foreach ($tags as $tag){
                $tagCount = substr_count($responseBody,$tag);

                $newFoundTagsTotalCount+=$tagCount;
            }


            if($this->watchJob->last_tag_count==0 && 0<$newFoundTagsTotalCount){

                $this->watchJob->update(['last_tag_count'=>$newFoundTagsTotalCount]);

                if($this->watchJob->user->notification)
                    Notification::send([$this->watchJob->user], new ContentFound($this->watchJob));
            }

            if($this->watchJob->last_tag_count!=$newFoundTagsTotalCount && $this->watchJob->last_tag_count!=0){
                $this->watchJob->update(['last_tag_count'=>$newFoundTagsTotalCount]);

                if($this->watchJob->user->notification)
                    Notification::send([$this->watchJob->user], new NewContentFound($this->watchJob));
            }
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }

    }
}
