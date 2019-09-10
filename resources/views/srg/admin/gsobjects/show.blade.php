@extends('layouts.app')

@section('content')
    @php
        /** @var \App\Models\Gsobject $item */
    @endphp
    <div class="container">
        @include('srg.admin.mainContracts.includes.result_messages')
        <div class="row justify-content-center">
            <div class="col-md-12">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#info" style="">Общая информация</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#help" style="">Помощь</a>
                    </li>
                </ul>
                <div id="myTabContent" class="tab-content">
                    <div class="tab-pane fade active show card border-primary mb-3" id="info">
                        <div class="card-body">
                            <h4 class="card-title">{{ $item->mainContract->company_sub_name }}</h4>
                            <table class="table table-hover">
                                <tbody>
                                <tr>
                                    <th>Название объекта</th>
                                    <td>{{ $item->name }}</td>
                                </tr>
                                <tr>
                                    <th>{{ $item->member_position }}</th>
                                    <td>
                                        <strong>{{ $item->member_name }}</strong>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Адрес объекта</th>
                                    <td>
                                        <strong>{{ $item->address }}</strong>
                                    </td>
                                </tr>
                                <tr>
                                    <th>ГРС</th>
                                    <td>
                                        <strong>{{ $item->grs }}</strong>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Акт установки пломб</th>
                                    <td>
                                        от <strong>{{ \Carbon\Carbon::parse($item->stamp_act_date)->format('d.m.Y') }}</strong>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Довор транспортировки газа</th>
                                    <td>
                                        № {{ $item->mainContract->number }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Довор технического обслуживания узлов измерения</th>
                                    <td>
                                        {{ $item->toContract->number }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Единица измерения давления</th>
                                    <td>
                                        {{ $item->pressureUnit->title }}
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade card border-primary mb-3" id="help">
                        <div class="card-body">
                            <h4 class="card-title">Profile card title</h4>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="list-group">
                    <a href="{{ route('srg.admin.gsobjects.edit', $item->slug) }}" class="list-group-item list-group-item-action">
                        Изменить
                    </a>
                    <form method="POST" action="{{ route('srg.admin.gsobjects.destroy', $item->slug) }}">
                        @method('DELETE')
                        {{ csrf_field() }}
                        <button type="submit" class="list-group-item list-group-item-action">Удалить</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
