<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Game;
use App\Models\User;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $game = new Game();
        $game->title = 'Zelda: Breath of the Wild';
        $game->info = 'Breath of the Wild is an action-adventure game set in an open world where players are tasked with exploring the kingdom of Hyrule while controlling Link.';
        $game->price = '25';
        $game->release_date = '2020-12-21';
        $game->contact_email = 'games@gmail.com';
        $game->contact_phone = '03345981';
        $game->save();

        $game = new Game();
        $game->title = 'Mario Kart';
        $game->info = 'In the Mario Kart series, players compete in go-kart races, controlling one of a selection of characters.';
        $game->price = '16';
        $game->release_date = '2019-01-24';
        $game->contact_email = 'games@gmail.com';
        $game->contact_phone = '03345981';
        $game->save();

        $game = new Game();
        $game->title = 'Undertale';
        $game->info = 'In the game, the player controls a child and completes objectives in order to progress through the story.';
        $game->price = '7';
        $game->release_date = '2016-06-01';
        $game->contact_email = 'games@gmail.com';
        $game->contact_phone = '03345981';
        $game->save();
    }
}

