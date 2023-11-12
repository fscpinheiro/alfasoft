@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>Registro: {{ $contact->name }}</span>
                    <a href="{{ route('contacts.index') }}" class="btn btn-primary">Voltar para a página inicial</a>
                </div>

                <div class="card-body">
                    <p><strong>ID:</strong> {{ $contact->id }}</p>
                    <p><strong>Nome:</strong> {{ $contact->name }}</p>
                    <p><strong>Contato:</strong> {{ $contact->contact }}</p>
                    <p><strong>Email:</strong> {{ $contact->email }}</p>

                    <a href="{{ route('contacts.edit', $contact) }}" class="btn btn-link btn-sm" aria-label="Editar" data-bs-original-title="Editar">
                        <i class="fas fa-edit"></i> Editar
                    </a>
                    <form action="{{ route('contacts.destroy', $contact) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-link text-danger btn-sm" aria-label="Deletar" data-bs-original-title="Deletar">
                            <i class="fas fa-trash-alt"></i> Deletar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
