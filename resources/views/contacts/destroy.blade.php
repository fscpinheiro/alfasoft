@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span><i class="fas fa-trash-alt"></i> Excluir Contato</span>
                    @include('components.btback')
                </div>

                <div class="card-body">
                    <div class="alert alert-danger" role="alert">Tem certeza de que deseja excluir o seguinte contato?</div>
                
                    <table class="table">
                        <tbody>
                            <tr>
                                <th scope="row" style="width: 15%;">ID</th>
                                <td>{{ $contact->id }}</td>
                            </tr>
                            <tr>
                                <th scope="row" style="width: 15%;">Nome</th>
                                <td>{{ $contact->name }}</td>
                            </tr>
                            <tr>
                                <th scope="row" style="width: 15%;">Contato</th>
                                <td>{{ $contact->contact }}</td>
                            </tr>
                            <tr>
                                <th scope="row" style="width: 15%;">Email</th>
                                <td>{{ $contact->email }}</td>
                            </tr>
                        </tbody>
                    </table>
                
                    <form method="POST" action="{{ route('contacts.destroy', $contact) }}" class="d-inline">
                        @csrf
                        @method('DELETE')
                
                        <div class="d-flex justify-content-between mt-3">
                            <a href="{{ session()->get('previous_url') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> Cancelar
                            </a>
                            <button type="submit" class="btn btn-danger">
                                <i class="fas fa-trash-alt"></i> Excluir
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection