<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
        return view('users.index')->with('users',User::all());
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $user = DB::table('users')->where('id',$id)->first();
            return view('users.edit',compact('user'));
        // return $id;
        //                                      compact
        // return view('users.protfile',['user' =>$user]);
    }

    public function update(Request $request,$id)
    {
        DB::table('users')->where('id',$id)->update(
            [
                    'name' => $request->name,
                    'password' => $request->password,
                    'user_description' => $request->user_description,
            ]
        );
        // return response('تم تعديل البيانات بنجاح');
        // return redirect()->route('users.edit');
        return back();
        //  $id
        // $user = User::findOrFail(auth()->user()->id);
        // return $id;
        // $user->update([
        //     // 'address' => $request->address,
        //     'name' => $request->name,
        //     'password' => $request->password,
        //     'user_description' => $request->user_description,
        // ]);

        // // $user->save();

        // session()->flash('uploaded','تم التعديل بنجاح');
        // return back();
        // return redirect('user');
    }

    public function destroy($id)
    {
        //
    }
}
