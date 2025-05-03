<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Product;
use App\Models\Brand;
use Illuminate\Support\Str;

class TechnologyCategorySeeder extends Seeder
{
    public function run(): void
    {
        // Crear la categoría de Tecnología
        $category = Category::create([
            'name' => 'Tecnología',
            'description' => 'Productos tecnológicos de última generación',
            'slug' => Str::slug('Tecnología'),
            'meta_title' => 'Tecnología - Multitecnología del Sur',
            'meta_description' => 'Descubre nuestra amplia gama de productos tecnológicos',
            'meta_keywords' => 'tecnología, gadgets, electrónica, dispositivos',
            'status' => true
        ]);

        // Crear marca de ejemplo
        $brand = Brand::create([
            'name' => 'TechBrand',
            'description' => 'Marca líder en tecnología',
            'slug' => Str::slug('TechBrand'),
            'status' => true
        ]);

        // Crear subcategorías
        $subcategories = [
            [
                'name' => 'Smartphones',
                'description' => 'Teléfonos inteligentes de última generación'
            ],
            [
                'name' => 'Relojes Inteligentes',
                'description' => 'Smartwatches con las últimas funcionalidades'
            ],
            [
                'name' => 'Tablets',
                'description' => 'Tablets para trabajo y entretenimiento'
            ],
            [
                'name' => 'Laptops',
                'description' => 'Computadoras portátiles de alto rendimiento'
            ],
            [
                'name' => 'Accesorios',
                'description' => 'Accesorios tecnológicos diversos'
            ]
        ];

        foreach ($subcategories as $sub) {
            $subcategory = Subcategory::create([
                'name' => $sub['name'],
                'description' => $sub['description'],
                'category_id' => $category->id,
                'slug' => Str::slug($sub['name']),
                'meta_title' => $sub['name'] . ' - Multitecnología del Sur',
                'meta_description' => 'Explora nuestra selección de ' . strtolower($sub['name']),
                'meta_keywords' => strtolower($sub['name']) . ', tecnología, gadgets',
                'status' => true
            ]);

            // Crear productos de ejemplo para cada subcategoría
            for ($i = 1; $i <= 3; $i++) {
                Product::create([
                    'name' => $sub['name'] . ' Modelo ' . $i,
                    'description' => 'Descripción detallada del ' . $sub['name'] . ' Modelo ' . $i,
                    'price' => rand(299, 1299) + 0.99,
                    'category_id' => $category->id,
                    'subcategory_id' => $subcategory->id,
                    'brand_id' => $brand->id,
                    'slug' => Str::slug($sub['name'] . ' Modelo ' . $i),
                    'meta_title' => $sub['name'] . ' Modelo ' . $i . ' - Multitecnología del Sur',
                    'meta_description' => 'Descubre el increíble ' . $sub['name'] . ' Modelo ' . $i,
                    'meta_keywords' => strtolower($sub['name']) . ', modelo ' . $i . ', tecnología',
                    'status' => true
                ]);
            }
        }
    }
}