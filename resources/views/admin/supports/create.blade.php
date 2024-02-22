<h1>Nova Dúvida</h1>

@if ($errors->any())
    @foreach($errors->all() as $error)      <!--To listando todos os erros caso tenha-->
        {{ $error }}
    @endforeach
@endif

<form action="{{ route ('supports.store') }}" method="POST">

    <!--O token é feito para validar nossa solicitação-->
    {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}">  Posso fazer assim também--}}

    @csrf() <!--Jeito mais simples de criar o token-->
    <input type="text" placeholder="Assunto" name="subject" value="{{ old('subject') }}">           <!--Caso ja tenha um valor antes ele mantem-->
    <textarea name="body" cols="30" rows="5" placeholder="Descrição">{{ old('body') }}</textarea>
    <button type="submit">Enviar</button>
</form>