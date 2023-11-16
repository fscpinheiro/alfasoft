@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span><i class="fas fa-eye"></i> Detalhe do Contato</span>
                    @include('components.btback')
                </div>

                <div class="card-body">
                   
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
                
                    <div class="d-flex justify-content-between mt-3">
                        <a href="{{ route('contacts.edit', $contact) }}" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Editar Contato">
                            <i class="fas fa-edit"></i> Editar
                        </a>
                        <a href="{{ route('contacts.confirmDestroy', $contact) }}" class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Excluir Contato">
                            <i class="fas fa-trash-alt"></i> Deletar
                        </a>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
