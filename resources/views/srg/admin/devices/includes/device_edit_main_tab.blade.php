@php
    /** @var \App\Models\Device $item */
@endphp
<input name="gsobject_id" type="text" hidden value="{{ $gsobject->id }}">
<div class="form-group">
    <label for="device_name_id">Марка прибора:</label>
    <select name="device_name_id"
            id="device_name_id"
            class="form-control"
            placeholder="Введите марку прибора"
            required>
        @foreach($device_names as $device_name)
            <option value="{{ $device_name->id }}"
                @if($device_name->id ==
                    old('device_name', $item->device_name))
                selected
                @endif>
                {{ $device_name->title }}
            </option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="number">Заводской номер</label>
    <input class="form-control"
           id="number"
           type="text"
           placeholder="Введите заводской номер"
           name="number"
           value="{{ old('number', $item->number) }}"
           minlength="3"
    required>
</div>
<div class="form-group">
    <label for="last_muster_date">Дата последнего поверки</label>
    <input class="form-control"
           id="last_muster_date"
           type="date"
           name="last_muster_date"
           value="{{ old('last_muster_date', $item->last_muster_date) }}"
           required>
</div>
<div class="form-group">
    <label for="muster_interval">Межповерочный интервал</label>
    <input class="form-control"
           id="muster_interval"
           type="text"
           placeholder="Введите межповерочный интервал"
           name="muster_interval"
           value="{{ old('muster_interval', $item->muster_interval) }}"
           minlength="1"
           maxlength="2"
           required>
</div>
<div class="form-group">
    <label for="range">Диапазон измерения</label>
    <input class="form-control"
           id="range"
           type="text"
           placeholder="Введите диапазон измерения"
           name="range"
           value="{{ old('range', $item->range) }}"
           minlength="3"
           required>
</div>
