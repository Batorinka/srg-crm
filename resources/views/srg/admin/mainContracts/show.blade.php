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
                        <a class="nav-link active" data-toggle="tab" href="#transportirovka" style="">Транспортировка</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#objects" style="">Объекты</a>
                    </li>
                </ul>
                <div id="myTabContent" class="tab-content">
                    <div class="tab-pane fade active show card border-primary mb-3" id="transportirovka">
                        <div class="card-body">
                            <h4 class="card-title">{{ $item->company_sub_name }}</h4>
                            <table class="table table-hover">
                                <tbody>
                                <tr>
                                    <th>Полное название</th>
                                    <td>{{ $item->company_full_name }}</td>
                                </tr>
                                <tr>
                                    <th>{{ $item->mainContractType->title }}</th>
                                    <td>
                                        № <strong>{{ $item->number }}</strong>
                                        от <strong>{{ \Carbon\Carbon::parse($item->signing_date)->format('d.m.Y') }}</strong>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Срок действия договора</th>
                                    <td>
                                        от <strong>{{ \Carbon\Carbon::parse($item->start_date)->format('d.m.Y') }}</strong>
                                        до <strong>{{ \Carbon\Carbon::parse($item->end_date)->format('d.m.Y') }}</strong>
                                    </td>
                                </tr>
                                <tr>
                                    <th>{{ $item->contractor_position }}</th>
                                    <td>
                                        <strong>{{ $item->contractor_name }}</strong>
                                        на основание
                                        <strong>{{ $item->contractor_cause }}</strong>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Довор поставки газа</th>
                                    <td>
                                        {{ $item->supply_contract }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Реквизиты</th>
                                    <td>
                                        {{ $item->requisites }}
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade card border-primary mb-3" id="objects">
                        @if($gsobjects->isEmpty())
                        <div class="card-body">
                            <h4 class="card-title">{{ $item->company_sub_name }}</h4>
                            <p class="card-text">Объекты отсутствуют.</p>
                        </div>
                        @else
                        <div class="card-body">
                            <h4 class="card-title">{{ $item->company_sub_name }}</h4>
                            <ul>
                                @foreach($gsobjects as $gsobject)
                                <li>
                                    <a href="{{ route('srg.admin.gsobjects.show', $gsobject->slug) }}">
                                        {{ $gsobject->name }}
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
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
