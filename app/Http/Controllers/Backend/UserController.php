<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function manage(){
        $show_data = User::all();
        return view('backend.user.manage', compact('show_data'));
    }

    public function add(){
        return view('backend.user.add');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|string|max:200',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'string|max:15',
            'password' => 'required|string|min:6',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password)
        ]);

        Toastr()->success('User created successfully', 'Success', ['options']);
        return redirect()->route('user.manage');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('backend.user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:200',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'phone' => 'string|max:15',
            'password' => 'nullable|string|min:6',
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        $user->save();

        toastr()->success('User updated successfully', 'Success');
        return redirect()->route('user.manage');
    }

    public function toggleStatus($id)
    {
        $user = User::findOrFail($id);
        $user->status = !$user->status;
        $user->save();

        toastr()->success('User status updated successfully', 'Success');
        return redirect()->route('user.manage');
    }

    public function delete($id)
    {
        $userCount = User::count();

        if ($userCount <= 1) {
            toastr()->error('Cannot delete the last user!', 'Error');
            return redirect()->route('user.manage');
        }

        $user = User::findOrFail($id);
        $user->delete();

        toastr()->success('User deleted successfully', 'Success');
        return redirect()->route('user.manage');
    }


}
