<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Author::all();

        // return $data;
        return response()->json([
            'message' => 'Load data success',
            'data' => $data
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
        $table = new Author();
        $table->name = $request->name;
        $table->email = $request->email;
        $table->save();

        // return $table;
        return response()->json([
            'message' => 'Store success',
            'data' => $table
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
        $table = Author::find($id);
        if($table) {
            return $table;
        }else {
            return ['message' => 'Data not found'];
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
        $table = Author::find($id);
        if($table) {
            $table->name = $request->name ? $request->name : $table->name;
            $table->email = $request->email ? $request->email : $table->email;
            $table->save();

            return $table;
        }else {
            return ['message' => 'Data not found'];
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
        $table = Author::find($id);
        if($table) {
            $table->delete();
            return ['message' => 'Delete success'];
        }else {
            return ['message' => 'Data not found'];
        }
    }
}