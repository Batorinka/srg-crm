@php
    /** @var \App\Models\MainContract $item */
@endphp
<div class="form-group">
    <label for="company_sub_name">Краткое название предприятия</label>
    <input class="form-control"
           id="company_sub_name"
           type="text"
           placeholder="Введите краткое название предприятия"
           name="company_sub_name"
           value="{{ old('company_sub_name', $item->company_sub_name) }}"
           minlength="3"
           required>
</div>
<div class="form-group">
    <label for="company_full_name">Полное название предприятия</label>
    <input class="form-control"
           id="company_full_name"
           type="text"
           placeholder="Введите полное название предприятия"
           name="company_full_name"
           value="{{ old('company_full_name', $item->company_full_name) }}"
           minlength="3"
           required>
</div>
<div class="form-group">
    <label for="contractor_position">Должность руководителя</label>
    <input class="form-control"
           id="contractor_position"
           type="text"
           placeholder="Введите должность руководителя"
           name="contractor_position"
           value="{{ old('contractor_position', $item->contractor_position) }}"
           minlength="3"
           required>
</div>
<div class="form-group">
    <label for="contractor_name">ФИО руководителя</label>
    <input class="form-control"
           id="contractor_name"
           type="text"
           placeholder="Введите ФИО руководителя"
           name="contractor_name"
           value="{{ old('contractor_name', $item->contractor_name) }}"
           minlength="3"
           required>
</div>
<div class="form-group">
    <label for="contractor_cause">Документ на основание которого действует руководитель</label>
    <input class="form-control"
           id="contractor_cause"
           type="text"
           placeholder="Введите документ на основание которого действует руководитель"
           name="contractor_cause"
           value="{{ old('contractor_cause', $item->contractor_cause) }}"
           minlength="3"
           required>
</div>
<div class="form-group">
    <label for="requisites">Реквизиты предприятия</label>
    <textarea class="form-control"
              id="requisites"
              placeholder="Введите реквизиты предприятия"
              name="requisites"
              rows="10"
              minlength="3"
              required>{{ old('requisites', $item->requisites) }}</textarea>
</div>
