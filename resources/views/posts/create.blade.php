<x-layout>
    <section class="px-6 py-8">
        <x-panel class="max-w-sm mx-auto">
        <form action="/admin/posts" method="POST">
            @csrf
            
                <div class="mb-6">
                    <label for="title" class="block mb-2 uppercase font-bold text-xs text-gray-700">Title</label>
                    <input type="text" name="title" id="title" value="{{ old('title') }}" required class="border border-gray-400 p-2 w-full">
                    @error('title')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="slug" class="block mb-2 uppercase font-bold text-xs text-gray-700">Slug</label>
                    <input type="text" name="slug" id="slug" value="{{ old('slug') }}" required class="border border-gray-400 p-2 w-full">
                    @error('slug')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>


                <div class="mb-6">
                    <textarea name="excerpt" 
                        class="border border-gray-400 p-2 w-full" 
                        value="{{ old('excerpt')}}" 
                        rows="6" 
                        placeholder="Please, enter your excerpt here!"
                        required></textarea>
                        
            
                    @error ('excerpt')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                 </div>
                 <div class="mb-6">
                    <textarea name="body" 
                        class="border border-gray-400 p-2 w-full"  
                        value="{{ old('body') }}"
                        rows="6" 
                        placeholder="Please, enter your story here!"
                        required></textarea>
                        
            
                    @error ('body')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                 </div>

                  <div class="mb-6">
                    <label for="category_id" class="block mb-2 uppercase font-bold text-xs text-gray-700">Category</label>

                    <select name="category_id" id="category_id">
                   
                    @foreach (\App\Models\Category::all() as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ ucwords($category->name) }}</option>
                    @endforeach
                    
                    </select>

                    @error('category')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                 <x-submit-button>Publish</x-submit-button>
                 
                
        </form>
        </x-panel>
    </section>
</x-layout>