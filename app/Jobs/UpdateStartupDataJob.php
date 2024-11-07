<?php

namespace App\Jobs;

use App\Models\Startup;
use App\Helpers\UidHelper;
use App\Helpers\UidupdateHelper;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Redis;

class UpdateStartupDataJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Redis::throttle('key')->allow(10)->every(60)->then(function () {
            $startups = Startup::all(); 

            foreach ($startups as $startup) {
                $startupdata = UidHelper::getUidDetails($startup->unique_id);
                $directors = $startupdata['directors'];
                $products = $startupdata['products'];

                UidupdateHelper::updateuid($startupdata, $directors, $products, $startup);
            }
        }, function () {
            // Could not obtain lock...
            return $this->release(10);
        });

       
    }
}

