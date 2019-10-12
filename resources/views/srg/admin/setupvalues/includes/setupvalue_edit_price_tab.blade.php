<h5>Тарифы на услуги по транспортировке газа (без НДС)</h5>
<table class="table table-hover">
    <thead>
    <tr>
        <th>Группа потребления</th>
        <th>Цена</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    @php /** @var \App\Models\SetupValue $item */ @endphp
    <tr>
        <td>свыше 500 млн.м3 в год включительно</td>
        <td>
            <input class="form-control-plaintext"
                   id="zero_group"
                   type="text"
                   name="zero_group"
                   value="{{ old('zero_group', $item->zero_group) }}"
                   required>
        </td>
        <td>руб./1000 куб.м.</td>
    </tr>
    <tr>
        <td>от 100 до 500 млн.м3 в год включительно</td>
        <td>
            <input class="form-control-plaintext"
                   id="first_group"
                   type="text"
                   name="first_group"
                   value="{{ old('first_group', $item->first_group) }}"
                   required>
        </td>
        <td>руб./1000 куб.м.</td>
    </tr>
    <tr>
        <td>от 10 до 100 млн.м3 в год включительно</td>
        <td>
            <input class="form-control-plaintext"
                   id="second_group"
                   type="text"
                   name="second_group"
                   value="{{ old('second_group', $item->second_group) }}"
                   required>
        </td>
        <td>руб./1000 куб.м.</td>
    </tr>
    <tr>
        <td>от 1 до 10 млн.м3 в год включительно</td>
        <td>
            <input class="form-control-plaintext"
                   id="third_group"
                   type="text"
                   name="third_group"
                   value="{{ old('third_group', $item->third_group) }}"
                   required>
        </td>
        <td>руб./1000 куб.м.</td>
    </tr>
    <tr>
        <td>от 0.1 до 1 млн.м3 в год включительно</td>
        <td>
            <input class="form-control-plaintext"
                   id="fourth_group"
                   type="text"
                   name="fourth_group"
                   value="{{ old('fourth_group', $item->fourth_group) }}"
                   required>
        </td>
        <td>руб./1000 куб.м.</td>
    </tr>
    <tr>
        <td>от 0.01 до 0.1 млн.м3 в год включительно</td>
        <td>
            <input class="form-control-plaintext"
                   id="fifth_group"
                   type="text"
                   name="fifth_group"
                   value="{{ old('fifth_group', $item->fifth_group) }}"
                   required>
        </td>
        <td>руб./1000 куб.м.</td>
    </tr>
    <tr>
        <td>до 10 тыс.м3 в год включительно</td>
        <td>
            <input class="form-control-plaintext"
                   id="sixth_group"
                   type="text"
                   name="sixth_group"
                   value="{{ old('sixth_group', $item->sixth_group) }}"
                   required>
        </td>
        <td>руб./1000 куб.м.</td>
    </tr>
    <tr>
        <td>Спецнадбавка</td>
        <td>
            <input class="form-control-plaintext"
                   id="special_increase"
                   type="text"
                   name="special_increase"
                   value="{{ old('special_increase', $item->special_increase) }}"
                   required>
        </td>
        <td>руб./1000 куб.м.</td>
    </tr>
    </tbody>
</table>
