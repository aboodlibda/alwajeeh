<?php

namespace Database\Seeders;

use App\Models\Section;
use Illuminate\Database\Seeder;

class SectionSeeder extends Seeder{
    public function run(): void
    {
        Section::query()->create([
           'category_id' => 1
        ]);
        Section::query()->create([
            'category_id' => 1
        ]);
        Section::query()->create([
            'category_id' => 1
        ]);
        Section::query()->create([
            'category_id' => 1
        ]);
    }
}
