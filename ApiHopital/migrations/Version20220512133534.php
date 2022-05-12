<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220512133534 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE rendez_vous DROP FOREIGN KEY FK_65E8AA0AC2BE0752');
        $this->addSql('DROP INDEX IDX_65E8AA0AC2BE0752 ON rendez_vous');
        $this->addSql('ALTER TABLE rendez_vous ADD nom VARCHAR(255) NOT NULL, ADD prenom VARCHAR(255) NOT NULL, ADD heure TIME NOT NULL, DROP infirmier_id, CHANGE date date DATE NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE rendez_vous ADD infirmier_id INT DEFAULT NULL, DROP nom, DROP prenom, DROP heure, CHANGE date date DATETIME NOT NULL');
        $this->addSql('ALTER TABLE rendez_vous ADD CONSTRAINT FK_65E8AA0AC2BE0752 FOREIGN KEY (infirmier_id) REFERENCES infirmier (id)');
        $this->addSql('CREATE INDEX IDX_65E8AA0AC2BE0752 ON rendez_vous (infirmier_id)');
    }
}
