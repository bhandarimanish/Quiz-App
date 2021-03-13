<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $admin= new User;
        $admin->name="admin";
        $admin->email="vandarymannis0@gmail.com";
        $admin->password=bcrypt('12345678');
        $admin->visible_password="12345678";
        $admin->email_verified_at=now();
        $admin->occupation="CEO";
        $admin->address="Pepsicola";
        $admin->phone="9861167109";
        $admin->is_admin=1;
        $admin->save();
    }
}
