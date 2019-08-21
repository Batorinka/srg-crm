@extends('layouts.app')

@section('content')
    @php
        /** @var \App\Models\MainContract $item */
    @endphp
    <div class="container">
        @include('srg.admin.mainContracts.includes.result_messages')

        @if($item->exists)
            <form method="POST" action="{{ route('srg.admin.maincontracts.update', $item->slug) }}">
            @method('PATCH')
        @else
            <form method="POST" action="{{ route('srg.admin.maincontracts.store') }}">
        @endif
        {{ csrf_field() }}
        <input name="user_id" type="text" hidden value="{{ \Auth::user()->id }}">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#main_info" style="">Основная информация</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#trans_contract" style="">Договор транспортировки</a>
                    </li>
                </ul>
                <div id="myTabContent" class="tab-content">
                    <div class="tab-pane fade active show card border-primary mb-3" id="main_info">
                        <div class="card-body">
                            @include('srg.admin.mainContracts.includes.main_contract_edit_main_tab')
                        </div>
                    </div>
                    <div class="tab-pane fade card border-primary mb-3" id="trans_contract">
                        <div class="card-body">
                            @include('srg.admin.mainContracts.includes.main_contract_edit_trans_tab')
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
                </div>
            </div>
        </div>
        </form>
    </div>
@endsection
