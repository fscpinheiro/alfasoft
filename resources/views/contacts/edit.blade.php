@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span><i class="fas fa-edit"></i> Atualizar Contato</span>
                    @include('components.btback')
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('contacts.update', $contact->id) }}">
                        @csrf
                        @method('PATCH')

                        <div class="form-group mb-3">
                            <label for="name">Nome</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $contact->name) }}" required>
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="contact">Contato</label>
                            <input type="text" class="form-control @error('contact') is-invalid @enderror" id="contact" name="contact" value="{{ old('contact', $contact->contact) }}" required>
                            @error('contact')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="email">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $contact->email) }}" required>
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ session()->get('previous_url') }}" class="btn btn-secondary" data-bs-toggle="tooltip" data-bs-placement="top" title="Cancelar Edição">
                                <i class="fas fa-undo"></i> Cancelar
                            </a>
                            <button type="submit" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Atualizar Contato">
                                <i class="fas fa-cloud-upload-alt"></i> Atualizar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection