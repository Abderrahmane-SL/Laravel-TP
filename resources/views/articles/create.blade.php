<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Créer un nouvel article') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    @if ($errors->any())
                    <div class="mb-4">
                        <div class="font-medium text-red-600">{{ __('Whoops! Quelque chose s\'est mal
passé.') }}</div>
                        <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form action="{{ route('articles.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="title" class="block text-gray-700 text-sm font-bold mb2">Titre:</label>
                            <input type="text" name="title" id="title" class="shadow appearance-none
border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadowoutline">
                        </div>
                        <div class="mb-4">
                            <label for="content" class="block text-gray-700 text-sm font-bold mb2">Contenu:</label>
                            <textarea name="content" id="content" class="shadow appearance-none border
rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadowoutline"></textarea>
                        </div>
                        <div class="mb-4">
                            <label for="author" class="block text-gray-700 text-sm font-bold mb2">Auteur:</label>
                            <input type="text" name="author" id="author" class="shadow appearance-none
border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadowoutline">
                        </div>
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold
py-2 px-4 rounded focus:outline-none focus:shadow-outline">Créer l'article</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>