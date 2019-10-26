@php
    /** @var \App\Models\MainContract $item */
@endphp
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
    <tr>
        <th>Тип предприятия</th>
        <td>
            {{ $item->is_industry }}
        </td>
    </tr>
    <tr>
        <th>Тепловырабатывающее предприятие</th>
        <td>
            {{ $item->is_heat_generating }}
        </td>
    </tr>
    <tr>
        <th>Пункт используемый в пункте 7.6 договора</th>
        <td>
            {{ $item->contract_clause_7_6 }}
        </td>
    </tr>
    </tbody>
</table>
