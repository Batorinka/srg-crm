@php
    /** @var \App\Models\Gsobject $item */
@endphp
<div class="form-group">
    <label for="TO_contract_id">Номер договора технического обслуживания узлов измерения</label>
    <select name="TO_contract_id"
            id="TO_contract_id"
            class="form-control"
            placeholder="Введите номер договора технического обслуживания узлов измерения"
            required>
        @foreach($toContractList as $toContractOption)
            <option value="{{ $toContractOption->id }}"
                @if($toContractOption->id ==
                    old('TO_contract_id', $item->TO_contract_id))
                    selected
                @endif>
                {{ $toContractOption->number }} - {{ $toContractOption->mainContract->company_sub_name }}
            </option>
        @endforeach
    </select>
</div>
