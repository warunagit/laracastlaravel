<x-layout>
    <x-slot:heading>
        Create Job
    </x-slot:heading>

    <form method="POST" action="/jobs">
        @csrf

        <div class="container mx-auto p4-10">
            <div class="max-w-md mx-auto bg-white rounded-lg overflow-hidden md:max-w-xl">
                <div class="md:flex">
                    <div class="w-full px-6 py-8 md:p-8">
                        <h2 class="text-2xl font-bold text-gray-800">Create a New Job</h2>
                        <p class="mt-4 text-gray-600">Please fill out the form below to complete your purchase.</p>

                            <div class="mb-6">
                                <x-form-field>
                                    <x-form-label for="title">Title</x-form-label>
                                    <x-form-input name="title" id="title" type="text" placeholder="CEO" required/>
                                    <x-form-error name="title"/>
                                </x-form-field>
                            </div>

                            <div class="mb-6">
                                <x-form-field>
                                    <x-form-label for="salary">Salary</x-form-label>
                                    <x-form-input name="salary" id="salary" placeholder="2500" type="number" required/>
                                    <x-form-error name="salary"/>
                                </x-form-field>
                            </div>

                            <x-form-submit-button>Save</x-form-submit-button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</x-layout>
