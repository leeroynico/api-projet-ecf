<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211105213023 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX IDX_5E245AA7B2D03E4E');
        $this->addSql('CREATE TEMPORARY TABLE __temp__chambre_froide AS SELECT id, officine_id, libell FROM chambre_froide');
        $this->addSql('DROP TABLE chambre_froide');
        $this->addSql('CREATE TABLE chambre_froide (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, officine_id INTEGER DEFAULT NULL, libell VARCHAR(255) NOT NULL COLLATE BINARY, CONSTRAINT FK_5E245AA7B2D03E4E FOREIGN KEY (officine_id) REFERENCES officine (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO chambre_froide (id, officine_id, libell) SELECT id, officine_id, libell FROM __temp__chambre_froide');
        $this->addSql('DROP TABLE __temp__chambre_froide');
        $this->addSql('CREATE INDEX IDX_5E245AA7B2D03E4E ON chambre_froide (officine_id)');
        $this->addSql('DROP INDEX IDX_E7DB5DE2C621DF84');
        $this->addSql('CREATE TEMPORARY TABLE __temp__resultat AS SELECT id, chambre_froide_id, date, resultat_temperature, resultat_hygrometrie, validation, commentaire FROM resultat');
        $this->addSql('DROP TABLE resultat');
        $this->addSql('CREATE TABLE resultat (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, chambre_froide_id INTEGER DEFAULT NULL, date DATETIME NOT NULL, resultat_temperature CLOB DEFAULT NULL COLLATE BINARY --(DC2Type:json)
        , resultat_hygrometrie CLOB DEFAULT NULL COLLATE BINARY --(DC2Type:json)
        , validation BOOLEAN DEFAULT NULL, commentaire VARCHAR(255) DEFAULT NULL COLLATE BINARY, CONSTRAINT FK_E7DB5DE2C621DF84 FOREIGN KEY (chambre_froide_id) REFERENCES chambre_froide (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO resultat (id, chambre_froide_id, date, resultat_temperature, resultat_hygrometrie, validation, commentaire) SELECT id, chambre_froide_id, date, resultat_temperature, resultat_hygrometrie, validation, commentaire FROM __temp__resultat');
        $this->addSql('DROP TABLE __temp__resultat');
        $this->addSql('CREATE INDEX IDX_E7DB5DE2C621DF84 ON resultat (chambre_froide_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX IDX_5E245AA7B2D03E4E');
        $this->addSql('CREATE TEMPORARY TABLE __temp__chambre_froide AS SELECT id, officine_id, libell FROM chambre_froide');
        $this->addSql('DROP TABLE chambre_froide');
        $this->addSql('CREATE TABLE chambre_froide (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, officine_id INTEGER DEFAULT NULL, libell VARCHAR(255) NOT NULL)');
        $this->addSql('INSERT INTO chambre_froide (id, officine_id, libell) SELECT id, officine_id, libell FROM __temp__chambre_froide');
        $this->addSql('DROP TABLE __temp__chambre_froide');
        $this->addSql('CREATE INDEX IDX_5E245AA7B2D03E4E ON chambre_froide (officine_id)');
        $this->addSql('DROP INDEX IDX_E7DB5DE2C621DF84');
        $this->addSql('CREATE TEMPORARY TABLE __temp__resultat AS SELECT id, chambre_froide_id, date, resultat_temperature, resultat_hygrometrie, validation, commentaire FROM resultat');
        $this->addSql('DROP TABLE resultat');
        $this->addSql('CREATE TABLE resultat (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, chambre_froide_id INTEGER DEFAULT NULL, date DATETIME NOT NULL, resultat_temperature CLOB DEFAULT NULL --(DC2Type:json)
        , resultat_hygrometrie CLOB DEFAULT NULL --(DC2Type:json)
        , validation BOOLEAN DEFAULT NULL, commentaire VARCHAR(255) DEFAULT NULL)');
        $this->addSql('INSERT INTO resultat (id, chambre_froide_id, date, resultat_temperature, resultat_hygrometrie, validation, commentaire) SELECT id, chambre_froide_id, date, resultat_temperature, resultat_hygrometrie, validation, commentaire FROM __temp__resultat');
        $this->addSql('DROP TABLE __temp__resultat');
        $this->addSql('CREATE INDEX IDX_E7DB5DE2C621DF84 ON resultat (chambre_froide_id)');
    }
}
