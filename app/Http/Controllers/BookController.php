<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Book::all();

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
        $data = new Book ();
        $data->title = $request->title;
        $data->description = $request->description;
        $data->author = $request->author;
        $data->publisher = $request->publisher;
        $data->date_of_issue = $request->date_of_issue;
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
        $data = Book::find($id);
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
        $data = Book::find($id);
        if($data){
            $data->title = $request->title ? $request->title : $data->title;
            $data->description = $request->description ? $request->description : $data->description;
            $data->author = $request->author ? $request->author : $data->author;
            $data->publisher = $request->publisher ? $request->publisher : $data->publisher;
            $data->date_of_issue = $request->date_of_issue ? $request->date_of_issue : $data->date_of_issue;
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
        $data = Book::find($id);
        if($data){
            $data->delete();
            return["message" => "Delete succes"];
        }else{
            return["message" => "Data not found"];
        }
    }
}
