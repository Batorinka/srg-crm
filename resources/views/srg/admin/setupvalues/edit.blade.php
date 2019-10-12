@extends('layouts.app')

@section('content')
    @php
        /** @var \App\Models\SetupValue $item */
    @endphp
    <div class="container">
        @include('srg.admin.setupvalues.includes.result_messages')

        <form method="POST" action="{{ route('srg.admin.setupvalues.update', $item->id) }}">
        @method('PATCH')
        {{ csrf_field() }}
        <div class="row justify-content-center">
            <div class="col-md-12">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#prices" style="">Тарифы</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#other" style="">Другое</a>
                    </li>
                </ul>
                <div id="myTabContent" class="tab-content">
                    <div class="tab-pane fade active show card border-primary mb-3" id="prices">
                        <div class="card-body">
                            @include('srg.admin.setupvalues.includes.setupvalue_edit_price_tab')
                        </div>
                    </div>
                    <div class="tab-pane fade card border-primary mb-3" id="other">
                        <div class="card-body">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="list-group">
                    <button type="submit" class="list-group-item list-group-item-action">Сохранить</button>
                </div>
            </div>
        </div>
        </form>
    </div>
@endsection
