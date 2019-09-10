@php
    /** @var \App\Models\Gsobject $item */
@endphp
<div class="form-group">
    <label for="main_contract_id">Название предприятия</label>
    <select name="main_contract_id"
            id="main_contract_id"
            class="form-control"
            placeholder="Выберите предприятие"
            required>
        @foreach($mainContractList as $mainContractOption)
            <option value="{{ $mainContractOption->id }}"
                    @if($mainContractOption->id ==
                        old('main_contract_id', $item->main_contract_id))
                    selected
                @endif>
                {{ $mainContractOption->company_sub_name }}
            </option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="name">Название объекта</label>
    <input class="form-control"
           id="name"
           type="text"
           placeholder="Введите название объекта"
           name="name"
           value="{{ old('name', $item->name) }}"
           minlength="3"
           required>
</div>
<div class="form-group">
    <label for="member_position">Должность ответственного</label>
    <input class="form-control"
           id="member_position"
           type="text"
           placeholder="Введите должность ответственного"
           name="member_position"
           value="{{ old('member_position', $item->member_position) }}"
           minlength="3"
           required>
</div>
<div class="form-group">
    <label for="member_name">ФИО ответственного</label>
    <input class="form-control"
           id="member_name"
           type="text"
           placeholder="Введите ФИО ответственного"
           name="member_name"
           value="{{ old('member_name', $item->member_name) }}"
           minlength="3"
           required>
</div>
<div class="form-group">
    <label for="address">Адрес</label>
    <input class="form-control"
           id="address"
           type="text"
           placeholder="Введите адрес"
           name="address"
           value="{{ old('address', $item->address) }}"
           minlength="3"
           required>
</div>
<div class="form-group">
    <label for="grs">ГРС</label>
    <input class="form-control"
           id="grs"
           type="text"
           placeholder="Введите название ГРС"
           name="grs"
           value="{{ old('grs', $item->grs) }}"
           minlength="3"
           required>
</div>
<div class="form-group">
    <label for="stamp_act_date">Дата последнего акта пломбировки</label>
    <input class="form-control"
           id="stamp_act_date"
           type="date"
           name="stamp_act_date"
           value="{{ old('stamp_act_date', $item->stamp_act_date) }}"
           required>
</div>
<div class="form-group">
    <label for="pressure_unit_id">Единица измерения давления в корректоре</label>
    <select name="pressure_unit_id"
            id="pressure_unit_id"
            class="form-control"
            placeholder="Выберите единицу измерения давления в корректоре"
            required>
        @foreach($pressureUnitList as $pressureUnitOption)
            <option value="{{ $pressureUnitOption->id }}"
                    @if($pressureUnitOption->id ==
                        old('pressure_unit_id', $item->pressure_unit_id))
                    selected
                @endif>
                {{ $pressureUnitOption->title }}
            </option>
        @endforeach
    </select>
</div>
