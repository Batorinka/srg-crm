@php
    /** @var \App\Models\EquipmentName $item */
@endphp
<div class="form-group">
    <label for="title">Название оборудования</label>
    <input class="form-control"
           id="title"
           type="text"
           placeholder="Введите название оборудования"
           name="title"
           value="{{ old('title', $item->title) }}"
           minlength="3"
           required>
</div>
