<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10">
            <x-panel>
            <h1 class="text-center text-xl font-bold" >Log In!</h1>
                <form method="POST" action="/login" class="mt-10">
                @csrf

                <x-form.input name="email" type="email" autocomplete="username" />
                @error ('email')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror

                <x-form.input name="password" type="password" autocomplete="newPassword" />
                @error ('password')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror

                <x-form.button>Log In</x-form.button>

            </form>
            </x-panel>

        </main>
    </section>
</x-layout>