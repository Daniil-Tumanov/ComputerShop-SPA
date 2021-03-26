<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Products;

class mainController extends Controller
{
    public function products(){
        return response()->json(Products::paginate(6));
    }

    public function productById($id){
        $notes = Products::find($id);
        if(is_null($notes)){
            return response()->json(['status code' => 404, 'status text' => 'Note not found', 'message' => 'Note not found'], 404);
        }
        return response()->json([$notes], 200);
    }
    // public function searchByNote(Request $req){
    //     $data = $req->get('query');
    //     $search = Products::where('title', 'like', "%$data%")
    //                 ->orWhere('content', 'like', "%$data%")
    //                 ->get();
    //     if($search->isEmpty()){
    //         return response()->json(['status code' => 404,'status text' => 'Notes not found'], 404);
    //         }
    //         return response()->json(['status code' => 200,'status text' => 'Found notes', 'Notes' => $search], 200);
    // }
}
