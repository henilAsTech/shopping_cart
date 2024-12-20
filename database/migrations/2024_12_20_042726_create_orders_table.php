<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->uuid('order_id');
            $table->foreignUuid('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignUuid('product_id')->constrained('products')->onDelete('cascade');
            $table->string('order_number')->unique();
            $table->decimal('amount', 10, 2);
            $table->decimal('gst_amount', 10, 2);
            $table->decimal('total_amount', 10, 2);
            $table->enum('status', ['placed', 'processing', 'out_for_delivery', 'completed','cancelled'])->default('placed');
            $table->enum('payment_method', ['cod', 'card', 'upi'])->default('cod');
            $table->enum('payment_status', ['pending', 'paid', 'unpaid'])->default('pending');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
