<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211007203031 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE chambre_froide (id INT AUTO_INCREMENT NOT NULL, officine_id INT DEFAULT NULL, libell VARCHAR(255) NOT NULL, INDEX IDX_5E245AA7B2D03E4E (officine_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE officine (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, telephone VARCHAR(255) DEFAULT NULL, password VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE resultat (id INT AUTO_INCREMENT NOT NULL, chambre_froide_id INT DEFAULT NULL, date DATETIME NOT NULL, resultat_temperature LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:json)\', resultat_hygrometrie LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:json)\', validation TINYINT(1) DEFAULT NULL, commentaire VARCHAR(255) DEFAULT NULL, INDEX IDX_E7DB5DE2C621DF84 (chambre_froide_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE chambre_froide ADD CONSTRAINT FK_5E245AA7B2D03E4E FOREIGN KEY (officine_id) REFERENCES officine (id)');
        $this->addSql('ALTER TABLE resultat ADD CONSTRAINT FK_E7DB5DE2C621DF84 FOREIGN KEY (chambre_froide_id) REFERENCES chambre_froide (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE resultat DROP FOREIGN KEY FK_E7DB5DE2C621DF84');
        $this->addSql('ALTER TABLE chambre_froide DROP FOREIGN KEY FK_5E245AA7B2D03E4E');
        $this->addSql('DROP TABLE chambre_froide');
        $this->addSql('DROP TABLE officine');
        $this->addSql('DROP TABLE resultat');
    }
}
