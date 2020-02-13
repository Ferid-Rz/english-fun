<?php

use Illuminate\Database\Seeder;
use Rap2hpoutre\FastExcel\FastExcel;
use App\Word;

class DatabaseSeeder extends Seeder
{
    const FILE = 'vehicles_list.xlsx';
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Word::truncate();

        $filePath = base_path(self::FILE);
        $collection = (new FastExcel)->import($filePath);

        foreach ($collection as $key => $value) {
            $word = $value['word'];

            Word::firstOrCreate([
                'word' => $word,
            ]);

        }
    }
}
