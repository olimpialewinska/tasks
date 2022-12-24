<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Tasks;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;

class HistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user() == null) {
            return view('new.index');
        } else {
            $taskforme = Tasks::where('exeuser', (Auth::user()->id))->where('status', '!=', 'Do wykonania')->orderBy('date', 'ASC')->get();
            $taskassigned = Tasks::where([
                ['requser', (Auth::user()->id)],
                ['status', '!=', 'Do wykonania'],
                ['exeuser','!=', (Auth::user()->id)]])->orderBy('date', 'ASC')->get();


            return view('history.index')->with('zadaniadlamnie', $taskforme)->with('zadaniadlainnych', $taskassigned);
        }
    }

    public function description(Tasks $task)
    {
        return view('history.description')->with('task', $task);
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
