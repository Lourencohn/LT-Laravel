<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center">
            <img src="{{ asset('images/LTCloud.jpeg') }}" alt="LT Cloud" class="h-8 w-auto mr-3" />
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                LT Cloud - Dashboard
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Welcome Card -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                Bem-vindo, {{ Auth::user()->name }}!
                            </h3>
                            <p class="mt-1 text-sm text-gray-700 dark:text-gray-300">
                                Gerencie seus desenvolvedores e artigos de forma eficiente.
                            </p>
                        </div>
                        <div class="hidden sm:block">
                            <img src="{{ asset('images/LTCloud.jpeg') }}" alt="LT Cloud" class="h-16 w-auto rounded-lg" />
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <a href="{{ route('developers.index') }}" class="bg-blue-50 dark:bg-blue-900 border border-blue-200 dark:border-blue-700 rounded-lg p-6 hover:bg-blue-100 dark:hover:bg-blue-800 transition-colors">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <svg class="h-8 w-8 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z"></path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">Desenvolvedores</h3>
                            <p class="text-sm text-gray-700 dark:text-gray-300">Gerencie sua equipe de desenvolvedores</p>
                        </div>
                    </div>
                </a>

                <a href="{{ route('articles.index') }}" class="bg-green-50 dark:bg-green-900 border border-green-200 dark:border-green-700 rounded-lg p-6 hover:bg-green-100 dark:hover:bg-green-800 transition-colors">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <svg class="h-8 w-8 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">Artigos</h3>
                            <p class="text-sm text-gray-700 dark:text-gray-300">Crie e gerencie artigos técnicos</p>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Stats -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <svg class="h-8 w-8 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <p class="text-2xl font-semibold text-gray-900 dark:text-gray-100">
                                    {{ Auth::user()->developers()->count() }}
                                </p>
                                <p class="text-sm text-gray-700 dark:text-gray-300">Desenvolvedores</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <svg class="h-8 w-8 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <p class="text-2xl font-semibold text-gray-900 dark:text-gray-100">
                                    {{ Auth::user()->articles()->count() }}
                                </p>
                                <p class="text-sm text-gray-700 dark:text-gray-300">Artigos</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <svg class="h-8 w-8 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"></path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <p class="text-2xl font-semibold text-gray-900 dark:text-gray-100">
                                    {{ Auth::user()->articles()->withCount('developers')->get()->sum('developers_count') }}
                                </p>
                                <p class="text-sm text-gray-700 dark:text-gray-300">Conexões</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
