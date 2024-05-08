<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('backend.pages.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles  = Role::all();
        return view('backend.pages.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
    // Validation Data
    $request->validate([
        'name' => 'required|max:50',
        'email' => 'required|max:100|email|unique:users',
        'password' => 'required|min:3|confirmed',
        'phone_number' => 'required|max:20',
        'clinic_id' => 'required|max:50',
        'address' => 'required|max:255',
        'city' => 'required|max:255',
        'active' => 'required|boolean',
    ]);

    // Create New User
    $user = new User();
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = Hash::make($request->password);
    $user->phone_number = $request->phone_number;
    $user->clinic_id = $request->clinic_id;
    $user->address = $request->address;
    $user->city = $request->city;
    $user->active = $request->active;
    $user->profile_picture = "";
    $user->role_id = 3;


    // // Upload Profile Picture
    // if ($request->hasFile('profile_picture')) {
    //     $image = $request->file('profile_picture');
    //     $fileName = time() . '.' . $image->getClientOriginalExtension();
    //     $image->move(public_path('uploads/profiles'), $fileName);
    //     $user->profile_picture = $fileName;
    // }

    $user->save();

    if ($request->roles) {
        $user->assignRole($request->roles);
    }

    session()->flash('success', 'User has been created !!');
    return redirect()->route('admin.users.index');
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
        $user = User::find($id);
        $roles  = Role::all();
        return view('backend.pages.users.edit', compact('user', 'roles'));
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
        // Create New User
        $user = User::find($id);

        // Validation Data
        $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|max:100|email|unique:users,email,' . $id,
            'password' => 'nullable|min:6|confirmed',
        ]);


        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        $user->save();

        $user->roles()->detach();
        if ($request->roles) {
            $user->assignRole($request->roles);
        }

        session()->flash('success', 'User has been updated !!');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if (!is_null($user)) {
            $user->delete();
        }

        session()->flash('success', 'User has been deleted !!');
        return back();
    }
}
