<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeamRequest;
use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function store(TeamRequest $request)
    {
        $team = Team::create($request->all());
        return $team;
    }
}
