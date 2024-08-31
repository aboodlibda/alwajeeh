<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('whatsapp')->nullable();
            $table->string('email')->nullable();
            $table->string('ma3roof')->nullable();
            $table->string('vat')->nullable();
            $table->string('bank_account')->nullable();
            $table->string('trader_record')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
