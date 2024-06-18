<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class PyzBookSeeder extends Seeder
{
    public function run()
    {
        DB::table('pyz_books')->insert([
            [
                'name' => 'The Great Gatsby',
                'description' => 'A novel written by American author F. Scott Fitzgerald.',
                'publication_date' => Carbon::create(1925, 4, 10, 0, 0, 0)->toDateTimeString(),
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'name' => 'To Kill a Mockingbird',
                'description' => 'A novel by Harper Lee published in 1960.',
                'publication_date' => Carbon::create(1960, 7, 11, 0, 0, 0)->toDateTimeString(),
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],
            [
                'name' => '1984',
                'description' => 'A dystopian social science fiction novel and cautionary tale by the English writer George Orwell.',
                'publication_date' => Carbon::create(1949, 6, 8, 0, 0, 0)->toDateTimeString(),
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ],
        ]);
    }
}
