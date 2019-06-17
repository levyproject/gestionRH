@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <a class="addSalarie" href={{ route('salarie.create') }}><button class="btn btn-secondary"> Ajoutez un nouveau salarié</button></a>
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Nom</td>
          <td>Prenom</td>
          <td>Sexe</td>
          <td>Date de Naissance</td>
          <td>Niveau d'etude</td>
          <td>Suivi de Salarie</td>
          <td colspan="">Action1</td>
        </tr>
    </thead>
    <tbody>
        @foreach($salaries as $salarie)
        <tr>
            <td>{{$salarie->id_salarie}}</td>
            <td>{{$salarie->nom}}</td>
            <td>{{$salarie->prenom}}</td>
            <td>{{$salarie->sexe}}</td>
            <td>{{$salarie->date_naissance}}</td>
            <td>{{$salarie->getNiveau()}}</td>
            <td>{{$salarie->getSuivi()}}</td>
            <td><a href="{{ route('salarie.edit', $salarie->id_salarie)}}" class="btn btn-primary">Edit</a></td>
            <td>
                <form action="{{ route('deleteSalarie', $salarie->id_salarie)}}">
                  {{-- @csrf --}}
                  {{-- @method('DELETE') --}}
                  <a href="{{ route('deleteSalarie', $salarie->id_salarie)}}"><button class="btn btn-danger"  type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection