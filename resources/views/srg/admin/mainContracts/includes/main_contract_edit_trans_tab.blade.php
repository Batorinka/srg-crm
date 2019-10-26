@php
    /** @var \App\Models\MainContract $item */
@endphp
<div class="form-group">
    <label for="main_contract_type_id">Тип договора</label>
    <select name="main_contract_type_id"
            id="main_contract_type_id"
            class="form-control"
            placeholder="Тип договора"
            required>
        @foreach($categoryList as $categoryOption)
            <option value="{{ $categoryOption->id }}"
                @if($categoryOption->id ==
                    old('main_contract_type_id', $item->main_contract_type_id))
                    selected
                @endif>
                {{ $categoryOption->title }}
            </option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="number">Номер договора</label>
    <input class="form-control"
           id="number"
           type="text"
           placeholder="Номер договора"
           name="number"
           value="{{ old('number', $item->number) }}"
           minlength="3"
           required>
</div>
<div class="form-group">
    <label for="signing_date">Дата подписания договора</label>
    <input class="form-control"
           id="signing_date"
           type="date"
           name="signing_date"
           value="{{ old('signing_date', $item->signing_date) }}"
           required>
</div>
<div class="form-group">
    <label for="start_date">Срок действия договора (от)</label>
    <input class="form-control"
           id="start_date"
           type="date"
           name="start_date"
           value="{{ old('start_date', $item->start_date) }}"
           required>
</div>
<div class="form-group">
    <label for="start_date">Срок действия договора (до)</label>
    <input class="form-control"
           type="date"
           name="end_date"
           value="{{ old('end_date', $item->end_date) }}"
           required>
</div>
<div class="form-group">
    <label for="supply_contract">Договор поставки газа</label>
        <input class="form-control"
               id="supply_contract"
               type="text"
               placeholder="Договор поставки газа"
               name="supply_contract"
               value="{{ old('supply_contract', $item->supply_contract) }}"
               minlength="3"
               required>
</div>
<div class="form-group">
    <label>Тепловырабатывающее</label>
    <div class="custom-control custom-radio">
        <input type="radio" id="is_heat_generating1" name="is_heat_generating" value="1" class="custom-control-input" @if($item->is_heat_generating) checked @endif>
        <label class="custom-control-label" for="is_heat_generating1">Да</label>
    </div>
    <div class="custom-control custom-radio">
        <input type="radio" id="is_heat_generating2" name="is_heat_generating" value="0" class="custom-control-input" @if(!$item->is_heat_generating) checked @endif>
        <label class="custom-control-label" for="is_heat_generating2">Нет</label>
    </div>
</div>
<div class="form-group">
    <label for="contract_clause_7_6">Пункт используемый в пункте 7.6 договора</label>
    <input class="form-control"
           id="contract_clause_7_6"
           type="text"
           placeholder="Пункт используемый в пункте 7.6 договора"
           name="contract_clause_7_6"
           value="{{ old('contract_clause_7_6', $item->contract_clause_7_6) }}">
</div>
