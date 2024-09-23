<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20240922234156 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'create table for books';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE TABLE book (
          id INT NOT NULL,
          title VARCHAR(255) NOT NULL,
          author VARCHAR(255) NOT NULL,
          description LONGTEXT DEFAULT NULL,
          publication_year SMALLINT NOT NULL,
          isbn VARCHAR(255) NOT NULL,
          cover_filepath VARCHAR(255) DEFAULT NULL,
          PRIMARY KEY(id)
        ) DEFAULT CHARACTER
        SET
          utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE book');
    }
}
