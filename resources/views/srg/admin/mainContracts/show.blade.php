@extends('layouts.app')

@section('content')
    @php
        /** @var \App\Models\MainContract $item */
    @endphp
    <div class="container">
        @include('srg.admin.mainContracts.includes.result_messages')
        <div class="row justify-content-center">
            <div class="col-md-12">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#main_info" style="">Основная информация</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#objects" style="">Объекты</a>
                    </li>
                </ul>
                <div id="myTabContent" class="tab-content">
                    <div class="tab-pane fade active show card border-primary mb-3" id="main_info">
                        <div class="card-body">
                            @include('srg.admin.mainContracts.includes.main_contract_show_main_tab')
                        </div>
                    </div>
                    <div class="tab-pane fade card border-primary mb-3" id="objects">
                        <div class="card-body">
                            @include('srg.admin.mainContracts.includes.main_contract_show_objects_tab')
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="list-group">
                    <a class="list-group-item list-group-item-action" href="{{ route('srg.admin.maincontracts.index') }}">
                        Назад
                    </a>
                    <a href="{{ route('srg.admin.maincontracts.edit', $item->slug) }}" class="list-group-item list-group-item-action">
                        Изменить
                    </a>
                    <form method="POST" action="{{ route('srg.admin.maincontracts.destroy', $item->slug) }}">
                        @method('DELETE')
                        {{ csrf_field() }}
                        <button type="submit" class="list-group-item list-group-item-action">Удалить</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
