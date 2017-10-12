<?php

use Illuminate\Database\Seeder;
use App\Models\Item;

class DatabaseSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        // $this->call(UsersTableSeeder::class);
        $this->call(ItemsSeeder::class);
    }

}

class ItemsSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    
    public function run() {
        DB::table('Items')->delete();
        Item::create([
            'title'        => 'First item', 
            'slug'         => 'first-item',
            'excerpt'      => '<b>First Item body</b>',
            'content'      => '<b>Content First Item body</b>',
            'published'    => true,
            //'published_at' => DB::raw('NOW'), // DateTime
            'published_at' => DB::raw('CURRENT_TIMESTAMP'), //TimeStamp
        ]);
        Item::create([
            'title'        => 'Second item',
            'slug'         => 'Second-item',
            'excerpt'      => '<b>Second Item body </b>',
            'content'      => '<b>Second First Item body </b>',
            'published'    => false,
            //'published_at' => DB::raw('NOW'), // DateTime
            'published_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
        Item::create([
            'title'        => 'Third item',
            'slug'         => 'Third-item',
            'excerpt'      => '<b>Third Item body</b>',
            'content'      => '<b>Third First  Item body</b>',
            'published'    => false,
            //'published_at' => DB::raw('NOW'), 
            'published_at' => DB::raw('CURRENT_TIMESTAMP'),
        ]);
    }

}
