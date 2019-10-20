@extends('layouts.app')

@section('content')
    @php
        /** @var \App\Models\Gsobject $item */
    @endphp
    <div class="container">
        @include('srg.admin.gsobjects.includes.result_messages')

        @if($item->exists)
            <form method="POST" action="{{ route('srg.admin.gsobjects.update', $item->slug) }}">
            @method('PATCH')
        @else
            <form method="POST" action="{{ route('srg.admin.gsobjects.store') }}">
        @endif
        {{ csrf_field() }}
        <div class="row justify-content-center">
            <div class="col-md-12">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#main_info" style="">Основная информация</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#contracts" style="">Договоры</a>
                    </li>
                </ul>
                <div id="myTabContent" class="tab-content">
                    <div class="tab-pane fade active show card border-primary mb-3" id="main_info">
                        <div class="card-body">
                            @include('srg.admin.gsobjects.includes.gsobject_edit_main_tab')
                        </div>
                    </div>
                    <div class="tab-pane fade card border-primary mb-3" id="contracts">
                        <div class="card-body">
                            @include('srg.admin.gsobjects.includes.gsobject_edit_contracts_tab')
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="list-group">
                    <button type="submit" class="list-group-item list-group-item-action">Сохранить</button>
                    @if($item->exists)
                        <a class="list-group-item list-group-item-action" href="{{ route('srg.admin.gsobjects.show', $item->slug) }}">Назад</a>
                    @else
                        <a class="list-group-item list-group-item-action" href="{{ route('srg.admin.maincontracts.index') }}">Назад</a>
                    @endif
                </div>
            </div>
        </div>
        </form>
    </div>
@endsection
