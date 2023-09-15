<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SignupFormRequest;
use App\Http\Requests\UploadProfilePhotoFormRequest;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use App\Models\User;

class AuthenticationController extends Controller
{
    /**
     * Display the signup form.
     *
     * @return \Illuminate\View\View
     */
    public function showSignupForm()
    {
        return view('authentication.signup');
    }

    /**
     * Handle the user sign-up.
     *
     * @param \App\Http\Requests\SignupFormRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handleSignup(SignupFormRequest $request)
    {
        $validated = $request->validated();

        $user = User::create([
            'name' => $validated['username'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
        ]);

        Auth::login($user);

        return redirect()->route('home');
    }

    /**
     * Display the upload profile photo form.
     *
     * @return \Illuminate\View\View
     */
    public function showUploadProfilePhotoForm()
    {
        return view('authentication.upload_profile_photo');
    }

    /**
     * Handle the upload profile photo.
     *
     * @param \App\Http\Requests\UploadProfilePhotoFormRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handleUploadProfilePhoto(UploadProfilePhotoFormRequest $request)
    {
        $user = Auth::user();
        $validated = $request->validated();

        if ($request->hasFile('profile_photo')) {
            $image = $request->file('profile_photo');

            // Utilisation d'Intervention Image pour redimensionner l'image si nécessaire
            $img = Image::make($image);
            $img->resize(60, null, function ($constraint) {
                $constraint->aspectRatio();
            });

            $path = $image->store('profile_photos');

            $user->profile_photo = $path;
            $user->save();
        }

        return redirect()->route('home');
    }
}
