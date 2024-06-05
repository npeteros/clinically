<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AvatarController extends Controller
{
    /**
     * Update the user's password.
     */
    public function update(Request $request): RedirectResponse
    {
        $request->validate([
            'path' => 'required|image|max:2048', // Max file size is set to 2MB (2048KB)
        ]);

        $imageName = null;

        if ($request->hasFile('path')) {
            $image = $request->file('path');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/images/avatars', $imageName);
        }

        $user = $request->user();
        $user->path = $imageName;
        $user->save();

        return back()->with('status', 'avatar-updated');
    }
}
