<?php

namespace App\Http\Controllers;

use App\Models\Relations;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if( Auth::user() == null){
            return view('new.index');
        }
        else{
            $relations = Relations::where('user1', (Auth::user()->id))->orderBy('name2', 'ASC')->get();
            return view('users.index')->with('relations', $relations);
        }
        
    }

    public function deleterel(Relations $relations)
    {
        $relations->delete();
        return redirect('/users');
    }

    

}
