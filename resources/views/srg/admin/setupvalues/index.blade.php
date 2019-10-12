@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Информация о Мособлгазе</h3>
        <a class="btn btn-outline-success mb-3" href="{{ route('srg.admin.setupvalues.edit', $setupValues->id) }}">Редактировать</a>
        @include('srg.admin.setupvalues.includes.result_messages')
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5>Тарифы на услуги по транспортировке газа (без НДС)</h5>
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Группа потребления</th>
                                <th>Цена</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php /** @var \App\Models\SetupValue $setupValues */ @endphp
                            <tr>
                                <td>свыше 500 млн.м3 в год включительно</td>
                                <td>{{ $setupValues->zero_group }} руб./1000 куб.м.</td>
                            </tr>
                            <tr>
                                <td>от 100 до 500 млн.м3 в год включительно</td>
                                <td>{{ $setupValues->first_group }} руб./1000 куб.м.</td>
                            </tr>
                            <tr>
                                <td>от 10 до 100 млн.м3 в год включительно</td>
                                <td>{{ $setupValues->second_group }} руб./1000 куб.м.</td>
                            </tr>
                            <tr>
                                <td>от 1 до 10 млн.м3 в год включительно</td>
                                <td>{{ $setupValues->third_group }} руб./1000 куб.м.</td>
                            </tr>
                            <tr>
                                <td>от 0.1 до 1 млн.м3 в год включительно</td>
                                <td>{{ $setupValues->fourth_group }} руб./1000 куб.м.</td>
                            </tr>
                            <tr>
                                <td>от 0.01 до 0.1 млн.м3 в год включительно</td>
                                <td>{{ $setupValues->fifth_group }} руб./1000 куб.м.</td>
                            </tr>
                            <tr>
                                <td>до 10 тыс.м3 в год включительно</td>
                                <td>{{ $setupValues->sixth_group }} руб./1000 куб.м.</td>
                            </tr>
                            <tr>
                                <td>Спецнадбавка</td>
                                <td>{{ $setupValues->special_increase }} руб./1000 куб.м.</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
