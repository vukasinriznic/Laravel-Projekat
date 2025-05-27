<x-app-layout>
    <x-slot name="header"></x-slot> 

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if(session('success'))
                <div class="bg-green-200 text-green-800 p-4 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <div class="flex items-center justify-between mb-6 mt-20">
                <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
                    {{ ('Lista proizvoda') }}
                </h2>

                <a href="{{ route('product-add') }}" class="inline-block bg-blue-400 hover:bg-yellow-500 text-white text-sm px-4 py-2 rounded">
                    Dodaj Proizvod
                </a>
            </div>

            <div class="bg-white shadow overflow-hidden sm:rounded-lg p-6 flex space-x-8">

                <!-- Tabela proizvoda -->
                <div class="flex-1 overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 table-auto">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">#</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Naziv</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Kategorija</th>
                                <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Cena</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Kolicina</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Sadrzaj</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Slika</th>
                                <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase" colspan="2">Opcije</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($products as $product)
                                <tr>
                                    <td class="px-6 py-4">{{ $product->id }}</td>
                                    <td class="px-6 py-4">{{ $product->name }}</td>
                                    <td class="px-6 py-4">{{ $product->category->name }}</td>
                                    <td class="px-6 py-4 text-center">{{ $product->price }} RSD</td>
                                    <td class="px-6 py-4 text-center">{{ $product->kolicina }}</td>
                                    <td class="px-6 py-4">
                                        <a href="{{ route('proizvodi.show', $product->id) }}" class="text-gray-700 hover:text-blue-600 hover:underline transition">
                                            Opširnije...
                                        </a>
                                    </td>
                                    <td>
                                        <img src="{{ asset('storage/' . $product->image) }}" style="width: 100px;" alt="">
                                    </td>
                                    <td class="px-6 py-4">
                                        <a href="{{ route('product-edit', $product->id) }}" class="inline-block bg-yellow-400 hover:bg-yellow-500 text-white text-sm px-3 py-1.5 rounded">Izmeni</a>
                                    </td>
                                    <td class="px-6 py-4">
                                        <form action="{{ route('product-delete', $product->id) }}" method="POST" onsubmit="return confirm('Da li ste sigurni da želite da obrišete proizvod?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white text-sm px-4 py-2 rounded">
                                                Obrisi
                                            </button>
                                        </form>
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

            <!-- Google Chart posle tabele -->
            <div id="chart_div" class="mt-12" style="width: 100%; height: 400px;"></div>

        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-100 text-center text-gray-600 text-sm py-4 mt-10 border-t border-gray-300 mt-20">
        © 2025 Vukasin Riznic
    </footer>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {packages: ['corechart', 'bar']});
        google.charts.setOnLoadCallback(drawStuff);

        function drawStuff() {
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Proizvod');
            data.addColumn('number', 'Količina');

            data.addRows([
                @foreach($products as $product)
                    ['{{ addslashes($product->name) }}', {{ $product->kolicina }}],
                @endforeach
            ]);

            var options = {
                title: 'Količina proizvoda na lageru',
                chartArea: {width: '60%'},
                hAxis: {
                    title: 'Ukupna količina',
                    minValue: 0
                },
                vAxis: {
                    title: 'Proizvod'
                },
                bars: 'horizontal',
                colors: ['#3b82f6'], // Tailwind blue 500
                height: 400
            };

            var chart = new google.visualization.BarChart(document.getElementById('chart_div'));
            chart.draw(data, options);
        }
    </script>
</x-app-layout>
