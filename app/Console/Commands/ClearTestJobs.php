<?php

namespace App\Console\Commands;

use App\Models\WatchJob;
use Illuminate\Console\Command;
use Illuminate\Queue\Jobs\Job;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;

class ClearTestJobs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:clear';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        WatchJob::query()->first()->update(['last_tag_count'=>0]);
        DB::table('notifications')->delete();
    }
}
