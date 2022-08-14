@props(['name'])

<x-form.field>
    <x-form.label name="{{ $name }}" />

    <textarea name="{{ $name }}" 
        class="border border-gray-300 p-2 w-full rounded" 
        value="{{ old($name) }}" 
        rows="6" 
        required></textarea>
                        
            
        <x-form.error name="{{ $name }}"/>
</x-form.field>