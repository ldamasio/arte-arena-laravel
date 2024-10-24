<?php

namespace App\Http\Controllers;

use App\Models\Conta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContaController extends Controller
{
    public function __construct() {
        // Associa permissões da ContaPolicy aos métodos deste Controller
        // $this->authorizeResource(Conta::class, 'conta');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validação de dados para evitar XSS e SQL Injection
        $validatedData = $request->validate([
            'titulo' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'valor' => 'required|numeric',
            'data_vencimento' => 'required|date',
            'status' => 'required|in:pago,pendente',
        ]);

        // Criação de uma nova conta com os dados validados
        $conta = new Conta();
        $conta->titulo = $validatedData['titulo'];
        $conta->descricao = $validatedData['descricao'] ?? null;
        $conta->valor = $validatedData['valor'];
        $conta->data_vencimento = $validatedData['data_vencimento'];
        $conta->status = $validatedData['status'];
        $conta->user_id = Auth::id(); // O ID do usuário autenticado

        $conta->save();

        return redirect()->route('contas.index')->with('success', 'Conta criada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Conta $conta)
    {
    // Validação de dados para evitar XSS e SQL Injection
    $validatedData = $request->validate([
        'titulo' => 'required|string|max:255',
        'descricao' => 'nullable|string',
        'valor' => 'required|numeric',
        'data_vencimento' => 'required|date',
        'status' => 'required|in:pago,pendente',
    ]);

    // Atualizando a conta com os dados validados
    $conta->titulo = $validatedData['titulo'];
    $conta->descricao = $validatedData['descricao'] ?? null;
    $conta->valor = $validatedData['valor'];
    $conta->data_vencimento = $validatedData['data_vencimento'];
    $conta->status = $validatedData['status'];

    $conta->save();

    return redirect()->route('contas.index')->with('success', 'Conta atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
