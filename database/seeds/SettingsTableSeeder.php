<?php
use App\Setting;
use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Setting::create([

          'site_name' => "EasyWash",
          'address' => "Fullerton, california",
          'contact_number' => "1234567890",
          'contact_email' => "info@easywash.com"

        ]);
    }
}
