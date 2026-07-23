<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $users = User::when($search, function ($query) use ($search) {

            $query->where('name', 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%");
        })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        $adminsCount = User::where('type', 'admin')->count();

        return view('users.index', compact(
            'users',
            'search',
            'adminsCount'
        ));
    }
    public function create()
    {
        return view('users.create');
    }
    public function store(StoreUserRequest $request)
    {
        User::create([

            'name' => $request->name,

            'email' => $request->email,

            'password' => Hash::make($request->password),

            'type' => $request->type,

        ]);

        return redirect()
            ->route('users.index')
            ->with('success', 'User created successfully.');
    }
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }
    public function update(UpdateUserRequest $request, User $user)
    {
        $data = [

            'name' => $request->name,

            'email' => $request->email,

            'type' => $request->type,

        ];

        if ($request->filled('password')) {

            $data['password'] = Hash::make($request->password);
        }
        if ($user->id == auth()->id() && $request->filled('type')) {

            return redirect()
                ->route('users.index')
                ->with('error', 'You cannot remove your own account from admin.');
        }

        $user->update($data);

        return redirect()
            ->route('users.index')
            ->with('success', 'User updated successfully.');
    }
    public function destroy(User $user)
    {
        if ($user->id == auth()->id()) {

            return back()->with('error', 'You cannot delete your own account.');
        }

        if ($user->type == 'admin') {

            $adminsCount = User::where('type', 'admin')->count();

            if ($adminsCount <= 1) {
                return back()->with('error', 'You cannot delete the last admin.');
            }
        }

        $user->delete();

        return back()->with('success', 'User deleted successfully.');
    }
}
