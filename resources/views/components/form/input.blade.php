@props(['name', 'type' => 'text'])

<x-form.field>
    <x-form.label name="{{ $name }}" />

    <input type="{{ $type }}" 
           name="{{ $name }}" id="{{ $name }}" 
           class="border border-green-300 p-2 w-full rounded"
           {{ $attributes(['value' => old($name)]) }}>
  
    <x-form.error name="{{ $name }}"/>
</x-form.field>