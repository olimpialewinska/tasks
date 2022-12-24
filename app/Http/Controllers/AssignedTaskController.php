<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tasks;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;

class AssignedTaskController extends Controller
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
        $task = Tasks::where('requser', (Auth::user()->id))->where('exeuser','!=', (Auth::user()->id))->where('status','Do wykonania')->orderBy('date', 'ASC')->get();    
        return view('assignedtask.assignedtask')->with('zadania', $task);
        }
    }

    public function deleteassigned(Tasks $task)
    {
        $task->status="Usunięte przez nadawcę";
        $task->save();
        return redirect('/assignedtask');
    }

    public function editassigned(Tasks $task)
    {
        return view('assignedtask.edit')->with('task', $task);
    }

    public function updateassigned(Tasks $task)
    {
        
        try {
            $this->validate(request(), [
                'title' => ['required'],
                'description' => ['required'],
           
            ]);
        } catch (ValidationException $e) {
        }

        $data = request()->all();

        $name= $task->exename;

       
        $task->title = $data['title'];
        if( $data['date'] == null)
        {
            $task->date = " ";
        }
        else{
            $task->date = $data['date'];
        }
       
        $task->description = $data['description'];
        $task->save();

        session()->flash('Sukces', "Zadanie dla $name zostało zaaktualizowane");

        return redirect('/assignedtask');
    }

}
