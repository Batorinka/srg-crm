@extends('layouts.app')

@section('content')
    @php
        /** @var \App\Models\Equipment $item */
    @endphp
    <div class="container">
        @include('srg.admin.equipments.includes.result_messages')

        @if($item->exists)
            <form method="POST" action="{{ route('srg.admin.equipments.update', $item->id) }}">
            @method('PATCH')
        @else
            <form method="POST" action="{{ route('srg.admin.equipments.store') }}">
        @endif
        {{ csrf_field() }}
        <div class="row justify-content-center">
            <div class="col-md-12">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#main_info" style="">
                            {{ $gsobject->mainContract->company_sub_name }} - {{ $gsobject->name }}
                        </a>
                    </li>
                </ul>
                <div id="myTabContent" class="tab-content">
                    <div class="tab-pane fade active show card border-primary mb-3" id="main_info">
                        <div class="card-body">
                            @include('srg.admin.equipments.includes.equipment_edit_main_tab')
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
                    <a class="list-group-item list-group-item-action" href="{{ route('srg.admin.gsobjects.show', $gsobject->slug) }}">Назад</a>
                </div>
            </div>
        </div>
        </form>
    </div>
@endsection
