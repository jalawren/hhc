<?php

use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $records = [

            0 => ['name' => 'Jason Lawrence', 'email' => 'jalawren@gmail.com', 'password' => bcrypt('dohc2000')],
            1 => ['name' => 'Justin King', 'email' => 'justin@healthhabitcoach.com', 'password' => bcrypt('H3a1thH@61t')],
        ];

        /**
         * Create the DB entries for the array of users
         *
         */
        foreach($records as $record)
        {
            $this->user->create($record);
        }
    }
}
