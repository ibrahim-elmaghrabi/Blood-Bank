<div class="col-md-5 city">
    <div class="form-group">
        <div class="inside-select">
            <select name="city_id"  class="form-control" id="clity">
                <option selected disabled>اختر المدينة</option>
                @foreach ($cities as $city )
                    <option value="{{ $city->id }}" @selected(old('city_id') == $city->id) >
                        {{ $city->name }}
                    </option>
                @endforeach
            </select>
            <i class="fas fa-chevron-down"></i>
        </div>
    </div>
</div>