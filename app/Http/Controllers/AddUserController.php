<?php

namespace App\Http\Controllers;

use App\Models\Relations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\Relation;

class AddUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('adduser.adduser');
    }


    public function add(Request $request)
    {
        $request->validate([
            'nick' => 'required',
        ]);

        $data = request()->all();
        $relation = Relations::where(['nick1' => Auth::user()->nick, 'nick2' => $data['nick']])->count();

        


        if (User::where(['nick' => $data['nick'], 'name' => $data['name']])->count() == 1) {
            $user_id = User::where(['nick' => $data['nick'], 'name' => $data['name']])->first()->id;
            $user_name = User::where(['nick' => $data['nick'], 'name' => $data['name']])->first()->name;
            $user_nick = User::where(['nick' => $data['nick'], 'name' => $data['name']])->first()->nick;
        } else{
        
            session()->flash('Błąd', 'Błędna nazwa lub nick');
            return redirect('/adduser');
        }

        if($relation > 0){
            session()->flash('Błąd', "Osoba $user_name jest już dodana");
            return redirect('/adduser');
        }


        if ($data['nick'] == Auth::user()->nick) {
            session()->flash('Błąd', 'Nie mozna dodać siebie :) ');
            return redirect('/adduser');
        } else {
            
            $relations = new Relations();
            $relations->user1 = Auth::user()->id;
            $relations->user2 = $user_id;
            $relations->nick1 = Auth::user()->nick;
            $relations->nick2 = $user_nick;
            $relations->name1 = Auth::user()->name;
            $relations->name2 = $user_name;
            $relations->save();
            session()->flash('Sukces', "Osoba $user_name została dodana");

            return redirect('/adduser');
        }
    }

    

    
}
