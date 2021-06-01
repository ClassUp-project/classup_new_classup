<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }} &#128187;
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div>

                <div class="bg-indigo-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md" role="alert">
                    <div class="flex">
                        <div>
                                @can('isAdmin')
                                    <p class="font-bold">
                                        Bonjour! Prêt à envoyer vos cours à vos élèves.
                                    </p>
                                @else
                                    <p class="font-bold">
                                        Hello! prêt à checker tes cours.
                                    <p>
                                @endcan
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
