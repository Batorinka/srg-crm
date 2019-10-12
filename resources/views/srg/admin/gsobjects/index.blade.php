@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Список объектов</h3>
        <a class="btn btn-outline-primary mb-3" href="{{ route('srg.admin.gsobjects.create') }}">Добавить</a>
        @include('srg.admin.gsobjects.includes.result_messages')
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Название объекта</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($paginator as $gsobject)
                                @php /** @var \App\Models\Gsobject $gsobject */ @endphp
                                <tr>
                                    <td>{{ $gsobject->id }}</td>
                                    <td>
                                        <a href="{{ route('srg.admin.gsobjects.show', $gsobject->slug) }}">
                                            {{ $gsobject->mainContract->company_sub_name }}({{ $gsobject->name }})
                                        </a>
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                                            <div class="btn-group" role="group">
                                                <button id="btnGroupDrop3" type="button" class="btn btn-outline-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                                                <div class="dropdown-menu" aria-labelledby="btnGroupDrop3" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 35px, 0px);">
                                                    <a class="dropdown-item" href="{{ route('srg.admin.gsobjects.edit', $gsobject->slug) }}">Изменить</a>
                                                    <form method="POST" action="{{ route('srg.admin.gsobjects.destroy', $gsobject->slug) }}">
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
