<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class Book
{
    public function __construct(
        #[ORM\Id, ORM\Column(type: "integer")]
        private int $id,
        #[ORM\Column(type: "string", length: 255, nullable: false)]
        private string $title,
        #[ORM\Column(type: "string", length: 255, nullable: false)]
        private string $author,
        #[ORM\Column(type: "text", nullable: true)]
        private string $description,
        #[ORM\Column(type: "smallint", nullable: false)]
        private int $publicationYear,
        #[ORM\Column(type: "string", length: 255, nullable: false)]
        private string $isbn,
        #[ORM\Column(type: "string", length: 255, nullable: true)]
        private string $coverFilepath,
    ) {

    }
}