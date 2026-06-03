<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oficinas - Laravel</title>
</head>
<body>
    <form action='/livros' method='post'>
    @csrf

    <label for='nome_oficina'>Nome da Oficina</label><br>
    <input type='text' id='nome_oficina' name='nome_oficina' required><br><br>

    <label for='professor_responsavel'> Nome do Professor Responsável</label><br><br>
    <input type='text' id='professor_responsavel' name='professor_responsavel' required></input>

    <label for='carga_horaria'> Carga Horaria</label><br>
    <input type='time' id='carga_horaria' name='carga_horaria' required><input>

    <label for='turno'> Turno</label><br>
    <input type='text' id='turno' name='turno' required><input>

    <button type='submit'>ENVIAR<button>
</form>

<h3> Lista de Cadastro da Oficina </h3>
@if ($oficinas -> idEmpty())
<p>Nenhum Cadastro encontrado</p>
@else
        <ul>
            @foreach($oficinas as $oficina)
               <li>
             {{ $oficina->nome_oficina }} - {{ $oficina->professor_responsavel }} {{ $oficina->carga_horaria }} ({{$oficina->turno}})
              </li>
            @endforeach
        </ul>
    @endif

</body>
</html>