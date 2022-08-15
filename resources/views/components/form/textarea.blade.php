@props(['name'])

<x-form.field>
    <x-form.label name="{{ $name }}" />

    <textarea name="{{ $name }}" 
        class="border border-green-300 p-2 w-full rounded" 
        rows="6" 
        required
        {{ $attributes }}>
        {{ $slot ?? old($name) }}
    </textarea>
                        
            
        <x-form.error name="{{ $name }}"/>
</x-form.field>