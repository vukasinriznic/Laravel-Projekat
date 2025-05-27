<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Izmeni proizvod') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                <form action="{{ route('product-update', $product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700" for="name">Naziv</label>
                        <input type="text" name="name" id="name" value="{{ old('name', $product->name) }}" class="form-input rounded-md shadow-sm mt-1 block w-full" required>
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700" for="description">Opis</label>
                        <textarea name="description" id="description" rows="5" class="form-input rounded-md shadow-sm mt-1 block w-full" required>{{ old('description', $product->description) }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700" for="price">Cena</label>
                        <input type="number" name="price" id="price" value="{{ old('price', $product->price) }}" class="form-input rounded-md shadow-sm mt-1 block w-full" required min="0" step="0.01">
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700" for="kolicina">Kolicina</label>
                        <input type="integer" name="kolicina" id="kolicina" value="{{ old('kolicina', $product->kolicina) }}" class="form-input rounded-md shadow-sm mt-1 block w-full" required min="0" step="0.01">
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700" for="category_id">Kategorija</label>
                        <select name="category_id" id="category_id" class="form-select rounded-md shadow-sm mt-1 block w-full" required>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700" for="image">Slika (ostavi prazno ako ne menjaš)</label>
                        <input type="file" name="image" id="image" class="form-input rounded-md shadow-sm mt-1 block w-full">
                        @if ($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" alt="Slika proizvoda" class="mt-2 w-32 h-auto rounded">
                        @endif
                    </div>

                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Sačuvaj izmene
                    </button>

                </form>

            </div>
        </div>
    </div>
</x-app-layout>
