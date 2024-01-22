<?php

namespace App\Services;

use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

class FirestoreService 
{
    protected $database;

    public function __construct()
    {
        $firebase = (new Factory)
            ->withServiceAccount(base_path(env('FIREBASE_CREDENTIALS')))
            ->withDatabaseUri(env("FIREBASE_DATABASE_URL"));
        $this->database = $firebase->createDatabase();

    }
   
    public function savePlayer($player)
    {
        $playersRef = $this->database->getReference('players');
        $playersRef->push([
            'name' => $player->name,
            'number' => $player->number,
            'team_name' => $player->team->name,
            'position_code' => $player->position->code
        ]);
    }
}

