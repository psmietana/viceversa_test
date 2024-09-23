<?php

namespace App\DataFixtures;

use App\Entity\Book;
use App\Isbn\Generator;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    private const LOREM_IPSUM = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.';
    public function __construct(private readonly Generator $generator)
    {

    }
    public function load(ObjectManager $manager): void
    {
        for ($i = 1000000; $i > 0; $i--) {
            $book = new Book(
                'title test ' . $i,
                'author test ' . $i,
                0 === $i % 2 ? self::LOREM_IPSUM : null,
                rand(1448, 2024),
                $this->generator->generate()
            );
            $manager->persist($book);
        }

        $manager->flush();
    }
}
