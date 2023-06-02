<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230602211537 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE matchs ADD idstade_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE matchs ADD CONSTRAINT FK_6B1E6041CFEDE34E FOREIGN KEY (idstade_id) REFERENCES stade (id)');
        $this->addSql('CREATE INDEX IDX_6B1E6041CFEDE34E ON matchs (idstade_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE matchs DROP FOREIGN KEY FK_6B1E6041CFEDE34E');
        $this->addSql('DROP INDEX IDX_6B1E6041CFEDE34E ON matchs');
        $this->addSql('ALTER TABLE matchs DROP idstade_id');
    }
}
