<?php

namespace App\Http\Controllers\api;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use App\Models\Measurement;  //uvezli smo model kako bismo ga mogli koristiti u kontroleru
use Illuminate\Http\Request;

class MeasurementController extends Controller
{
    public function store(Request $request){
        $measurement = new Measurement;
        $measurement->temperature = $request->temperature;
        $measurement->humidity = $request->humidity;
        $measurement->save();
    }

    public function getLastMeasurement(){
        $measurement = Measurement::latest()->first();

        if (! $measurement) {
            return response()->json([
                'message' => 'No measurements found'
            ], 404);
        }

        return response()->json([
            'temperature' => $measurement->temperature,
            'humidity' => $measurement->humidity,
        ]);
    }
}
