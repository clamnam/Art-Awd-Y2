@props(['disabled' => false, 'field' => '', 'value' => ''])
{{-- if theres nothing entered it wont let you submit --}}
<textarea {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
    'class' =>
        'rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50',
]) !!}>{{ $value }}</textarea>
{{-- adds an error message where requirments above arent met --}}
@error($field)
    <div class="text-red-600 text-sm">{{ $message }}</div>
@enderror
