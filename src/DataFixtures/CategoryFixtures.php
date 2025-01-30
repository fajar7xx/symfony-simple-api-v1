<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class CategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        $faker = Factory::create('id_ID'); // Gunakan lokal Indonesia
        $count = 20;
        for ($i = 0; $i < $count; $i++) {
            $category = new Category();
            $category->setName($faker->word());
            $category->setDescription($faker->text());
            $category->setIsActive(true);
            $manager->persist($category);
        }

        $manager->flush();
    }
}
