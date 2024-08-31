<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    public function run(): void
    {
        Setting::query()->create([
            'whatsapp' => '123456789',
            'email' => 'wajeh@gmail.com',
            'ma3roof' => '',
            'vat' => '',
            'trader_record' => '',
            'bank_account' => 'SA123456789',
        ]);
    }
}
