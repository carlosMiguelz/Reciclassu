@extends('layouts.app')

@section('content')
  <body>
    <div class="container">
      <div class="nav nav-tabs">
    <br>
    <br>
    <br>
    <br>
    @if (\Session::has('success'))
      <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
      </div><br />
     @endif
        <?php $id = Auth::user()->id ?>
    <h4>Dados Pessoais</h4>
    <a style="" href="{{action('HomeController@edit', $id)}}" class="btn btn-warning">Editar</a>
    <br>
    <table class="table table-striped">
    <thead>
      <tr>
        <td style="font-weight: bold">Nome</td>
        <td>{{ Auth::user()->name }}</td>
      </tr>
      <tr>
        <td style="font-weight: bold">Sobrenome</td>
        <td>{{ Auth::user()->sobrenome }}</td>
      </tr>
      <tr>
        <td style="font-weight: bold">Telefone</td>
        <td>{{ Auth::user()->telefone }}</td>
      </tr>
      <tr>
        <td style="font-weight: bold">Endereço</td>
        <td>{{ Auth::user()->rua }}, {{ Auth::user()->numero }} - {{ Auth::user()->bairro }} - {{ Auth::user()->cidade }} - {{ Auth::user()->estado }}</td>
      </tr>
      <tr>
        <td style="font-weight: bold">CPF</td>
        <td>{{ Auth::user()->cpf }}</td>
      </tr>
      <tr>
        <td style="font-weight: bold">Email</td>
        <td>{{ Auth::user()->email }}</td>
      </tr>
      <tr>
        <td></td>
        <td></td>
      </tr>
    </thead>
  </table>
  <h4>Meus resíduos</h4>
  <br>
  @if ($recyclings != null)
    <table class="table table-striped" style="text-align: center;">
      <thead>
        <tr>
          <th>Resíduo</th>
          <th>Descrição</th>
          <th>Quantidade</th>
          <th>Local de Retirada</th>
          <th>Valor</th>
          <th></th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        
        @foreach($recyclings as $recycling)
        
        <tr>
          <td>{{$recycling['nome_residuo']}}</td>
          <td>{{$recycling['descricao_residuo']}}</td>
          <td>{{$recycling['quantidade_residuo']}}</td>
          <td>{{$recycling['rua_retirada']}}, {{$recycling['numero_retirada']}} - {{$recycling['bairro_retirada']}} - {{$recycling['cidade_retirada']}} - {{$recycling['estado_retirada']}}</td>
          <td>
            <?php 
              if($recycling['valor'] == 0){
                echo "Grátis";
              }else{
                echo $recycling['valor'];
              }
            ?>
          </td>
          @if ($recycling['status'] == "disponivel")
          <td>
          <a href="{{action('RecyclingController@edit', $recycling['id'])}}" class="btn btn-warning">Editar</a></td>
          <td>
            <form action="{{action('RecyclingController@destroy', $recycling['id'])}}" method="post">
              @csrf
              <input name="_method" type="hidden" value="DELETE">
              <button class="btn btn-danger" type="submit" onclick="return confirm('Confirma a exclusão do resíduo?')">Apagar</button>
            </form>
          </td>
          @endif
          @if ($recycling['status'] == "em_coleta")
          <td><td><a href="{{action('ReciclassuController@close', $recycling['id'])}}" class="">Em coleta (Concluir/Cancelar)</a></td></td>
          @endif
          @if ($recycling['status'] == "reservado")
          <td><td><a href="{{action('ReciclassuController@scheduling', $recycling['id'])}}" class="btn btn-primary">Reservado (Aceitar/Recusar)</a></td></td>
          @endif
        </tr>
      @endforeach
    </tbody>
  </table>
  @endif
  </div>
@endsection