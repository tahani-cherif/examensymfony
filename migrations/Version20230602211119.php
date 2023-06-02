<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230602211119 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE matchs MODIFY id INT NOT NULL');
        $this->addSql('DROP INDEX `primary` ON matchs');
        $this->addSql('ALTER TABLE matchs ADD numero_matche INT NOT NULL, DROP id');
        $this->addSql('ALTER TABLE matchs ADD PRIMARY KEY (numero_matche)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE matchs ADD id INT AUTO_INCREMENT NOT NULL, DROP numero_matche, DROP PRIMARY KEY, ADD PRIMARY KEY (id)');
    }
}
