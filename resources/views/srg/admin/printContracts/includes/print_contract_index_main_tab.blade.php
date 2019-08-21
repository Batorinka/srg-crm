<div class="form-group">
    <label for="main_contract_id">Название предприятия</label>
    <select name="main_contract_id"
            id="main_contract_id"
            class="form-control"
            placeholder="Название предприятия"
            required>
        @foreach($companyList as $companyOption)
            <option value="{{ $companyOption->id }}">
                {{ $companyOption->company_sub_name }}
            </option>
        @endforeach
    </select>
</div>
