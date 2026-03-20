<x-layout>
    <x-slot:heading>
        Register
    </x-slot:heading>

    <form method="POST" action="/login">
        @csrf

        <div class="container mx-auto p4-10">
            <div class="max-w-md mx-auto bg-white rounded-lg overflow-hidden md:max-w-xl">
                <div class="md:flex">
                    <div class="w-full px-6 py-8 md:p-8">


                            <div class="mb-6">
                                <x-form-field>
                                    <x-form-label for="email">eMail</x-form-label>
                                    <x-form-input name="email" id="email" type="email" :value="old('email')" placeholder="email@email.com" required/>
                                    <x-form-error name="email"/>
                                </x-form-field>
                            </div>

                            <div class="mb-6">
                                <x-form-field>
                                    <x-form-label for="password">Password</x-form-label>
                                    <x-form-input name="password" id="password" placeholder="password" type="password" required/>
                                    <x-form-error name="password"/>
                                </x-form-field>
                            </div>


                            <div class="mb-6 flex justify-end">
                                <a href="/" class=" text-gray-800 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mr-5">Cancel</a>

                                <x-form-submit-button>Login</x-form-submit-button>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</x-layout>
