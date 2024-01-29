<?php

namespace App\Http\Controllers;

use App\Models\Chirp;
use Illuminate\Http\Request;
use Validator;

class ChirpController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'status' => 200,
            'chirps' => Chirp::all(),
        ];
        return response()->json($data, 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator:: make($request->all(),[
            'message' => 'required',
        ]);

        if($validator -> fails()){
            $data = [
                'status' => 422,
                'message' => $validator->messages(),
            ];
            return response()->json($data, 422);
        }
        else{
            $chirp = new Chirp;
            $chirp->message = $request->message;
            $chirp->user_id = $request->user_id;
            $chirp->save();

            $data = [
                'status' => 200,
                'message' => "Message saved successfully.",
            ];
            return response()->json($data,200);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Chirp $chirp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Chirp $chirp)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Chirp $chirp)
    {
        $validator = Validator:: make($request->all(),[
            'message' => 'required',
        ]);

        if($validator -> fails()){
            $data = [
                'status' => 422,
                'message' => $validator->messages(),
            ];
            return response()->json($data, 422);
        }
        else{
            $chirp = Chirp::find($chirp->id);
            $chirp->message = $request->message;
            $chirp->user_id = $request->user_id;
            $chirp->save();

            $data = [
                'status' => 200,
                'message' => "Message updated successfully.",
            ];
            return response()->json($data,200);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chirp $chirp)
    {
        // return $chirp;
        $chirp = Chirp::find($chirp->id);
        $chirp -> delete();
        
        $data = [
            'status' => 200,
            "message" => "data deleted Successfully."
        ];
        return response()->json([
            $data,
            200
        ]);
    }
}
