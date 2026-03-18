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
                        <form class="mt-6">
                            <div class="mb-6">
                                <label class="block text-gray-800 font-bold mb-2" for="title">
                                    Title
                                </label>
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="title" type="text" placeholder="John Doe">
                            </div>
                            <div class="mb-6">
                                <label class="block text-gray-800 font-bold mb-2" for="salary">
                                    Salary
                                </label>
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="salary" type="number" placeholder="$2,500">
                            </div>
                            <button class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                                Submit
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </form>
</x-layout>
