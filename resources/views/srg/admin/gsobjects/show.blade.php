@extends('layouts.app')

@section('content')
    @php
        /** @var \App\Models\Gsobject $item */
    @endphp
    <div class="container">
        @include('srg.admin.gsobjects.includes.result_messages')
        <div class="row justify-content-center">
            <div class="col-md-12">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#info" style="">Общая информация</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#stamps" style="">Пломбы</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#limits" style="">Лимиты</a>
                    </li>
                </ul>
                <div id="myTabContent" class="tab-content">
                    @include('srg.admin.gsobjects.includes.gsobject_show_info_tab')
                    @include('srg.admin.gsobjects.includes.gsobject_show_stamps_tab')
                    @include('srg.admin.gsobjects.includes.gsobject_show_limits_tab')
                </div>
            </div>
        </div>
    </div>
@endsection
