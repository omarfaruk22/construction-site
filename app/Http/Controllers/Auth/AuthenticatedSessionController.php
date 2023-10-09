<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $user = User::where('email',$request->email)->first();

        if ($user) {
            if ($user->role == 1) {
                if (Hash::check($request->password, $user->password)) {
                    Auth::login($user);
                    $request->session()->regenerate();

                    return redirect()->intended(RouteServiceProvider::HOME);
                   
                }
                     
            }
            else{
                session()->flash('message', 'Sorry,You Are Not a Admin');
                return redirect()->back();
            }
        }
        else{
            session()->flash('message', 'Sorry,Your email dosen,t exist');
                return redirect()->back();
        }
    }



    
    

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
