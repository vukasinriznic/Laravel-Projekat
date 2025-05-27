<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ ('Dodaj proizvod') }}
        </h2>
    </x-slot>

    @if ($errors->any())
        <div class="max-w-4xl mx-auto mt-5 p-4 bg-red-100 border border-red-400 text-red-700 rounded text-center">
            <ul class="list-disc list-inside inline-block text-left">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form action="{{ route('product-create') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                        @csrf

                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700">Naziv</label>
                            <input type="text" name="name" id="name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>

                        <div>
                            <label for="description" class="block text-sm font-medium text-gray-700">Opis</label>
                            <textarea name="description" id="description" rows="4" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"></textarea>
                        </div>

                        <div>
                            <label for="price" class="block text-sm font-medium text-gray-700">Cena (RSD)</label>
                            <input type="number" name="price" id="price" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>

                        <div>
                            <label for="kolicina" class="block text-sm font-medium text-gray-700">Kolicina</label>
                            <input type="number" name="kolicina" id="kolicina" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>

                        <div>
                            <label for="category_id" class="block text-sm font-medium text-gray-700">Kategorija</label>
                            <select name="category_id" id="category_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label for="image" class="block text-sm font-medium text-gray-700">Slika proizvoda</label>
                            <input type="file" name="image" id="image" class="mt-1 block w-full text-sm text-gray-700 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                        </div>

                        <div class="pt-4">
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-md shadow-sm">
                                Dodaj proizvod
                            </button>
                            <a href="{{ route('lista_proizvoda') }}" class="inline-flex items-center px-4 py-2 bg-red-600 hover:bg-red-700 text-white text-sm font-medium rounded-md shadow-sm">Odustani</a>
                        </div>

                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
