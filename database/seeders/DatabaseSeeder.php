<?php

namespace Database\Seeders;

use App\Models\ContactMessage;
use App\Models\FaqCategory;
use App\Models\FaqItem;
use App\Models\Recipe;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@ehb.be',
            'password' => bcrypt('Password!321'),
            'is_admin' => true,
            'about_me' => 'Hoofdbeheerder van de receptenwebsite.',
        ]);

        User::factory()->create([
            'name' => 'Chef Karen',
            'username' => 'chefkaren',
            'email' => 'karen@example.com',
            'is_admin' => false,
            'about_me' => 'Gepassioneerde thuiskok.',
        ]);

        Recipe::factory(5)->create([
            'user_id' => 1,
        ]);

        Recipe::factory(3)->create([
            'user_id' => 2,
        ]);

        $categories = ['Bereidingstechnieken', 'Ingrediënten', 'Voeding & Dieet'];

        foreach ($categories as $name) {
            $category = FaqCategory::create(['name' => $name]);

            FaqItem::create([
                'faq_category_id' => $category->id,
                'question' => "Voorbeeldvraag over {$name}",
                'answer' => "Dit is een voorbeeldantwoord voor de categorie {$name}.",
            ]);
        }

        ContactMessage::create([
            'name' => 'Jan Janssens',
            'email' => 'jan@example.com',
            'message' => 'Leuke website! Ik mis wel wat meer vegetarische recepten.',
            'is_read' => false,
        ]);
    }
}
