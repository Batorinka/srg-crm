@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <a href="{{ route('srg.admin.maincontracts.index') }}">
                <div class="card text-white bg-info mb-3">
                    <div class="card-header">Список предприятий</div>
                    <div class="card-body d-none d-sm-block">
                        <p>
                            В данном меню можно добавлять, редактировать или удалять информацию о предприятие:
                        </p>
                        <ul>
                            <li>
                                Название предприятия
                            </li>
                            <li>
                                Информация о договоре транспортировки газа
                            </li>
                            <li>
                                Информация о подписанте договора
                            </li>
                            <li>
                                Реквизиты предприятия
                            </li>
                            <li>
                                Договор поставки газа
                            </li>
                        </ul>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-6">
            <a href="{{ route('srg.admin.printcontract.index') }}">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-header">Печать договорных документов</div>
                    <div class="card-body d-none d-sm-block">
                        <p>В данном меню можно сформировать договор или дополнительное соглашение для печати.</p>
                        <p>Для этого необходимо выбрать шаблон документа и одно или несколько предприятий.</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-6">
            <a href="{{ route('srg.admin.gsobjects.index') }}">
                <div class="card text-white bg-info mb-3">
                    <div class="card-header">Список объектов</div>
                    <div class="card-body d-none d-sm-block">
                        <p>
                            В данном меню можно добавлять, редактировать или удалять информацию об объекте:
                        </p>
                        <ul>
                            <li>
                                Название название объекта(ГРП, котельная и т.д.)
                            </li>
                            <li>
                                Адрес объекта
                            </li>
                            <li>
                                Информация об ответственном лице на объекте(мастер котельной, главный энергетик и т.д.)
                            </li>
                            <li>
                                Дата акта установки пломб
                            </li>
                            <li>
                                и другое...
                            </li>
                        </ul>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-6">
            <a href="{{ route('srg.admin.setupvalues.index') }}">
                <div class="card text-white bg-warning mb-3">
                    <div class="card-header">Информация о Мособлгазе</div>
                    <div class="card-body d-none d-sm-block">
                        <p>
                            В данном меню можно посмотреть и отредактировать информацию о Мособлгазе:
                        </p>
                        <ul>
                            <li>
                                Тарифы на услуги по транспортировке газа
                            </li>
                            <li>
                                и другое...
                            </li>
                        </ul>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-6">
            <a href="{{ route('srg.admin.devicenames.index') }}">
                <div class="card text-white bg-danger mb-3">
                    <div class="card-header">Справочник приборов учета газа</div>
                    <div class="card-body d-none d-sm-block">
                        <p>
                            В данном меню можно добавлять, редактировать или удалять информацию о приборах учета газа:
                        </p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-6">
            <a href="{{ route('srg.admin.equipmentnames.index') }}">
                <div class="card text-white bg-danger mb-3">
                    <div class="card-header">Справочник газоиспользующего оборудования</div>
                    <div class="card-body d-none d-sm-block">
                        <p>
                            В данном меню можно добавлять, редактировать или удалять информацию о газоиспользующем оборудование:
                        </p>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
@endsection
