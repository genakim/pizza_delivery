<?php

use Illuminate\Database\Seeder;
use \App\Models\Product;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);

        $pizzas = [
            [
                'name' => 'Takkino',
                'description' => 'Smoky honey ham, pepperoni, Italian sausage, beef, mushrooms, Kalamata olives, juicy pineapple, green capsicum,  onion & mozzarella',
            ],
            [
                'name' => 'BBQ',
                'description' => 'Tender chicken, streaky bacon rashers, diced tomato, onion  & mozzarella finished with smoky BBQ drizzle',
            ],
            [
                'name' => 'Hot & Spicy',
                'description' => 'Spicy jalapeños, tender chicken, juicy pineapple, onion, chilli flakes & mozzarella finished with aioli drizzle',
            ],
            [
                'name' => 'Hawaiian',
                'description' => 'Mushrooms, pineapple, diced tomato, green capsicum, Kalamata olives, cheddar, onion, oregano & mozzarella finished with aioli drizzle',
            ],
            [
                'name' => 'Meatlovers',
                'description' => 'Streaky bacon rashers, smoky honey ham, pepperoni, Italian sausage, beef & mozzarella on rich BBQ sauce',
            ],
            [
                'name' => 'Chicken Supreme',
                'description' => 'Tender chicken, mushrooms, juicy pineapple, roasted red capsicum, green capsicum, onion & mozzarella',
            ],
            [
                'name' => 'Veggie Sensation',
                'description' => 'Mushrooms, pineapple, diced tomato, green capsicum, Kalamata olives, cheddar, onion, oregano & mozzarella finished with aioli drizzle',
            ],
            [
                'name' => 'Ultimate Hot & Spicy',
                'description' => 'Spicy jalapeños, beef, pepperoni, Italian sausage, diced tomato, onion, chilli flakes & mozzarella finished with aioli drizzle',
            ],
            [
                'name' => 'Butcher\'s Block',
                'description' => 'Steak, streaky bacon rashers, pepperoni, smoky honey ham, tender chicken, Italian sausage & mozzarella on rich BBQ sauce with hollandaise drizzle',
            ],
            [
                'name' => 'Garlic Prawn',
                'description' => 'Succulent prawns, garlic, diced tomato, green capsicum & mozzarella finished with aioli drizzle',
            ],
            [
                'name' => 'Pepperoni Lovers',
                'description' => 'Succulent prawns, garlic, diced tomato, green capsicum & mozzarella finished with aioli drizzle',
            ]
        ];

        $faker = Faker\Factory::create('en');

        foreach ($pizzas as $key => $pizza) {
            (new Product([
                'name' => $pizza['name'],
                'price' => $faker->numberBetween(4, 16),
                'description' => $pizza['description'],
                'preview_img' => sprintf('/storage/p_%d.jpg', $key + 1),
                'full_img' => sprintf('/storage/f_%d.jpg', $key + 1)
            ]))->save();
        }
    }
}
