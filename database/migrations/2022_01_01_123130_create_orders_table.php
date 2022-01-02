<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->dateTime('shipped_date');
            $table->string('payment_type', 50);
            $table->string('payment_transaction', 50);
            $table->string('payment_ref', 50);
            $table->string('payment_code', 50);
            $table->string('status', 30);
            $table->double('total_discount')->default(0);
            $table->double('total');
            $table->string('note', 100)->nullable();
            $table->foreignId('created_by')->nullable()->constrained('users');
            $table->foreignId('customer_id')->index()->constrained('customers')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
