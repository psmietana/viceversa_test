<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class Book
{
    #[ORM\Id, ORM\Column(type: "integer")]
    private int $id;
    public function __construct(
        #[ORM\Column(type: "string", length: 255, nullable: false)]
        private string $title,
        #[ORM\Column(type: "string", length: 255, nullable: false)]
        private string $author,
        #[ORM\Column(type: "text", nullable: true)]
        private ?string $description = null,
        #[ORM\Column(type: "smallint", nullable: false)]
        private int $publicationYear,
        #[ORM\Column(type: "string", length: 255, nullable: false)]
        private string $isbn,
        #[ORM\Column(type: "string", length: 255, nullable: true)]
        private ?string $coverFilepath = null,
    ) {

    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getAuthor(): string
    {
        return $this->author;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function getPublicationYear(): int
    {
        return $this->publicationYear;
    }

    public function getIsbn(): string
    {
        return $this->isbn;
    }

    public function getCoverFilepath(): ?string
    {
        return $this->coverFilepath;
    }
}