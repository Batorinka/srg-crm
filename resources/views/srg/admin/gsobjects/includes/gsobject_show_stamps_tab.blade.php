@php
    /** @var \App\Models\Gsobject $item */
@endphp
<div class="tab-pane fade card border-primary mb-3" id="stamps">
    <div class="card-body">
        <h4 class="card-title">Пломбы</h4>
        <table class="table table-hover">
            <tbody>
            <tr>
                <th>Акт установки пломб</th>
                <td>
                    от <strong>{{ \Carbon\Carbon::parse($item->stamp_act_date)->format('d.m.Y') }}</strong>
                </td>
                <td></td>
            </tr>
            @foreach($stampActs as $stampAct)
                <tr>
                    <th>{{ $stampAct->place }}</th>
                    <td>{{ $stampAct->number }}</td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                            <div class="btn-group" role="group">
                                <button id="btnGroupDrop3" type="button" class="btn btn-outline-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                                <div class="dropdown-menu" aria-labelledby="btnGroupDrop3" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 35px, 0px);">
                                    <a class="dropdown-item" href="{{ route('srg.admin.stampacts.edit', $stampAct->id) }}">Изменить</a>
                                    <form method="POST" action="{{ route('srg.admin.stampacts.destroy', $stampAct->id) }}">
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
                    <a href="{{ route('srg.admin.stampacts.create', $item->slug) }}" class="list-group-item list-group-item-action">
                        Добавить
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
