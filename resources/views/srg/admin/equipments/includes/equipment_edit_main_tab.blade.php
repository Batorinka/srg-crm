@php
    /** @var \App\Models\Equipment $item */
@endphp
<input name="gsobject_id" type="text" hidden value="{{ $gsobject->id }}">
<div class="form-group">
    <label for="equipment_name_id">Название оборудования:</label>
    <select name="equipment_name_id"
            id="equipment_name_id"
            class="form-control"
            placeholder="Выберети название оборудования"
            required>
        @foreach($equipment_names as $equipment_name)
            <option value="{{ $equipment_name->id }}"
                @if($equipment_name->id ==
                    old('equipment_name', $item->equipment_name))
                selected
                @endif>
                {{ $equipment_name->title }}
            </option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="quantity">Количество</label>
    <input class="form-control"
           id="quantity"
           type="text"
           placeholder="Введите количество"
           name="quantity"
           value="{{ old('quantity', $item->quantity) }}"
           minlength="1"
           maxlength="3"
           required>
</div>
<div class="form-group">
    <label for="power">Мощность кВт(м3/ч)</label>
    <input class="form-control"
           id="power"
           type="text"
           placeholder="Введите мощность"
           name="power"
           value="{{ old('power', $item->power) }}"
           minlength="1"
           maxlength="100"
           required>
</div>
