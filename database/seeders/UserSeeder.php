<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class UserSeeder extends Seeder
{
    public function run()
    {
        $decodedJson = json_decode(file_get_contents('database/seeders/users.json'));

        foreach ($decodedJson->users as  $user) {
            User::query()->create([
                'id' => $user->id,
                'balance' => $user->balance,
                'currency' => $user->currency,
                'email' => $user->email,
                'created_at' => Carbon::createFromFormat('d/m/Y', $user->created_at)->format('Y-m-d'),
            ]);
        }
    }
}
