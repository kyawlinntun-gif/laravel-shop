<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $product1 = [
            // Electronics
            ['name' => 'iPhone 13', 'description' => 'Latest Apple smartphone with A15 Bionic chip', 'price' => 999.99, 'category_id' => 1, 'stock_quantity' => 50],
            ['name' => 'Samsung Galaxy S21', 'description' => 'High-end Samsung smartphone with triple camera', 'price' => 899.99, 'category_id' => 1, 'stock_quantity' => 60],
            ['name' => 'Sony WH-1000XM4', 'description' => 'Noise-cancelling over-ear headphones', 'price' => 349.99, 'category_id' => 1, 'stock_quantity' => 30],
            ['name' => 'Dell XPS 13', 'description' => 'Premium ultrabook with Intel i7 processor', 'price' => 1299.99, 'category_id' => 1, 'stock_quantity' => 25],
            ['name' => 'Apple Watch Series 7', 'description' => 'Smartwatch with advanced health tracking', 'price' => 399.99, 'category_id' => 1, 'stock_quantity' => 40],
        
            // Fashion
            ['name' => 'Levi\'s 501 Jeans', 'description' => 'Classic straight-fit jeans', 'price' => 79.99, 'category_id' => 2, 'stock_quantity' => 100],
            ['name' => 'Nike Air Max 270', 'description' => 'Comfortable running shoes with air cushioning', 'price' => 149.99, 'category_id' => 2, 'stock_quantity' => 75],
            ['name' => 'Ray-Ban Aviator Sunglasses', 'description' => 'Iconic aviator sunglasses with polarized lenses', 'price' => 199.99, 'category_id' => 2, 'stock_quantity' => 60],
            ['name' => 'Adidas Originals Hoodie', 'description' => 'Cozy hoodie with classic three-stripe design', 'price' => 89.99, 'category_id' => 2, 'stock_quantity' => 80],
            ['name' => 'Gucci GG Marmont Bag', 'description' => 'Luxury leather handbag with GG logo', 'price' => 2399.99, 'category_id' => 2, 'stock_quantity' => 20],
        
            // Home Appliances
            ['name' => 'Dyson V11 Vacuum', 'description' => 'Cordless vacuum cleaner with powerful suction', 'price' => 599.99, 'category_id' => 3, 'stock_quantity' => 15],
            ['name' => 'Instant Pot Duo', 'description' => 'Multifunctional pressure cooker with multiple modes', 'price' => 89.99, 'category_id' => 3, 'stock_quantity' => 40],
            ['name' => 'Philips Airfryer', 'description' => 'Healthy air fryer for crispy cooking', 'price' => 149.99, 'category_id' => 3, 'stock_quantity' => 35],
            ['name' => 'Samsung 55" 4K TV', 'description' => 'Smart TV with UHD resolution', 'price' => 699.99, 'category_id' => 3, 'stock_quantity' => 20],
            ['name' => 'LG Washer Dryer Combo', 'description' => 'Efficient washer and dryer in one unit', 'price' => 1299.99, 'category_id' => 3, 'stock_quantity' => 10],
        
            // Books
            ['name' => 'The Great Gatsby', 'description' => 'Classic novel by F. Scott Fitzgerald', 'price' => 14.99, 'category_id' => 4, 'stock_quantity' => 200],
            ['name' => '1984', 'description' => 'Dystopian novel by George Orwell', 'price' => 12.99, 'category_id' => 4, 'stock_quantity' => 180],
            ['name' => 'To Kill a Mockingbird', 'description' => 'Pulitzer Prize-winning novel by Harper Lee', 'price' => 13.99, 'category_id' => 4, 'stock_quantity' => 160],
            ['name' => 'The Catcher in the Rye', 'description' => 'Novel by J.D. Salinger about teenage angst', 'price' => 15.99, 'category_id' => 4, 'stock_quantity' => 140],
            ['name' => 'Sapiens: A Brief History of Humankind', 'description' => 'Non-fiction by Yuval Noah Harari', 'price' => 18.99, 'category_id' => 4, 'stock_quantity' => 120],
        
            // Beauty Products
            ['name' => 'L’Oréal Paris Revitalift', 'description' => 'Anti-aging cream with pro-retinol', 'price' => 29.99, 'category_id' => 5, 'stock_quantity' => 75],
            ['name' => 'Estée Lauder Double Wear Foundation', 'description' => 'Long-wear foundation with SPF 10', 'price' => 42.99, 'category_id' => 5, 'stock_quantity' => 60],
            ['name' => 'Clinique Moisture Surge', 'description' => 'Hydrating gel-cream for dry skin', 'price' => 39.99, 'category_id' => 5, 'stock_quantity' => 55],
            ['name' => 'Urban Decay Naked Palette', 'description' => 'Eyeshadow palette with neutral shades', 'price' => 54.99, 'category_id' => 5, 'stock_quantity' => 40],
            ['name' => 'Mac Lipstick - Ruby Woo', 'description' => 'Classic red lipstick with matte finish', 'price' => 19.99, 'category_id' => 5, 'stock_quantity' => 85]
        ];

        $product2 = [
            // Sports Equipment
            ['name' => 'Nike Running Shoes', 'description' => 'Comfortable running shoes for all terrains', 'price' => 129.99, 'category_id' => 6, 'stock_quantity' => 50],
            ['name' => 'Wilson Tennis Racket', 'description' => 'High-performance tennis racket', 'price' => 199.99, 'category_id' => 6, 'stock_quantity' => 30],
            ['name' => 'Adidas Soccer Ball', 'description' => 'Durable soccer ball for practice and games', 'price' => 29.99, 'category_id' => 6, 'stock_quantity' => 100],
            ['name' => 'Fitbit Charge 4', 'description' => 'Fitness tracker with GPS and heart rate monitor', 'price' => 149.99, 'category_id' => 6, 'stock_quantity' => 45],
            ['name' => 'Peloton Bike', 'description' => 'Stationary bike with live-streamed classes', 'price' => 1999.99, 'category_id' => 6, 'stock_quantity' => 5],
        
            // Toys
            ['name' => 'LEGO Creator 3-in-1', 'description' => 'Building set with multiple configurations', 'price' => 49.99, 'category_id' => 7, 'stock_quantity' => 80],
            ['name' => 'Barbie Dream House', 'description' => 'Large dollhouse with accessories', 'price' => 199.99, 'category_id' => 7, 'stock_quantity' => 25],
            ['name' => 'Hot Wheels Track Set', 'description' => 'Exciting track set with loops and jumps', 'price' => 59.99, 'category_id' => 7, 'stock_quantity' => 50],
            ['name' => 'Nerf Rival Blaster', 'description' => 'High-performance foam blaster', 'price' => 79.99, 'category_id' => 7, 'stock_quantity' => 45],
            ['name' => 'Fisher-Price Laugh & Learn', 'description' => 'Educational toy with interactive features', 'price' => 34.99, 'category_id' => 7, 'stock_quantity' => 70],
        
            // Groceries
            ['name' => 'Organic Almond Milk', 'description' => 'Fresh and creamy almond milk', 'price' => 2.99, 'category_id' => 8, 'stock_quantity' => 200],
            ['name' => 'Whole Wheat Bread', 'description' => 'Healthy whole wheat bread', 'price' => 3.49, 'category_id' => 8, 'stock_quantity' => 150],
            ['name' => 'Brown Rice', 'description' => 'High-fiber brown rice', 'price' => 4.99, 'category_id' => 8, 'stock_quantity' => 120],
            ['name' => 'Fresh Apples', 'description' => 'Crisp and juicy apples', 'price' => 1.99, 'category_id' => 8, 'stock_quantity' => 300],
            ['name' => 'Organic Chicken Breasts', 'description' => 'Lean and tender chicken breasts', 'price' => 8.99, 'category_id' => 8, 'stock_quantity' => 80],
        
            // Furniture
            ['name' => 'Wooden Dining Table', 'description' => 'Elegant wooden dining table with 6 chairs', 'price' => 699.99, 'category_id' => 9, 'stock_quantity' => 15],
            ['name' => 'Leather Sofa', 'description' => 'Luxurious leather sofa with reclining feature', 'price' => 999.99, 'category_id' => 9, 'stock_quantity' => 10],
            ['name' => 'King Size Bed', 'description' => 'Spacious king size bed with mattress', 'price' => 1299.99, 'category_id' => 9, 'stock_quantity' => 8],
            ['name' => 'Office Desk', 'description' => 'Ergonomic office desk with storage compartments', 'price' => 299.99, 'category_id' => 9, 'stock_quantity' => 20],
            ['name' => 'Bookshelf', 'description' => 'Wooden bookshelf with adjustable shelves', 'price' => 199.99, 'category_id' => 9, 'stock_quantity' => 25],
        
            // Stationery
            ['name' => 'Durable Notebook', 'description' => 'Notebook with numbered pages', 'price' => 29.99, 'category_id' => 10, 'stock_quantity' => 100],
            ['name' => 'Post-it Notes', 'description' => 'Sticky notes for reminders and notes', 'price' => 8.99, 'category_id' => 10, 'stock_quantity' => 150],
            ['name' => 'X-ACTO Precision Knife', 'description' => 'High-quality cutting tool for crafts and projects', 'price' => 12.99, 'category_id' => 10, 'stock_quantity' => 75],
            ['name' => 'Sharpie Markers', 'description' => 'Pack of permanent markers in various colors', 'price' => 14.99, 'category_id' => 10, 'stock_quantity' => 200],
            ['name' => 'Graphing Calculator', 'description' => 'Advanced calculator for graphs and calculations', 'price' => 89.99, 'category_id' => 10, 'stock_quantity' => 30]
        ];

        foreach($product1 as $product) {
            User::findOrFail(1)->admin->products()->create($product);
        }
        
        foreach($product2 as $product) {
            User::findOrFail(2)->admin->products()->create($product);
        }
    }
}
