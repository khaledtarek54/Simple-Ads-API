<?php

namespace App\Console\Commands;

use DateTime;
use App\Models\Ad;
use App\Mail\AdRemainder;
use App\Models\Advertiser;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class MailRemainder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail-remainder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send remainder mail at 8:00 for next day Ad start date';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $dayAfter = (new DateTime('now'))->modify('+1 day')->format('Y-m-d');
        $advertisers  = Advertiser::with('ads')->get();
        foreach ($advertisers as $advertiser) {
            foreach ($advertiser->ads as $ad) {
                if ($ad->start_date == $dayAfter) {
                    Mail::to($advertiser->email)->send(new AdRemainder($ad));
                }
            }
        }
    }
}
