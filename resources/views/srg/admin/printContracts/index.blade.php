@extends('layouts.app')

@section('content')
    <div class="container">
        @include('srg.admin.printContracts.includes.result_messages')

        <form method="POST" action="{{ route('srg.admin.printcontract.print') }}">
        {{ csrf_field() }}
        <input name="user_id" type="text" hidden value="{{ \Auth::user()->id }}">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#choice" style="">Выбор параметров</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#help" style="">Помощь</a>
                    </li>
                </ul>
                <div id="myTabContent" class="tab-content">
                    <div class="tab-pane fade active show card border-primary mb-3" id="choice">
                        <div class="card-body">
                            @include('srg.admin.printContracts.includes.print_contract_index_main_tab')
                        </div>
                    </div>
                    <div class="tab-pane fade card border-primary mb-3" id="help">
                        <div class="card-body">
                            @include('srg.admin.printContracts.includes.print_contract_index_help_tab')
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="list-group">
                    <button type="submit" class="list-group-item list-group-item-action">Сформировать</button>
                </div>
            </div>
        </div>
        </form>
    </div>
@endsection
