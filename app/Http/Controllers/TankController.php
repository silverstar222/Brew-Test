<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tank;

class TankController extends Controller
{
    public function index(Request $request){
        $tanks = Tank::all();
        return response()->json($tanks);
    }
    
    // Brew Beer
    public function brew(Request $request) {
        $tank_id = $request->get('tank_id');
        $amount = $request->get('amount');
        $tank = Tank::find($tank_id);
        $tank->increment('amount', $amount);
        $tank->save();
        $tanks = Tank::all();

        return response()->json($tanks);
    }

    // Move Beer
    public function move(Request $request){
        $source_tank_id = $request->get('source_tank_id');
        $target_tank_id = $request->get('target_tank_id');
        $amount = $request->get('amount');
        $source_tank = Tank::find($source_tank_id);
        $source_amount = $source_tank->amount;
        if(floatval($amount) > floatval($source_amount)){
            echo "error";
            exit;
        }
        $target_tank = Tank::find($target_tank_id);
        $source_tank->decrement('amount', $amount);
        $target_tank->increment('amount', $amount);
        $target_tank->save();

        $tanks = Tank::all();
        return response()->json($tanks);
    }

    // Dump action
    public function dump(Request $request){
        $tank_id = $request->get('tank_id');
        $amount = $request->get('amount');
        $tank = Tank::find($tank_id);
        $source_amount = $tank->amount;
        if(floatval($amount) > floatval($source_amount)){
            echo "error";
            exit;
        }
        $tank->decrement('amount', $amount);
        $tank->save();

        $tanks = Tank::all();
        return response()->json($tanks);
    }

    // Keg action
    public function keg(Request $request){
        $tank_id = $request->get('tank_id');
        $amount = $request->get('amount');
        $tank = Tank::find($tank_id);
        $source_amount = $tank->amount;
        if(floatval($amount) > floatval($source_amount)){
            echo "error";
            exit;
        }
        $tank->decrement('amount', $amount);
        $tank->save();

        $tanks = Tank::all();
        return response()->json($tanks);
    }
}
