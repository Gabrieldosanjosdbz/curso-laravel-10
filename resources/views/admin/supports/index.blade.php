<h1>Listagem dos suportes</h1>

<a href="{{ route('supports.create') }}">Criar Dúvida</a>   <!--Aqui estou usando o nome da rota. Por isso ele é util-->

<table>
    <thead> 
        <th>assuntos</th>
        <th>status</th>
        <th>descrição</th>
        <th></th>
    </thead>
    <tbody>
        @foreach($supports as $support)         <!--Usamos essa diretiva para pegar todos os nossos valores do nosso suporte e utilizar um código em php-->
        <tr>
            <td>{{ $support['subject'] }}</td>
            <td>{{ $support['status']}}</td>
            <td>{{ $support['body'] }}</td>
            <td>
                <a href="{{route('supports.show', $support['id'])}}">ir</a>
                <a href="{{route('supports.edit', $support['id'])}}">Editar</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>