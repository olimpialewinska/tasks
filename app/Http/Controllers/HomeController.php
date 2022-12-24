<?php

namespace App\Http\Controllers;

use Illuminate\Console\View\Components\Task;
use App\Models\Tasks;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user() == null) {
            return view('new.index');
        } else {
            $task = Tasks::where('exeuser', (Auth::user()->id))->where('status','Do wykonania')->orderBy('date', 'ASC')->get();
            return view('home')->with('zadania', $task);
        }
    }


    public function delete(Tasks $task)
    {
        $task->status = "Odrzucono";
        $task->save();
        session()->flash('Błąd', 'Zadanie zostało odrzucone');
        return redirect('home');
    }
    
    public function edit(Tasks $task)
    {
        return view('home.edit')->with('task', $task);
    }

    public function update(Tasks $task)
    {
        
        try {
            $this->validate(request(), [
                'title' => ['required'],
                'description' => ['required'],
           
            ]);
        } catch (ValidationException $e) {
        }

        $data = request()->all();

       
        $task->title = $data['title'];
        if($data['date']== null){
            $task->date = "";
        }
        else{
            $task->date = $data['date'];
        }
    
        $task->description = $data['description'];
        $task->save();

        session()->flash('Sukces', 'Zaakualizowano zadanie');

        return redirect('home');
    }

    public function done(Tasks $task)
    {
        $task->status = "Wykonano";
        $task->save();
        session()->flash('Sukces', 'Zadanie zostało wykonane');
        return redirect('home');

    }
}
