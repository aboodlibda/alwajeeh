<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('number');
            $table->string('full_name');
            $table->string('phone');
            $table->string('area');
            $table->string('street');
            $table->boolean('is_installment')->default(false);
            $table->string('first_installment')->nullable();
            $table->string('installments_period')->nullable();
            $table->string('monthly_installment')->nullable();
            $table->enum('payment_method',['card','bank'])->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
