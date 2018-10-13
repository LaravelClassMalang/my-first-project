<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pagination = 10;

        // filtering
        $users = User::query();
        // jika parameter nama diisi, maka lakukan pencarian berdasrkan nama
        if( isset($request->name) AND $request->name != '')
        {
            //equals
            //$users->where('name', '=', $request);
            
            // LIKE
            $users->where('name', 'LIKE', '%'.$request->name.'%');
        }
        // $users->when( isset($request->name) AND $request->name != '', function($query) use ($request)
        // {
        //     $users->where('name', 'LIKE', '%'.$request->name.'%');
        // });
        
        $users = $users->paginate( $pagination );

        // Without pagination
        //$users      = User::paginate($pagination);

        // Support Pagination
        // $pagination = 5;
        // $users      = User::paginate($pagination);

        // numbering
        $number = 1;
        if ( request()->has('page') && request()->get('page') > 1) {
            $number += (request()->get('page') - 1) * $pagination;
        }

        return view('users.index', compact('users', 'number'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'      => 'required',
            'email'     => 'required|unique:users,email',
            'password'  => 'confirmed'
        ]);

        //$request['password'] = bcrypt($request->password);
        // Cara pertama --> quick way
        // User::create($request->except('_token'));

        // Cara Kedua --> custom
        $user = New User();
        $user->name     = $request->name;
        $user->email    = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);

        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // GET data by id
        $user = User::find($id);
        // return to view
        return view('users.edit', compact('user'));
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
        $request->validate([
            'name'      => 'required',
            'email'     => 'required|unique:users,email,'.$id,
            'password'  => 'confirmed'
        ]);
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
