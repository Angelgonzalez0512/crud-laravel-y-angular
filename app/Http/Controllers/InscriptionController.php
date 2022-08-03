<?php

namespace App\Http\Controllers;

use App\Models\Inscription;
use Exception;
use Illuminate\Http\Request;

use function Symfony\Component\Translation\t;

class InscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $inscriptions = Inscription::all();
            return response()->json(["success" => true, "data" => $inscriptions], 200);
        } catch (Exception $e) {
            return response()->json(["success" => false, "message" => $e->getMessage()]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $inscription = new Inscription();
            $inscription->name = $request->name;
            $inscription->age = $request->age;
            $inscription->birthdate = $request->birthdate;
            $inscription->inscription_date = $request->inscription_date;
            $inscription->price = $request->price;
            $inscription->save();
            return response()->json(['message' => "Inscription created successfully!", "success" => true]);
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage(), "success" => false]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $inscription = Inscription::find($id);
            
            return response()->json(['data' => $inscription, "success" => true]);
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage(), "success" => false]);
        }
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $inscription = Inscription::find($id);
            $inscription->name = $request->name;
            $inscription->age = $request->age;
            $inscription->birthdate = $request->birthdate;
            $inscription->inscription_date = $request->inscription_date;
            $inscription->price = $request->price;
            $inscription->save();
            return response()->json(['message' => "Inscription updated successfully!", "success" => true]);
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage(), "success" => false]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        try {
            $inscription = Inscription::find($id);
            $inscription->delete();
            return response()->json(['message' => "Inscription deleted successfully!", "success" => true]);
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage(), "success" => false]);
        }
    }
}
