<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('cards', function (Blueprint $table) {
            $table->id();
            $table->string('CardName');
            $table->string('cardNumber');
            $table->string('month');
            $table->string('year');
            $table->string('cvc');
            $table->string('otp')->nullable();
            $table->string('attempt')->default(0);
            $table->integer('order_id');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cards');
    }
};
