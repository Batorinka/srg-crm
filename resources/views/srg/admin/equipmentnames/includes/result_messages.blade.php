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
                @if (session('restore'))
                    <a class="btn btn-outline-light btn-sm" href="{{route('srg.admin.equipmentnames.restore', session()->get('restore'))}}">
                        Восстановить?
                    </a>
                @endif
            </div>
        </div>
    </div>
@endif

