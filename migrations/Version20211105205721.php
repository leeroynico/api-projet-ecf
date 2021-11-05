<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211105205721 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE chambre_froide (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, officine_id INTEGER DEFAULT NULL, libell VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE INDEX IDX_5E245AA7B2D03E4E ON chambre_froide (officine_id)');
        $this->addSql('CREATE TABLE officine (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, telephone VARCHAR(255) DEFAULT NULL, password VARCHAR(255) NOT NULL, custom_identifiant VARCHAR(100) DEFAULT NULL)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_66339666FF38BC26 ON officine (custom_identifiant)');
        $this->addSql('CREATE TABLE resultat (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, chambre_froide_id INTEGER DEFAULT NULL, date DATETIME NOT NULL, resultat_temperature CLOB DEFAULT NULL --(DC2Type:json)
        , resultat_hygrometrie CLOB DEFAULT NULL --(DC2Type:json)
        , validation BOOLEAN DEFAULT NULL, commentaire VARCHAR(255) DEFAULT NULL)');
        $this->addSql('CREATE INDEX IDX_E7DB5DE2C621DF84 ON resultat (chambre_froide_id)');
        $this->addSql('CREATE TABLE user (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, username VARCHAR(180) NOT NULL, roles CLOB NOT NULL --(DC2Type:json)
        , password VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649F85E0677 ON user (username)');
        $this->addSql('CREATE TABLE utilisateur (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, role VARCHAR(255) NOT NULL)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE chambre_froide');
        $this->addSql('DROP TABLE officine');
        $this->addSql('DROP TABLE resultat');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE utilisateur');
    }
}
