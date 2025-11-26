<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;

use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\UserStatistics;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    public function login(LoginRequest $request): RedirectResponse
    {
        $credentials = [
            'name' => $request->name,
            'password' => $request->password,
        ];

        if (Auth::attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();
            return redirect()->intended('/account');
        }

        return back()
            ->withErrors(['auth' => 'Login attempt failed. Please check your username and password.'])
            ->onlyInput('name');
    }

    public function register(RegisterRequest $request): RedirectResponse
    {
        $userCode = UserStatistics::where('user_code', $request->code)->first();

        if (! $userCode) {
            return back()->withErrors([
                'code' => 'User code does not exist.',
            ]);

        }

        $user = DB::transaction(function () use ($request, $userCode) {
            return $this->createUser([
                'id' => $userCode->user_id,
                'name' => $userCode->user_name,
                'email' => $request->email,
                'password' => $request->password,
            ]);
        });


        event(new Registered($user));
        Auth::login($user);

        return redirect('/account');

    }

    private function createUser(array $data): User
    {
        return User::create([
            'id' => $data['id'],
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function discordRedirect()
    {
        return Socialite::driver('discord')->redirect();
    }

    public function discordCallback()
    {
        $discord = Socialite::driver('discord')->stateless()->user();

        $discordId = $discord->getId();
        $discordAvatar = $discord->getAvatar();

        if (Auth::check()) {
            $user = Auth::user();

            $conflict = User::where('discord_id', $discordId)
                ->where('id', '!=', $user->id)
                ->first();

            if ($conflict) {
                return redirect('/account')->withErrors([
                    'discord' => 'This Discord account is already linked to another user.',
                ]);
            }

            $user->update([
                'discord_id' => $discordId,
                'discord_avatar' => $discordAvatar,
            ]);

            return redirect('/account')->with('status', 'Discord account linked successfully.');
        }

        $user = User::where('discord_id', $discordId)->first();

        if ($user) {
            Auth::login($user);
            return redirect('/account');
        }

        return redirect('/login')->withErrors([
            'discord' => 'No account is linked to this Discord. Please log in and link it from your account settings.',
        ]);
    }

}
