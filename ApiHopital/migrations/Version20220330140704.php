<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220330140704 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE secretaire DROP nom, DROP prenom');
        $this->addSql('ALTER TABLE type_vaccin DROP FOREIGN KEY FK_960BCB9F9B14AC76');
        $this->addSql('DROP INDEX IDX_960BCB9F9B14AC76 ON type_vaccin');
        $this->addSql('ALTER TABLE type_vaccin DROP vaccin_id');
        $this->addSql('ALTER TABLE vaccin ADD type_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE vaccin ADD CONSTRAINT FK_B5DCA0A7C54C8C93 FOREIGN KEY (type_id) REFERENCES type_vaccin (id)');
        $this->addSql('CREATE INDEX IDX_B5DCA0A7C54C8C93 ON vaccin (type_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE secretaire ADD nom VARCHAR(255) NOT NULL, ADD prenom VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE type_vaccin ADD vaccin_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE type_vaccin ADD CONSTRAINT FK_960BCB9F9B14AC76 FOREIGN KEY (vaccin_id) REFERENCES vaccin (id)');
        $this->addSql('CREATE INDEX IDX_960BCB9F9B14AC76 ON type_vaccin (vaccin_id)');
        $this->addSql('ALTER TABLE vaccin DROP FOREIGN KEY FK_B5DCA0A7C54C8C93');
        $this->addSql('DROP INDEX IDX_B5DCA0A7C54C8C93 ON vaccin');
        $this->addSql('ALTER TABLE vaccin DROP type_id');
    }
}
