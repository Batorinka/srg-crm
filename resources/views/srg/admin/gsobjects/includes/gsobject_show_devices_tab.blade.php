@php
    /** @var \App\Models\Device $devices */
@endphp
<div class="tab-pane fade card border-primary mb-3" id="devices">
    <div class="card-body">
        <h4 class="card-title">Узел учета газа</h4>
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Состав УУГ</th>
                <th>Марка прибора</th>
                <th>Заводской номер</th>
                <th>Дата поверки</th>
                <th>Межповерочный интервал</th>
                <th>Дата следующей поверки</th>
                <th>Диапазон измерения</th>
            </tr>
            </thead>
            <tbody>
            @foreach($devices as $device)
                <tr>
                    <td>{{ $device->deviceName->deviceType->title }}</td>
                    <th>{{ $device->deviceName->title }}</th>
                    <td>{{ $device->number }}</td>
                    <td>{{ $device->last_muster_date }}</td>
                    <td>{{ $device->muster_interval }}</td>
                    <td>{{ $device->next_muster_date }}</td>
                    <td>{{ $device->range }}</td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                            <div class="btn-group" role="group">
                                <button id="btnGroupDrop3" type="button" class="btn btn-outline-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                                <div class="dropdown-menu" aria-labelledby="btnGroupDrop3" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 35px, 0px);">
                                    <a class="dropdown-item" href="{{ route('srg.admin.devices.edit', $device->id) }}">Изменить</a>
                                    <form method="POST" action="{{ route('srg.admin.devices.destroy', $device->id) }}">
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
                    <a href="{{ route('srg.admin.devices.create', $item->slug) }}" class="list-group-item list-group-item-action">
                        Добавить
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
