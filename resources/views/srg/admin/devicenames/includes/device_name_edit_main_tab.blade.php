@php
    /** @var \App\Models\DeviceName $item */
    /** @var \App\Models\DeviceType $deviceType */
@endphp
<div class="form-group">
    <label for="device_type_id">Тип прибора:</label>
    <select name="device_type_id"
            id="device_type_id"
            class="form-control"
            placeholder="Выберите тип прибора"
            required>
        @foreach($deviceTypes as $deviceType)
            <option value="{{ $deviceType->id }}"
                    @if($deviceType->id ==
                        old('deviceType', $item->device_type_id))
                    selected
                @endif>
                {{ $deviceType->title }}
            </option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="title">Название прибора</label>
    <input class="form-control"
           id="title"
           type="text"
           placeholder="Введите название прибора"
           name="title"
           value="{{ old('title', $item->title) }}"
           minlength="3"
           required>
</div>
