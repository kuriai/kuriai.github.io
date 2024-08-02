<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PostCodeMaster;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

// database/seeders/PrefecturesTableSeeder.php
class PostCodeMasterSeeder extends Seeder
{
    function run()
    {
        $file = fopen(base_path('database/postcode/postcode.txt'), 'r');

        while (($data = fgetcsv($file)) !== FALSE) {
            PostCodeMaster::create([
                'post_code' => $data[0],
                'prefecture_code' => $data[1],
                'city_code' => $data[3],
                'region_name' => $data[4],
                'block_number' => $data[5],
                'delete_flg'=> false,

            ]);
        }

        fclose($file);
    }
}
