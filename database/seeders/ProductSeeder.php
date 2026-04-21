<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder {
    public function run() {
        Product::create(['name' => 'Laptop Dell XPS', 'price' => 1200.00, 'description' => 'Écran 13 pouces']);
        Product::create(['name' => 'Souris Logitech', 'price' => 50.00, 'description' => 'Sans fil, ergonomique']);
        Product::create(['name' => 'Casque Sony', 'price' => 250.00, 'description' => 'Réduction de bruit']);
    }
}