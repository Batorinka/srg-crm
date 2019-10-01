@php
    /** @var \App\Models\Limit $item */
@endphp
<input name="gsobject_id" type="text" hidden value="{{ $gsobject->id }}">
<div class="form-group">
    <label for="year">Объем газа от</label>
    <input class="form-control"
           id="year"
           type="text"
           placeholder="Введите год"
           name="year"
           value="{{ old('year', $item->year) }}"
           minlength="4"
           maxlength="4"
           required>
</div>
<div class="form-group">
    <label for="supplier">Поставщик газа (Например: ООО «Газпром межрегионгаз Москва»):</label>
    <input class="form-control"
           id="supplier"
           type="text"
           placeholder="Введите поставщика"
           name="supplier"
           value="{{ old('supplier', $item->supplier) }}"
           minlength="3"
           required>
</div>
<div class="form-group">
    <label for="group_id">Группа конечного потребителя:</label>
    <select name="group_id"
            id="group_id"
            class="form-control"
            placeholder="Введите группу конечного потребителя"
            required>
        @foreach($groups as $group)
            <option value="{{ $group->id }}"
                    @if($group->id ==
                        old('group_id', $item->group_id))
                    selected
                @endif>
                {{ $group->title }}
            </option>
        @endforeach
    </select>
</div>

