<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10">
            <x-panel>
            <h1 class="text-center text-xl font-bold" >Register!</h1>
            <form method="POST" action="/register" class="mt-10">
                @csrf

                <x-form.input name="name" type="name" />
                @error ('name')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror

                <x-form.input name="username" type="username" />
                 @error ('username')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
                
               
                <x-form.input name="email" type="email" />
                 @error ('email')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
                <x-form.input name="password" type="password" />
                 @error ('password')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror

                <x-form.button>Submit</x-form.button>
       
                
   


            </form>
            </x-panel>
        </main>
    </section>
</x-layout>    