<?php

namespace App\Http\Controllers\API;

use App\Board;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Card;
use App\Board_list;

class CardController extends Controller
{
    public function store(Request $request, $board_id, $list_id)
    {
        $validate = Validator::make($request->all(), [
            'task' => 'required',
        ]);
        if ($validate->fails()) {
            return response()->json(['message' => 'invalid field', 'errors' => $validate->messages()], 422);
        }
        $list = Board_List::where('board_id', $board_id);
        $card = new Card;
        $card->list_id = $list_id;
        $card->order = "0";
        $card->task = $request->task;
        $card->save();
        return response()->json(['message' => 'create card success'], 200);
    }
    public function update(Request $request, $board_id, $list_id, $card_id)
    {
    }
    public function destroy($board_id, $list_id, $card_id)
    {
    }
    public function up(Request $request, $card_id)
    {
    }
    public function down(Request $request, $card_id)
    {
    }
    public function move(Request $request, $card_id, $list_id)
    {
    }
}
