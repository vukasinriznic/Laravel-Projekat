<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'name' => 'Stoneridge SE5000 Exakt Duo',
            'description' => 'Ovaj tahograf je visokotehnološki uređaj koji omogućava precizno evidentiranje vremena vožnje, pauza i odmora vozača, kao i drugih podataka kao što su brzina vozila i pređeni put. Podaci se čuvaju u digitalnom obliku na memorijskoj kartici, što olakšava njihovu analizu i kontrolu u cilju poštovanja zakonskih propisa o bezbednosti i radu vozača.',
            'price' => 42000,
            'category_id' => 1,
            'kolicina' => 12,
            'image' => 'images/tah1.png',
        ]);
        Product::create([
            'name' => 'VDO DTCO 4.0',
            'description' => 'Predstavlja moderni digitalni uređaj integrisan sa GPS tehnologijom i sistemima za upravljanje flotom. Omogućava automatsko beleženje i čuvanje podataka o vožnji, a njegova prednost je i mogućnost daljinskog preuzimanja podataka, što značajno pojednostavljuje rad sa dokumentacijom i kontrolu radnog vremena.',
            'price' => 52000,
            'category_id' => 1,
            'kolicina' => 9,
            'image' => 'images/tah2.jpg',
        ]);
        Product::create([
            'name' => 'Siemens VDO 1318',
            'description' => 'Koristi mehanički sistem za evidentiranje podataka na papirnim diskovima. Vozač se evidentira preko specijalnih papira na kojima se prikazuju brzina, vreme vožnje i odmora. Ovaj tip tahografa je tradicionalan, pouzdan i jednostavan za korišćenje, ali zahteva ručnu obradu podataka i njihovu čuvanje.',
            'price' => 34000,
            'category_id' => 2,
            'kolicina' => 14,
            'image' => 'images/tah3.jpg',
        ]);
        Product::create([
            'name' => 'Stoneridge Trifid 2000',
            'description' => 'koristi papirne diskove za beleženje podataka. Ovaj tahograf poseduje mehaničke i elektronske komponente i namenjen je za osnovnu kontrolu radnog vremena vozača i brzine vozila, pružajući osnovne informacije potrebne za praćenje i poštovanje zakonskih ograničenja.',
            'price' => 36000,
            'category_id' => 2,
            'kolicina' => 50,
            'image' => 'images/tah4.jpg',

        ]);
         Product::create([
            'name' => 'tahografske trake',
            'description' => 'Tahografske trake/diskovi su podeljene na vremenske intervale (obično 24 sata) i imaju oznake koje olakšavaju očitavanje podataka. Na njima se prikazuju promene brzine tokom vožnje, vreme kada vozilo stoji, i periodi kada vozač pravi pauze ili odmara.',
            'price' => 600,
            'category_id' => 3,
            'kolicina' => 150,
            'image' => 'images/papiri.jpg',

        ]);
    }
}
