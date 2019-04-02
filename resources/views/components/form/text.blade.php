<div class="form-group w-50 mx-2">
    <!--{{ Form::label($name, null, ['class' => 'control-label']) }}-->
    {{ Form::text($name, $value, array_merge(['class' => 'form-control'], $attributes)) }}
</div>
