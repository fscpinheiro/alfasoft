@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span><i class="fas fa-address-book"></i>  Roadmap</span>
                    @include('components.btback')
                </div>
                <div class="card-body">
                    <div class="list-group">
                        @forelse ($items as $item)
                            @component('components.list-group-item')
                                @slot('href', $item['href'])
                                @slot('heading', $item['heading'])
                                @slot('date', $item['date'])
                                @slot('content', $item['content'])
                                @slot('small', $item['small'])
                            @endcomponent
                        @empty
                            <p>Não há dados.</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection