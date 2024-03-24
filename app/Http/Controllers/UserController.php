<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\RentLog;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        return view('admin.user.user', [
            'first' => 'Users',
            'second' => 'Users',
            'third' => 'Users',
            'users' => User::where('role_id', 2)
                    ->where('status', 'active')
                    ->get(),
        ]);
    }

    public function approval() {
        return view('admin.user.approval', [
            'first' => 'Users Approval',
            'second' => 'Users',
            'third' => 'Users Approval',
            'users' => User::where('role_id', 2)
                    ->where('status', 'inactive')
                    ->get(),
        ]);
    }

    public function approvalUpdate($slug) {
        $user = User::where('slug', $slug)->first();
        $user->update(['status' => 'active']);

        return redirect('/users')->with('success', 'New User Has Been Approved Successfully!');
    }

    public function destroy($slug) {
        $user = User::where('slug', $slug)->first();
        $user->delete();

        return redirect('/users')->with('success', 'User Has Been Banned Successfully!');
    }

    public function banned() {
        return view('admin.user.banned', [
            'first' => 'Banned Users',
            'second' => 'Users',
            'third' => 'Banned Users',
            'users' => User::onlyTrashed()->get(),
        ]);
    }

    public function restore($slug) {
        User::withTrashed()
        ->where('slug', $slug)
        ->restore();

        return redirect('/users')->with('success', 'User Unbanned Successfully!');
    }

    public function show($slug){
        $user = User::where('slug', $slug)->first();
        $rentLog = RentLog::with(['user', 'book'])->where('user_id', $user->id)->get();
        return view('admin.user.detail', [
            'first' => 'Detail User',
            'second' => 'Users',
            'third' => 'Detail Users',
            'user' => $user,
            'logs' => $rentLog,
        ]);
    }

    public function profileView($slug) {
        // dd(':)');
        $user = User::where('slug', $slug)->first();
        return view('profile', [
            'first' => 'Profile',
            'second' => 'Profile',
            'third' => 'Profile',
            'user' => $user,
        ]);
    }

    public function updateProfile(Request $request, $slug) {
        $validated = $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);

        $user = User::where('slug', $slug)->first();
        $user->update($validated);

        return back()->with('success', 'Your Account Has Been Update Successfully!');
    }
}
