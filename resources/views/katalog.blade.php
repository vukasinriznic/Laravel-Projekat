@extends('layouts.app2')

@section('content')
    <x-slot name="header"></x-slot> 

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <h2 class="font-semibold text-2xl text-gray-800 leading-tight mb-6 mt-20">
                 
                {{ ('Lista proizvoda') }}
            </h2>

            <div class="bg-white shadow overflow-hidden sm:rounded-lg p-6 flex space-x-8">
                <!-- Sidebar sa kategorijama -->
                <aside class="w-72 border border-gray-200 rounded p-6 bg-gray-50 flex-shrink-0">
                    <h3 class="font-semibold text-lg mb-6">Kategorije</h3>
                    <ul class="space-y-3">
                        <li><a href="{{ route('katalog', 'Digitalni tahografi') }}" class="text-blue-600 hover:underline">Digitalni tahografi</a></li>
                        <li><a href="{{ route('katalog', 'Analogni tahofrafi') }}" class="text-blue-600 hover:underline">Analogni tahografi</a></li>
                        <li><a href="{{ route('katalog', 'Oprema') }}" class="text-blue-600 hover:underline">Oprema</a></li>
                    </ul>
                </aside>

                <!-- Tabela proizvoda -->
                <div class="flex-1 overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 table-auto">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">#</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Naziv</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Kategorija</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Cena</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Opcije</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($products as $product)
                                <tr>
                                    <td class="px-6 py-4">{{ $product->id }}</td>
                                    <td class="px-6 py-4">{{ $product->name }}</td>
                                    <td class="px-6 py-4">{{ $product->category->name }}</td>
                                    <td class="px-6 py-4">{{ $product->price }} RSD</td>
                                    <td class="px-6 py-4">
                                        <a href="{{ route('proizvodi.show', $product->id) }}" class="text-gray-700 hover:text-blue-600 hover:underline transition">
                                            Opširnije...
                                        </a>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    @if($products->isEmpty())
                        <p class="mt-4 text-gray-500">Nema dostupnih proizvoda.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-100 text-center text-gray-600 text-sm py-4 mt-10 border-t border-gray-300 mt-20">
        © 2025 Vukasin Riznic
    </footer>
@endsection


