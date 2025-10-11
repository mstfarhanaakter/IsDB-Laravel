<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class JsonCrudController extends Controller
{
    //json file read
   public function index(){
    $data = json_decode(Storage::get('data.json'), true);
    return view ('users.index', compact('data'));

   }
    // new user form 
    public function create(){
        return view('users.create');
    }

    //new user preserve

    public function store(Request $request){
        $users = json_decode(Storage::get('data.json'), true);
        
        $newUser = [
            '$id' => count($users)+1,
            '$name' => $request->name,
            '$email' => $request->email

        ];
        $users [] = $newUser;
        Storage::put('data.json', json_encode($users, JSON_PRETTY_PRINT));
        return redirect()->route('users.index');
    }
}
