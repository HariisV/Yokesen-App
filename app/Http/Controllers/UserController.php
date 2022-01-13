<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function updateProfile(Request $request){
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'no_telp' => ['required', 'numeric', 'min:8'],
            'alamat' => ['required', 'string', 'max:255'],
        ]);
    
        $change = User::where('id', Auth()->user()->id)->firstOrFail();
        $change->update([
            'name' => $request->name,
            'no_telp' => $request->no_telp,
            'alamat' => $request->alamat,
        ]);
        if($request->password) $change->update(['password' => Hash::make($request->password)]);
        if($request->image){
            $this->validate($request, [
                'image' => 'required|file|image|max:2048',
            ]);
            $file = $request->file('image');
            $nama_file = time()."_".$file->getClientOriginalName();
            $file->storeAs('public/images', $nama_file);
            $change->update(['profile' => $nama_file]);
        }

        return redirect()->route('profile');
    }
}
