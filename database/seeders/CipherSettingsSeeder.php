<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CipherSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userId = Session::get('temp_id', function() {
            $uniqueId = 'temp_' . uniqid();
            Session::put('temp_id', $uniqueId); // Store it in session
            return $uniqueId;
        });

        DB::table('cipher_settings')->insert([
            [
                'user_id' => $userId,
                'cipher_id' => 'D0',
                'status' => 1,
                'created_at' => '2024-10-02 14:00:32',
                'updated_at' => '2024-10-03 16:02:02',
            ],
            [
                'user_id' => $userId,
                'cipher_id' => 'D1',
                'status' => 1,
                'created_at' => '2024-10-02 14:00:32',
                'updated_at' => '2024-10-02 17:19:46',
            ],
            [
                'user_id' => $userId,
                'cipher_id' => 'D2',
                'status' => 1,
                'created_at' => '2024-10-02 14:00:32',
                'updated_at' => '2024-10-02 17:19:46',
            ],
            [
                'user_id' => $userId,
                'cipher_id' => 'D3',
                'status' => 1,
                'created_at' => '2024-10-02 14:00:32',
                'updated_at' => '2024-10-02 17:19:46',
            ],
        ]);
    }
}
