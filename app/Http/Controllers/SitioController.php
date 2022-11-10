<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SitioController extends Controller
{
    public function codigoContacto($codigo = null)
    {
        if($codigo == '1234') {
            $nombre = 'Mariana';
            $correo = 'joscelynn@gmail.com';
            $comentario = 'Sí sirvio :D';
        }else{
            $nombre = null;
            $correo = null;
            $comentario = null;
        }
    
        return view('contacto', compact('codigo','nombre','correo','comentario'));
    }

    public function landingpage()
    {
        return view('landingpage');
    }

    public function recibeFormContacto(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:255|min:3',
            'correo' => ['required','email'],
            'comentario' => 'required',
        ]);

        DB::table('contactos')->insert([
            'nombre' => $request->nombre,
            'correo' => $request->correo,
            'comentario' => $request->comentario,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return redirect('/contacto');
    }
}
