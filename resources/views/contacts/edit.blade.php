@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>Atualizar Contato</span>
                    <a href="{{ route('contacts.index') }}" class="btn btn-primary">Voltar para a página inicial</a>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('contacts.update', $contact->id) }}">
                        @csrf
                        @method('PATCH')

                        <div class="form-group">
                            <label for="name">Nome</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $contact->name }}" required>
                        </div>

                        <div class="form-group">
                            <label for="contact">Contato</label>
                            <input type="text" class="form-control" id="contact" name="contact" value="{{ $contact->contact }}" required>
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ $contact->email }}" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Atualizar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection