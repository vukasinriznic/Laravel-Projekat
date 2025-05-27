<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ ('Lista proizvoda') }}
        </h2>
    </x-slot>

    <div class="py-10 max-w-7xl mx-auto sm:px-6 lg:px-8 flex space-x-8">

        <!-- Glavni deo sa proizvodima (kartice) -->
        <div class="flex-1 bg-white shadow sm:rounded-lg p-6 overflow-auto grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
            @forelse ($products as $product)
                <div class="border rounded-lg p-4 flex flex-col items-center shadow hover:shadow-lg transition">
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-[180px] h-[180px] object-cover rounded-md mb-4">
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">{{ $product->name }}</h3>
                    <p class="text-gray-600 mb-1"><strong>Kategorija:</strong> {{ $product->category->name }}</p>
                    <p class="text-gray-600 mb-1"><strong>Cena:</strong> {{ $product->price }} RSD</p>
                    <p class="text-gray-600 mb-3"><strong>Količina:</strong> {{ $product->kolicina }}</p>
                    <button
                        class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded add-to-cart-btn w-full"
                        data-id="{{ $product->id }}"
                        data-name="{{ $product->name }}"
                        data-price="{{ $product->price }}"
                        data-kolicina="{{ $product->kolicina }}"
                        data-image="{{ asset('storage/' . $product->image) }}"
                    >Dodaj u korpu</button>
                </div>
            @empty
                <p class="col-span-full text-center text-gray-500">Nema dostupnih proizvoda.</p>
            @endforelse
        </div>

        <!-- Sidebar Korpa -->
        <aside class="w-80 bg-gray-50 rounded-lg shadow-md p-6 sticky top-20 h-[calc(100vh-5rem)] flex flex-col">
            <h3 class="text-xl font-semibold mb-4 border-b border-gray-300 pb-2">Korpa</h3>
            <div id="cart-items" class="flex-grow overflow-y-auto mb-4">
                <p class="text-gray-500">Korpa je prazna.</p>
            </div>

            <!-- Ukupna cena -->
            <div id="total-price" class="mb-4 font-semibold text-lg text-gray-800">
                Ukupno: 0 RSD
            </div>

            <div class="flex space-x-4">
                <button id="order-btn" class="flex-1 bg-green-600 hover:bg-green-700 text-white py-2 rounded">Poruči</button>
                <button id="clear-cart" class="flex-1 bg-red-500 hover:bg-red-600 text-white py-2 rounded">Isprazni korpu</button>
            </div>
        </aside>

    </div>

    <script>
        const cartItemsContainer = document.getElementById('cart-items');
        const clearCartBtn = document.getElementById('clear-cart');
        const orderBtn = document.getElementById('order-btn');
        const totalPriceContainer = document.getElementById('total-price');

        let cart = [];

        function calculateTotal() {
            return cart.reduce((sum, item) => sum + (item.price * item.kolicina), 0);
        }

        function renderCart() {
            if(cart.length === 0) {
                cartItemsContainer.innerHTML = '<p class="text-gray-500">Korpa je prazna.</p>';
                totalPriceContainer.textContent = 'Ukupno: 0 RSD';
                return;
            }

            let html = '<ul class="divide-y divide-gray-300">';
            cart.forEach(item => {
                html += `
                    <li class="py-2 flex items-center space-x-4">
                        <img src="${item.image}" alt="${item.name}" class="w-16 h-16 object-cover rounded">
                        <div class="flex-1">
                            <h4 class="font-semibold">${item.name}</h4>
                            <p>Cena: ${item.price} RSD</p>
                            <p>Količina: ${item.kolicina}</p>
                        </div>
                        <button class="text-red-600 hover:text-red-800 remove-item" data-id="${item.id}">&times;</button>
                    </li>
                `;
            });
            html += '</ul>';
            cartItemsContainer.innerHTML = html;

            totalPriceContainer.textContent = 'Ukupno: ' + calculateTotal() + ' RSD';

            document.querySelectorAll('.remove-item').forEach(button => {
                button.addEventListener('click', (e) => {
                    const id = e.target.getAttribute('data-id');
                    cart = cart.filter(item => item.id != id);
                    renderCart();
                });
            });
        }

        document.querySelectorAll('.add-to-cart-btn').forEach(button => {
            button.addEventListener('click', () => {
                const id = button.getAttribute('data-id');
                const name = button.getAttribute('data-name');
                const price = parseFloat(button.getAttribute('data-price'));
                const kolicina = parseInt(button.getAttribute('data-kolicina'));
                const image = button.getAttribute('data-image');

                const existingItem = cart.find(item => item.id == id);
                if(existingItem) {
                    existingItem.kolicina += 1;
                } else {
                    cart.push({id, name, price, kolicina: 1, image});
                }
                renderCart();
            });
        });

        clearCartBtn.addEventListener('click', () => {
            cart = [];
            renderCart();
        });

        orderBtn.addEventListener('click', () => {
            if(cart.length === 0) {
                alert('Korpa je prazna!');
                return;
            }
            
            cart.forEach(item => {

            });

            alert('Uspešno ste poručili proizvode!');

            cart = [];
            renderCart();
        });

        renderCart();
    </script>

</x-app-layout>
