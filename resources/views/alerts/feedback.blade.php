@if ($errors->has($field))
    <span class="invalid-feedback" style="display: block; font-size: 12px; color: red; margin-top: 0;">
        {{ $errors->first($field) }}
    </span>
@endif
