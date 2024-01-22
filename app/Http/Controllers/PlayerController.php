<?php

namespace App\Http\Controllers;

use App\Http\Requests\PlayerRequest;
use App\Models\Player;

/**
 * @group Players
 * APIs for Players
 */
class PlayerController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/players",
     *     tags={"Players"},
     *     summary="Get a list of players",
     *     @OA\Parameter(
     *         name="page",
     *         in="query",
     *         required=false,
     *         description="Page number for pagination",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Parameter(
     *         name="limit",
     *         in="query",
     *         required=false,
     *         description="Number of items per page",
     *         @OA\Schema(type="integer", default="10")
     *     ),
     *     @OA\Response(response=200, description="Successful operation")
     * )
     */
    public function index()
    {
        $limit = request('limit', 10);
        $players = Player::paginate($limit);
        return response()->json($players);
    }
    /**
     * @OA\Get(
     *     path="/api/players/{id}",
     *     summary="Get a player by ID",
     *     tags={"Players"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="Player ID",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(response=200, description="Successful operation"),
     *     @OA\Response(response=404, description="Player not found")
     * )
     */
    public function show($id)
    {
        $player = Player::findOrFail($id);
        return response()->json($player);
    }

    /**
     * @OA\Post(
     *     path="/api/players",
     *     summary="Create a new player",
     *     tags={"Players"},
     *     @OA\RequestBody(
     *         description="Player data",
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 type="object",
     *                 @OA\Property(property="name", type="string"),
     *                 @OA\Property(property="number", type="integer"),
     *                 @OA\Property(property="team_id", type="integer"),
     *                 @OA\Property(property="position_id", type="integer"),
     *             )
     *         )
     *     ),
     *     @OA\Response(response=201, description="Player created"),
     *     @OA\Response(response=422, description="Validation error")
     * )
     */

    public function store(PlayerRequest $request)
    {
        $player = Player::create($request->all());
        return response()->json($player, 201);
    }
}
