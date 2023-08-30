<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

class GenresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $genres = [
            "Action-Adventure",
            "Metroidvania",
            "Stealth-Based Game",
            "Survival Sandbox",
            "Survival Horror",
            "Platform Game (Platformer)",
            "Cinematic Platform Game",
            "Elimination Platformer",
            "Puzzle Platformer",
            "Run-and-Gun",
            "Beat 'em Up",
            "Hack and Slash",
            "Stylish Action",
            "Fighting Game",
            "Mascot Fighter",
            "Platform Fighter",
            "First-Person Shooter (FPS)",
            "Hero Shooter",
            "Light Gun Game",
            "Rail Shooter",
            "Shoot 'em Up (Shmups)",
            "Bullet Hell",
            "Cute 'em Up",
            "Horizontal Scrolling Shooter",
            "Vertical Scrolling Shooter",
            "Tactical Shooter",
            "Third-Person Shooter (3PS/TPS)",
            "Vehicular Combat",
            "Environmental Narrative Game",
            "Full Motion Video (Interactive Movie)",
            "Interactive Fiction",
            "Point-and-Click Game",
            "Room Escape Game",
            "Romance Game",
            "Dating Sim",
            "Visual Novel",
            "Breaking Out",
            "Card Battle Game",
            "Casual Video Game",
            "Endless Running Game",
            "Exergaming",
            "Hidden Object Game",
            "Match-Three Game",
            "Minigame Game",
            "Party Game",
            "Virtual Paper Doll",
            "Digging Game",
            "Digital Pinball Tables",
            "Edutainment Game",
            "Escort Game",
            "Idle Game",
            "Mad Marble Maze",
            "Maze Game ",
            "Multiplayer Online Battle Arena (MOBA)",
            "Pop Up Video Games",
            "Programming Game",
            "Puzzle Game",
            "Bizarre Puzzle Game",
            "Teamwork Puzzle Game",
            "Falling Blocks",
            "Racing Game",
            "Mascot Racer",
            "Rising Up The Food Chain Game",
            "Rhythm Game",
            "Role-Playing Game (RPG) — see also Tabletop Games (Tabletop RPG)",
            "Action RPG",
            "Eastern RPG",
            "Multi-User Dungeon (MUD) and MOO",
            "Massively Multiplayer Online Role-Playing Game (MMORPG)",
            "MUCK",
            "MUSH (Multi User Shared Hallucination)",
            "Roguelike",
            "Strategy RPG (SRPG)",
            "Western RPG",
            "Simulation Game (Sim)",
            "Construction and Management Games",
            "Driving Game",
            "Immersive Sim",
            "Life Simulation Game",
            "Raising Sim",
            "Virtual Pet",
            "Sports Game",
            "Wrestling Game",
            "Strategy Game",
            "4X (4X)",
            "Artillery Game",
            "Real-Time Strategy (RTS)",
            "Space-Management Game",
            "Time Management Game",
            "Tower Defense",
            "Turn-Based Strategy (TBS)",
            "Turn-Based Tactics"
        ];

        $insertData = [];

        foreach ($genres as $genre) {
            $insertModel['title'] = $genre;
            $insertModel['created_at'] = Date::now();
            $insertModel['updated_at'] = Date::now();

            $insertData[] = $insertModel;
        }

        DB::table('genres')->insert($insertData);
    }
}
