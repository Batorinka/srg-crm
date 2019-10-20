@extends('layouts.app')

@section('content')
    @php
        /** @var \App\Models\EquipmentName $item */
    @endphp
    <div class="container">
        @include('srg.admin.equipmentnames.includes.result_messages')

        @if($item->exists)
            <form method="POST" action="{{ route('srg.admin.equipmentnames.update', $item->id) }}">
            @method('PATCH')
        @else
            <form method="POST" action="{{ route('srg.admin.equipmentnames.store') }}">
        @endif
        {{ csrf_field() }}
        <div class="row justify-content-center">
            <div class="col-md-12">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#main_info" style="">Информация об оборудование</a>
                    </li>
                </ul>
                <div id="myTabContent" class="tab-content">
                    <div class="tab-pane fade active show card border-primary mb-3" id="main_info">
                        <div class="card-body">
                            @include('srg.admin.equipmentnames.includes.equipment_name_edit_main_tab')
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
                    <a class="list-group-item list-group-item-action" href="{{ route('srg.admin.equipmentnames.index') }}">Назад</a>
                </div>
            </div>
        </div>
        </form>
    </div>
@endsection
