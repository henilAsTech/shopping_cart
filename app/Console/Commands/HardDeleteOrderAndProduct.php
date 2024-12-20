<?php

namespace App\Console\Commands;

use App\Models\Product;
use App\Services\OrderService;
use App\Services\ProductService;
use Carbon\Carbon;
use Illuminate\Console\Command;

class HardDeleteOrderAndProduct extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:hard-delete-order-and-product';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */

    public function __construct(
        protected OrderService $orderService,
        protected ProductService $productService,
    )
    {
        parent::__construct();
    }

    public function handle()
    {
        $tenMinutesAgo = Carbon::now()->subMinutes(10);
        
        $products = $this->productService->getTrashed();
        foreach ($products as $product) {
            if ($product->deleted_at <= $tenMinutesAgo) {
                $product->forceDelete();
            }
        }

        $orders = $this->orderService->deletedOrder();
        foreach ($orders as $order) {
            if ($orders->deleted_at <= $tenMinutesAgo) {
                $orders->forceDelete();
            }
        }
    }
}
