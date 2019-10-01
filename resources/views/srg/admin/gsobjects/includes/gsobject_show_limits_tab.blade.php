@php
    /** @var \App\Models\Gsobject $item */
@endphp
<div class="tab-pane fade card border-primary mb-3" id="limits">
    <div class="card-body">
        <h4 class="card-title">Лимиты</h4>
        <div class="accordion" id="accordionLimits">
            @foreach($limits as $limit)
            <div class="card border-light">
                <div class="card-header" id="headingLimit{{ $limit->year }}">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#limit{{ $limit->year }}" aria-expanded="false" aria-controls="limit{{ $limit->year }}">
                        Объем газа за {{ $limit->year }} год
                    </button>
                </div>
                <div id="limit{{ $limit->year }}" class="collapse" aria-labelledby="headingLimit{{ $limit->year }}" data-parent="#accordionLimits">
                    <div class="card-body">
                        <p>Поставщик газа: <strong>{{ $limit->supplier }}</strong></p>
                        <p>Группа конечного потребителя: <strong>{{ $limit->group->title }}</strong></p>
                        <table class="table table-limits">
                            <thead>
                            <tr class="table-dark">
                                <th>Договор поставки: 4-а</th>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>{{ $limit->total_4 }}</td>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th>I квартал</th>
                                <td>{{ $limit->jan_4 }}</td>
                                <td>{{ $limit->feb_4 }}</td>
                                <td>{{ $limit->mar_4 }}</td>
                                <td class="table-primary">{{ $limit->quarterI_4 }}</td>
                            </tr>
                            <tr>
                                <th>II квартал</th>
                                <td>{{ $limit->apr_4 }}</td>
                                <td>{{ $limit->may_4 }}</td>
                                <td>{{ $limit->jun_4 }}</td>
                                <td class="table-primary">{{ $limit->quarterII_4 }}</td>
                            </tr>
                            <tr>
                                <th>III квартал</th>
                                <td>{{ $limit->jul_4 }}</td>
                                <td>{{ $limit->aug_4 }}</td>
                                <td>{{ $limit->sep_4 }}</td>
                                <td class="table-primary">{{ $limit->quarterIII_4 }}</td>
                            </tr>
                            <tr>
                                <th>III квартал</th>
                                <td>{{ $limit->oct_4 }}</td>
                                <td>{{ $limit->nov_4 }}</td>
                                <td>{{ $limit->dec_4 }}</td>
                                <td class="table-primary">{{ $limit->quarterIV_4 }}</td>
                            </tr>
                            </tbody>
                        </table>
                        <table class="table table-limits">
                            <thead>
                            <tr class="table-dark">
                                <th>Договор поставки: 8-а</th>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>{{ $limit->total_8 }}</td>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th>I квартал</th>
                                <td>{{ $limit->jan_8 }}</td>
                                <td>{{ $limit->feb_8 }}</td>
                                <td>{{ $limit->mar_8 }}</td>
                                <td class="table-primary">{{ $limit->quarterI_8 }}</td>
                            </tr>
                            <tr>
                                <th>II квартал</th>
                                <td>{{ $limit->apr_8 }}</td>
                                <td>{{ $limit->may_8 }}</td>
                                <td>{{ $limit->jun_8 }}</td>
                                <td class="table-primary">{{ $limit->quarterII_8 }}</td>
                            </tr>
                            <tr>
                                <th>III квартал</th>
                                <td>{{ $limit->jul_8 }}</td>
                                <td>{{ $limit->aug_8 }}</td>
                                <td>{{ $limit->sep_8 }}</td>
                                <td class="table-primary">{{ $limit->quarterIII_8 }}</td>
                            </tr>
                            <tr>
                                <th>III квартал</th>
                                <td>{{ $limit->oct_8 }}</td>
                                <td>{{ $limit->nov_8 }}</td>
                                <td>{{ $limit->dec_8 }}</td>
                                <td class="table-primary">{{ $limit->quarterIV_8 }}</td>
                            </tr>
                            </tbody>
                        </table>
                        <table class="table table-limits">
                            <thead>
                            <tr class="table-dark">
                                <th>Договор поставки: 10-а</th>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>{{ $limit->total_10 }}</td>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th>I квартал</th>
                                <td>{{ $limit->jan_10 }}</td>
                                <td>{{ $limit->feb_10 }}</td>
                                <td>{{ $limit->mar_10 }}</td>
                                <td class="table-primary">{{ $limit->quarterI_10 }}</td>
                            </tr>
                            <tr>
                                <th>II квартал</th>
                                <td>{{ $limit->apr_10 }}</td>
                                <td>{{ $limit->may_10 }}</td>
                                <td>{{ $limit->jun_10 }}</td>
                                <td class="table-primary">{{ $limit->quarterII_10 }}</td>
                            </tr>
                            <tr>
                                <th>III квартал</th>
                                <td>{{ $limit->jul_10 }}</td>
                                <td>{{ $limit->aug_10 }}</td>
                                <td>{{ $limit->sep_10 }}</td>
                                <td class="table-primary">{{ $limit->quarterIII_10 }}</td>
                            </tr>
                            <tr>
                                <th>III квартал</th>
                                <td>{{ $limit->oct_10 }}</td>
                                <td>{{ $limit->nov_10 }}</td>
                                <td>{{ $limit->dec_10 }}</td>
                                <td class="table-primary">{{ $limit->quarterIV_10 }}</td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <div class="list-group">
                                    <a href="{{ route('srg.admin.limits.edit', $limit->id) }}" class="list-group-item list-group-item-action">
                                        Изменить
                                    </a>
                                    <form method="POST" action="{{ route('srg.admin.limits.destroy', $limit->id) }}">
                                        @method('DELETE')
                                        {{ csrf_field() }}
                                        <button type="submit" class="list-group-item list-group-item-action">Удалить</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="card border-light">
                <div class="card-header" id="headingLimitAdd">
                    <a class="btn btn-link collapsed" href="{{ route('srg.admin.limits.create', $item->slug) }}">Добавить</a>
                </div>
            </div>
        </div>
    </div>
</div>
