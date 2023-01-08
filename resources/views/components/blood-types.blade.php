<div class="col-md-5 blood">
    <div class="form-group">
        <div class="inside-select">
            <select name="blood_type_id" class="form-control" id="bloodtype">
                <option  selected disabled>اختر فصيلة الدم</option>
                @foreach ($bloodTypes as $bloodType )
                <option value="{{ $bloodType->id }}" {{ old('blood_type_id') == $bloodType->id  ? 'selected' : '' }}>
                    {{ $bloodType->name }}
                </option>
                @endforeach
            </select>
            <i class="fas fa-chevron-down"></i>
        </div>
    </div>
</div>
