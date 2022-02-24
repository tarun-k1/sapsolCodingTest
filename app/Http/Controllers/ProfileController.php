<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $user = Auth::user();
        return view('editprofile\update',compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('editprofile.update');
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
     

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Editprofile  $editprofile
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        if(Auth::user()){
            $user= User::find(Auth::user()->id);

            if($user){
                return view('editprofile.update')->withUser($user);
            }else{
                return redirect()->back();
            }
        }
        return view('edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Editprofile  $editprofile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //dd($request);
        $user= User::find(Auth::user()->id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
        ]);
        return redirect('edit')->with('succes',"updated successfully");
        /*if($user){
            $user->name=$request['name'];
            $user->email=$request['email'];

            $user->save();
        }else{
            return redirect()->back();
        }*/
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Editprofile  $editprofile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Editprofile $editprofile)
    {
        //
    }
}
