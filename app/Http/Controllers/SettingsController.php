<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tasks;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Models\User;
use App\Models\Relations;
use Illuminate\Support\Facades\Validator;

class SettingsController extends Controller
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
        $userdata= User::where('id', Auth::user()->id)->get();
        return view('settings.index')-> with('user', $userdata);
        }
    }

    public function updateuser(Request $userdata)
    {
        $userdata->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $data = request()->all();

        $id=Auth::user()->id;
        $user = User::find($id);
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);
        $user->save();

        return redirect('settings');
    }

    public function deleteuser(User $user)
    {
        $id = Auth::user()->id;
        Tasks::where('requser', Auth::user()->id)->delete();
        Tasks::where('exeuser', Auth::user()->id)->delete();
        Relations::where('user1', Auth::user()->id)->delete();
        Relations::where('user2', Auth::user()->id)->delete();
        User::findOrFail($id)->delete();
      

        return redirect('home');
    }
}
