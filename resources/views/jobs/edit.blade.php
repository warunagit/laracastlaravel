<x-layout>
    <x-slot:heading>
        Edit Job {{ $job->title }}
    </x-slot:heading>

    <form method="POST" action="/jobs/{{ $job->id }}">
        @csrf

        <div class="container mx-auto p4-10">
            <div class="max-w-md mx-auto bg-white rounded-lg overflow-hidden md:max-w-xl">
                <div class="md:flex">
                    <div class="w-full px-6 py-8 md:p-8">
                            <div class="mb-6">
                                <label class="block text-gray-800 font-bold mb-2" for="title">
                                    Title
                                </label>
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="title" type="text" placeholder="John Doe" name="title"
                                value="{{ $job->title }}"
                                required>

                                @error('title')
                                    <p class="text-xs text-red-500 text-semibold mt-1">{{ $message }}</p>
                                @enderror

                            </div>

                            <div class="mb-6">
                                <label class="block text-gray-800 font-bold mb-2" for="salary">
                                    Salary
                                </label>
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="salary" type="number" placeholder="$2,500" name="salary"
                                value="{{ $job->salary }}"
                                required>

                                @error('salary')
                                    <p class="text-xs text-red-500 text-semibold mt-1">{{ $message }}</p>
                                @enderror

                            </div>

                            <div class="mb-6 justify-self-end ">
                                <a href="/jobs/{{ $job->id }}" class=" text-gray-800 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mr-5">
                                    Cancel
                                </a>
                                <button class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                                    Update
                                </button>
                            </div>

                    </div>
                </div>
            </div>
        </div>
    </form>
</x-layout>
