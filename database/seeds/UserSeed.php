<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $email = env('ADMIN_USER_EMAIL', 'admin@home.com');

        (new User)->newQuery()
            ->where('email', $email)
            ->firstOr(['*'], function () use ($email) {
                factory(User::class)->create(compact('email'));
            });
    }
}
