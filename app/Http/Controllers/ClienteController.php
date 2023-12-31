<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class ClienteController extends Controller
{
    public function cadastrar(Request $request)
    {
        $userEmailDetails = Cliente::where('email', $request->input('email'))->first();
        if($userEmailDetails){
            return back()->with('error', 'Email já registrado.');
        }

        $request->validate([
            'nome' => 'required|string',
            'email' => 'required|email|unique:clientes,email',
        ]);

        $cliente = Cliente::create([
            'nome' => $request->nome,
            'email' => $request->email,
        ]);

        $baseDirectory = storage_path('app/public/clientes');
        $clienteFolder = $baseDirectory . '/' . Str::slug($cliente->nome) . '_' . $cliente->id;

        if (!File::exists($clienteFolder)) {
            File::makeDirectory($clienteFolder, 0775, true);
            chmod($clienteFolder, 0775);
        }

        return redirect('/clientes')->with('success', 'Cliente cadastrado com sucesso!');
    }

    public function index()
    {
        $clientes = Cliente::all();
        return view('clientes', compact('clientes'));
    }

    public function destroy($id) {

        Cliente::findOrFail($id)->delete();

        return redirect('/clientes')->with('msg', 'Cliente deletado');
    }
}
