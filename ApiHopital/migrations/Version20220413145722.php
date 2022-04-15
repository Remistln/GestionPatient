<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220413145722 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE rendez_vous (id INT AUTO_INCREMENT NOT NULL, infirmier_id INT DEFAULT NULL, vaccin_id INT DEFAULT NULL, date DATETIME NOT NULL, INDEX IDX_65E8AA0AC2BE0752 (infirmier_id), UNIQUE INDEX UNIQ_65E8AA0A9B14AC76 (vaccin_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE secretaire (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, identifiant VARCHAR(255) NOT NULL, mdp VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_vaccin (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(255) NOT NULL, age_min INT NOT NULL, age_max INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vaccin (id INT AUTO_INCREMENT NOT NULL, type_id INT DEFAULT NULL, date_peremption DATE NOT NULL, reserve TINYINT(1) NOT NULL, INDEX IDX_B5DCA0A7C54C8C93 (type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE rendez_vous ADD CONSTRAINT FK_65E8AA0AC2BE0752 FOREIGN KEY (infirmier_id) REFERENCES infirmier (id)');
        $this->addSql('ALTER TABLE rendez_vous ADD CONSTRAINT FK_65E8AA0A9B14AC76 FOREIGN KEY (vaccin_id) REFERENCES vaccin (id)');
        $this->addSql('ALTER TABLE vaccin ADD CONSTRAINT FK_B5DCA0A7C54C8C93 FOREIGN KEY (type_id) REFERENCES type_vaccin (id)');
        $this->addSql('ALTER TABLE lit CHANGE longueur longueur INT NOT NULL, CHANGE largeur largeur INT NOT NULL');
        $this->addSql('ALTER TABLE patient CHANGE numero_ss numero_ss BIGINT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE vaccin DROP FOREIGN KEY FK_B5DCA0A7C54C8C93');
        $this->addSql('ALTER TABLE rendez_vous DROP FOREIGN KEY FK_65E8AA0A9B14AC76');
        $this->addSql('DROP TABLE rendez_vous');
        $this->addSql('DROP TABLE secretaire');
        $this->addSql('DROP TABLE type_vaccin');
        $this->addSql('DROP TABLE vaccin');
        $this->addSql('ALTER TABLE lit CHANGE longueur longueur DOUBLE PRECISION NOT NULL, CHANGE largeur largeur DOUBLE PRECISION NOT NULL');
        $this->addSql('ALTER TABLE patient CHANGE numero_ss numero_ss INT NOT NULL');
    }
}
