<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = siswa::all();

        //return $data;
        return response()->json([
            "message" => "load data success",
            "data" => $data
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$data = Siswa::create([
        //    "name" => $request->name,
        //    "gender" => $request->gender,
        //    "age" => $request->age
        //]);

        $data = new Siswa ();
        $data->name = $request->name;
        $data->gender = $request->gender;
        $data->age = $request->age;
        $data->save();

        //return $data;
        return response()->json([
            "message" => "Store success",
            "data" => $data
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Siswa::find($id);
        if($data){
            return $data;
        }else{
            return ["message" => "Data not found"];
        }
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
        $data = Siswa::find($id);
        if($data){
            $data->name = $request->name ? $request->name : $data->name;
            $data->gender = $request->gender ? $request->gender : $data->gender;
            $data->age = $request->age ? $request->age : $data->age;
            $data->save();

            return $data;
        }else{
            return ["message" => "Data not found"];
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
        $data = Siswa::find($id);
        if($data){
            $data->delete();
            return["message" => "Delete succes"];
        }else{
            return["message" => "Data not found"];
        }
    }
}
