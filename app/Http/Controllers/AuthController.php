<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Usuario;
use App\Models\LogAcceso;
use Carbon\Carbon; // Para manejar fechas

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'passwd' => 'required'
        ]);

        $usuario = Usuario::where('email', $request->email)->first();

        if (!$usuario || !Hash::check($request->passwd, $usuario->passwd)) {
            return back()->withErrors(['error' => 'Credenciales incorrectas']);
        }

        Auth::login($usuario);

        LogAcceso::create([
            'id_usuario' => $usuario->id,
            'fecha_reg' => Carbon::now(),
            'descripcion' => 'Inicio de sesión exitoso'
        ]);

        return redirect()->route('dashboard');
    }

    public function logout()
    {
        $usuario = Auth::user();

        if ($usuario) {
            LogAcceso::create([
                'id_usuario' => $usuario->id,
                'fecha_reg' => Carbon::now(),
                'descripcion' => 'Cierre de sesión'
            ]);
        }

        Auth::logout();
        return redirect()->route('login');
    }
}