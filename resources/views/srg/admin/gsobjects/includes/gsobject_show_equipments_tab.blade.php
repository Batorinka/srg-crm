@php
    /** @var \App\Models\Equipment $equipments */
@endphp
<div class="tab-pane fade card border-primary mb-3" id="equipments">
    <div class="card-body">
        <h4 class="card-title">Газоиспользующее оборудование</h4>
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Название оборудования</th>
                <th>Количество</th>
                <th>Мощность</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($equipments as $equipment)
                <tr>
                    <th>{{ $equipment->equipmentName->title }}</th>
                    <td>{{ $equipment->quantity }}</td>
                    <td>{{ $equipment->power }}</td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                            <div class="btn-group" role="group">
                                <button id="btnGroupDrop3" type="button" class="btn btn-outline-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                                <div class="dropdown-menu" aria-labelledby="btnGroupDrop3" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 35px, 0px);">
                                    <a class="dropdown-item" href="{{ route('srg.admin.equipments.edit', $equipment->id) }}">Изменить</a>
                                    <form method="POST" action="{{ route('srg.admin.equipments.destroy', $equipment->id) }}">
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
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="list-group">
                    <a href="{{ route('srg.admin.equipments.create', $item->slug) }}" class="list-group-item list-group-item-action">
                        Добавить
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
