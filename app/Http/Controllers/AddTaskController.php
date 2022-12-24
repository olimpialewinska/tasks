<?php

namespace App\Http\Controllers;

use App\Models\Relations;
use Illuminate\Support\Facades\Auth;
use App\Models\Tasks;
use App\Models\User;
use Illuminate\Http\Request;

class AddTaskController extends Controller
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
        $relations = Relations::where('user1', (Auth::user()->id))->orderBy('name2','asc')->get();
        return view('addtask.index')->with('relations', $relations);
        }
    
    }

    public function add(Request $request){
        if( Auth::user() == null){
            return view('new.index');
        }

        $request->validate([
            'title' => 'required',
            'user' => 'required',
        ]);

        $data = request()->all();

        $task = new Tasks();
        $task->requser = Auth::user()->id;
        $task->requsername = Auth::user()->name;
        $task->exeuser = $data['user'];
        if($data['date'] == null){
            $task->date = " ";
        }
        else{
            $task->date = $data['date'];
        }
        $task->status = "Do wykonania";
        $task->exename = User::where( 'id', $data['user'])->first()->name;
        $task->title = $data['title'];
        $task->description = $data['description'];
        $task->save();

        session()->flash('Sukces', "Zadanie zostało dodane!");

            return redirect('/addtask');
    }
}
