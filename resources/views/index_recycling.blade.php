@extends('layouts.app')

@section('content')
    <div class="container">
    <br />
    <br />
    <br />
    <br />
    <h3 style="text-align: center">Resíduos disponíveis para coleta</h3><br/>
    @if (\Session::has('success'))
      <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
      </div><br />
     @endif
    <table class="table table-striped" style="text-align: center;">
    <thead>
      <tr>
        <th>ID</th>
        <th>Tipo de Resíduo</th>
        <th>Descrição</th>
        <th>Quantidade</th>
        <th>Local de Retirada</th>
        <th>Valor</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      
      @foreach($recyclings as $recycling)
      
      <tr>
        <td>{{$recycling['id']}}</td>
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
        @if ($recycling['id_user'] == Auth::user()->id)
        <td><a href="{{action('RecyclingController@edit', $recycling['id'])}}" class="btn btn-warning"><span class="glyphicon glyphicon-pencil"></span> Editar</a></td>
        <td>
          <form action="{{action('RecyclingController@destroy', $recycling['id'])}}" method="post">
            @csrf
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger" type="submit" onclick="return confirm('Confirma a exclusão do resíduo?')"><span class="glyphicon glyphicon-trash"></span> Apagar</button>
          </form>
        </td>
        @else
        <td><a href="{{action('ReciclassuController@create', $recycling['id'])}}" class="btn btn-success"><span class="glyphicon glyphicon-heart-empty"></span> Eu Quero</a></td>
        <td>
        </td>
        @endif
      @else
      <td style="font-weight: bold">Reservado</td>
      <td></td>
      @endif
      </tr>
      @endforeach
    </tbody>
  </table>
  </div>
@endsection