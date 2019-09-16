@php
    /** @var \App\Models\StampAct $item */
@endphp
<input name="gsobject_id" type="text" hidden value="{{ $gsobject->id }}">
<div class="form-group">
    <label for="place">Место установки пломбы</label>
    <input class="form-control"
           id="place"
           type="text"
           placeholder="Введите место установки пломбы"
           name="place"
           value="{{ old('place', $item->place) }}"
           minlength="3"
           required>
</div>
<div class="form-group">
    <label for="number">Номер пломбы</label>
    <input class="form-control"
           id="number"
           type="text"
           placeholder="Введите номер пломбы"
           name="number"
           value="{{ old('number', $item->number) }}"
           minlength="3"
           required>
</div>
