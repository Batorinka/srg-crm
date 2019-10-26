@php
    /** @var \App\Models\MainContract $item */
    /** @var \App\Models\Gsobject $gsobjects */
@endphp
<h4 class="card-title">{{ $item->company_sub_name }}</h4>
<ul>
    @foreach($gsobjects as $gsobject)
        <li>
            <a href="{{ route('srg.admin.gsobjects.show', $gsobject->slug) }}">
                {{ $gsobject->name }}
            </a>
        </li>
    @endforeach
</ul>
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="list-group">
            <a href="{{ route('srg.admin.gsobjects.create', $item->slug) }}" class="list-group-item list-group-item-action">
                Добавить
            </a>
        </div>
    </div>
</div>
