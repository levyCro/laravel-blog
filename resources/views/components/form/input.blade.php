@props(['name', 'type' => 'text'])

<x-form.field>
    <x-form.label name="{{ $name }}" />

    <input type="{{ $type }}" 
           name="{{ $name }}" id="{{ $name }}" 
           value="{{ old($name) }}" 
           required 
           class="border border-gray-300 p-2 w-full rounded"
           {{ $attributes }}>
  
    <x-form.error name="{{ $name }}"/>
</x-form.field>