<label for="{{ $fieldId }}" class="form-label">{{ $label }}</label>

<input type="{{  $type }}"
        class="form-control @error($fieldId) is-invalid @enderror"
        id="{{ $fieldId }}"
        name="{{  $fieldId }}"
        value="{{ old($fieldId, $model->{$fieldId}) }}" />

<div id="{{ $fieldId }}Help" class="form-text">{{ $helpText }}</div>

@error($fieldId)
    <div class="invalid-feedback">
        {{ $message }}
    </div>
@enderror
