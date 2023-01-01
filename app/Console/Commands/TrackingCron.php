<?php

namespace App\Console\Commands;

use App\Libraries\Couriers\DTDC;
use App\Models\Order;
use App\Models\Survay;
use Illuminate\Console\Command;

class TrackingCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tracking:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $orders = Order::where('courier_status', '!=', 'delivered')->get();
        $reference_number = [];
        foreach ($orders as $list) {
            if (!empty($list->response['reference_number']))
                $reference_number[] = $list->response['reference_number'];
        }

        $dtdc = new DTDC();
        $status = $dtdc->tracking($reference_number);

        $this->info('Successfully.');
        return Command::SUCCESS;
    }
}
