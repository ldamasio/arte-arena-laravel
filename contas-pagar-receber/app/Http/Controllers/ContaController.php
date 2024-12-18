<?php

namespace App\Http\Controllers;

use App\Models\Conta;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ContaController extends Controller
{
    use AuthorizesRequests;

    public function __construct()
    {
        // Autoriza automaticamente as ações com base na ContaPolicy
        $this->authorizeResource(Conta::class, 'conta');
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Verifica a role do usuário autenticado
        if (Auth::user()->role === 'admin') {
            $contas = Conta::all(); // Admin pode ver todas as contas
        } else {
            $contas = Conta::where('user_id', Auth::id())->get(); // Usuário comum vê apenas suas contas
        }

        return view('contas.index', compact('contas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('contas.create');
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
            'status' => 'required|in:pago,recebido,pendente',
            'tipo' => 'required|in:a pagar,a receber',
        ]);

        // Criação de uma nova conta com os dados validados
        $conta = new Conta($validatedData);
        $conta->user_id = Auth::id(); // O ID do usuário autenticado
    
        $conta->save();

        return redirect()->route('contas.criada')->with('success', 'Conta criada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Edit the specified resource.
     */
    public function edit(Conta $conta)
    {
        $this->authorize('edit', $conta);

        return view('contas.edit', compact('conta'));
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
            'status' => 'required|in:pago,recebido,pendente',
            'tipo' => 'required|in:a pagar,a receber',
        ]);

        // Atualizando a conta com os dados validados
        $conta->fill($validatedData);
        $conta->save();

        return redirect()->route('contas.index')->with('success', 'Conta atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Conta $conta)
    {
        $conta->delete();
        return redirect()->route('contas.index')->with('success', 'Conta excluída com sucesso!');
    }
    public function relatorios()
    {
        // Verifica se o usuário é admin
        if (Auth::user()->role !== 'admin') {
            return redirect()->route('dashboard')->with('error', 'Acesso não autorizado.');
        }

        // Lógica para gerar relatórios gerais
        $totalContas = Conta::count();
        $totalPago = Conta::where('status', 'pago')->sum('valor');
        $totalRecebido = Conta::where('status', 'recebido')->sum('valor');

        // Relatórios por tipo
        $totalAPagar = Conta::where('tipo', 'a pagar')->sum('valor');
        $totalAReceber = Conta::where('tipo', 'a receber')->sum('valor');

        // Novos cálculos para pendentes
        $totalPendenteAPagar = Conta::where('status', 'pendente')->where('tipo', 'a pagar')->sum('valor');
        $totalPendenteAReceber = Conta::where('status', 'pendente')->where('tipo', 'a receber')->sum('valor');
        // Lógica para gerar relatórios por usuário
        $usuarios = \App\Models\User::with(['contas' => function ($query) {
            $query->select('user_id', 'status', 'tipo', \Illuminate\Support\Facades\DB::raw('SUM(valor) as total_valor'))
                ->groupBy('user_id', 'status', 'tipo');
        }])->get();

        $relatoriosPorUsuario = $usuarios->map(function ($usuario) {
            $totalPagoUsuario = $usuario->contas->where('status', 'pago')->sum('total_valor');
            $totalRecebidoUsuario = $usuario->contas->where('status', 'recebido')->sum('total_valor');
            $totalPendenteAPagarUsuario = $usuario->contas->where('status', 'pendente')->where('tipo', 'a pagar')->sum('total_valor');
            $totalPendenteAReceberUsuario = $usuario->contas->where('status', 'pendente')->where('tipo', 'a receber')->sum('total_valor');
            $totalAPagarUsuario = $usuario->contas->where('tipo', 'a pagar')->sum('total_valor');
            $totalAReceberUsuario = $usuario->contas->where('tipo', 'a receber')->sum('total_valor');

            return [
                'nome' => $usuario->name,
                'totalPago' => $totalPagoUsuario,
                'totalRecebido' => $totalRecebidoUsuario,
                'totalPendenteAPagar' => $totalPendenteAPagarUsuario,
                'totalPendenteAReceber' => $totalPendenteAReceberUsuario,
                'totalAPagar' => $totalAPagarUsuario,
                'totalAReceber' => $totalAReceberUsuario,
            ];
        });

        return view('contas.relatorios', compact('totalContas', 'totalPago', 'totalRecebido', 'totalPendenteAPagar', 'totalPendenteAReceber', 'totalAPagar', 'totalAReceber', 'relatoriosPorUsuario'));
    }
}
