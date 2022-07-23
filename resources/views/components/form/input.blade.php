<div class="form-group">
    <label for="{{ $name }}">{{ $text }}:
        @if ($required)
            <span class="error error-star">*</span>
        @endif
    </label>
    <input class="form-control" type="{{ $type }}" dir="{{ $arb }}" id="{{ $name }}"
        name="{{ $name }}" value="{{ $model != '' ? old($name, $model->$name) : old($name) }}"
        {{ $required ? 'required' : '' }} {{ $disabled ? 'disabled' : '' }} {{ $params ?? '' }}>
    @error($name)
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
