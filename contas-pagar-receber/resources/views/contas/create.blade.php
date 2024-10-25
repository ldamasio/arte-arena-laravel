<!DOCTYPE html>
<html>
<head>
    <title>Criar Nova Conta</title>
</head>
<body>
    <h1>Criar Nova Conta</h1>
    <form method="POST" action="{{ route('contas.store') }}">
        @csrf
        <div class="form-group">
            <label for="titulo">Título:</label>
            <input type="text" class="form-control" id="titulo" name="titulo" required>
        </div>
        <div class="form-group">
            <label for="descricao">Descrição:</label>
            <textarea class="form-control" id="descricao" name="descricao"></textarea>
        </div>
        <div class="form-group">
            <label for="valor">Valor:</label>
            <input type="number" class="form-control" id="valor" name="valor" required>
        </div>
        <div class="form-group">
            <label for="data_vencimento">Data de Vencimento:</label>
            <input type="date" class="form-control" id="data_vencimento" name="data_vencimento" required>
        </div>
        <div class="form-group">
            <label for="status">Status:</label>
            <select class="form-control" id="status" name="status">
                <option value="pago">Pago</option>
                <option value="pendente">Pendente</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Criar Conta</button>
    </form>
</body>
</html>