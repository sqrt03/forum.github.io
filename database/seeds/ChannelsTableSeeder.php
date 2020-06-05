<?php

use Illuminate\Database\Seeder;

use App\Channel;

class ChannelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Channel::create([
            'name' => 'Wordpress 5.4.1',
            'slug' => Str::slug('Wordpress 5.4.1')
        ]);

        Channel::create([
            'name' => 'Node Js',
            'slug' => Str::slug('Node Js')
        ]);

        Channel::create([
            'name' => 'Laravel 7.x',
            'slug' => Str::slug('Laravel 7.x')
        ]);

        Channel::create([
            'name' => 'Vue Js 3',
            'slug' => Str::slug('Vue Js 3')
        ]);

    }
}
