<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Factories\ContactFactory;

class ContactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Contact::factory(35)
        ->create();
    }
}
