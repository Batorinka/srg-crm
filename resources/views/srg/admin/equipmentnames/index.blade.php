@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Список оборудования</h3>
        <a class="btn btn-outline-primary mb-3" href="{{ route('srg.admin.equipmentnames.create') }}">Добавить</a>
        @include('srg.admin.equipmentnames.includes.result_messages')
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Название оборудования</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($paginator as $equipmentName)
                                @php /** @var \App\Models\EquipmentName $equipmentName */ @endphp
                                <tr>
                                    <td>{{ $equipmentName->title }}</td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                                            <div class="btn-group" role="group">
                                                <button id="btnGroupDrop3" type="button" class="btn btn-outline-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                                                <div class="dropdown-menu" aria-labelledby="btnGroupDrop3" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 35px, 0px);">
                                                    <a class="dropdown-item" href="{{ route('srg.admin.equipmentnames.edit', $equipmentName->id) }}">Изменить</a>
                                                    <form method="POST" action="{{ route('srg.admin.equipmentnames.destroy', $equipmentName->id) }}">
                                                        @method('DELETE')
                                                        {{ csrf_field() }}
                                                        <button type="submit" class="dropdown-item">Удалить</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @if($paginator->total() > $paginator->count())
            <br>
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            {{ $paginator->links() }}
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
