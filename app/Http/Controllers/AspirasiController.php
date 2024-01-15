<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AspirasiRequest;
use App\Models\Aspirasi;
use Illuminate\Support\Facades\Redirect;


class AspirasiController extends Controller
{
    public function createAspirasi(AspirasiRequest $request){
        try {
            $aspirasi = new Aspirasi([
                'name'=> $request->input('name'),
                'email'=> $request->input('email'),
                'message'=> $request->input('message'),

            ]);
            $aspirasi->save();
            return Redirect::to('/kotakaspirasi.html')->with('success', 'Aspiration created successfully');
            // return response()->json(['data' => $aspirasi, 'message' => 'Success'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], $e->getCode());
        }
    }

    public function getAspirasi(){
        try {
            $aspirasis = Aspirasi::orderBy('created_at','DESC')->get();

            return view('bankaspirasi', compact('aspirasis'));
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], $e->get());
        }
    }


}
