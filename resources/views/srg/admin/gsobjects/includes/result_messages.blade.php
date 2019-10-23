@if($errors->any())
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <ul>
                    @foreach($errors->all() as $errorTxt)
                        <li>{{ $errorTxt }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endif

@if(session('success'))
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                {{ session()->get('success') }}
                @if (session('restore') and session('title') == 'gsobject')
                    <a class="btn btn-outline-light btn-sm" href="{{route('srg.admin.gsobjects.restore', session()->get('restore'))}}">
                        Восстановить?
                    </a>
                @elseif (session('restore') and session('title') == 'stampact')
                    <a class="btn btn-outline-light btn-sm" href="{{route('srg.admin.stampacts.restore', session()->get('restore'))}}">
                        Восстановить?
                    </a>
                @elseif (session('restore') and session('title') == 'limit')
                    <a class="btn btn-outline-light btn-sm" href="{{route('srg.admin.limits.restore', session()->get('restore'))}}">
                        Восстановить?
                    </a>
                @elseif (session('restore') and session('title') == 'device')
                    <a class="btn btn-outline-light btn-sm" href="{{route('srg.admin.devices.restore', session()->get('restore'))}}">
                        Восстановить?
                    </a>
                @elseif (session('restore') and session('title') == 'equipment')
                    <a class="btn btn-outline-light btn-sm" href="{{route('srg.admin.equipments.restore', session()->get('restore'))}}">
                        Восстановить?
                    </a>
                @endif
            </div>
        </div>
    </div>
@endif

