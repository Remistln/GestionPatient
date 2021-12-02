<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211201215146 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE patient DROP FOREIGN KEY FK_1ADAD7EB278B5057');
        $this->addSql('ALTER TABLE patient DROP FOREIGN KEY FK_1ADAD7EBED5CA9E6');
        $this->addSql('DROP INDEX UNIQ_1ADAD7EB278B5057 ON patient');
        $this->addSql('DROP INDEX UNIQ_1ADAD7EBED5CA9E6 ON patient');
        $this->addSql('ALTER TABLE patient ADD service INT NOT NULL, ADD lit INT NOT NULL, DROP service_id, DROP lit_id, CHANGE description description VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE patient ADD service_id INT DEFAULT NULL, ADD lit_id INT DEFAULT NULL, DROP service, DROP lit, CHANGE description description VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE patient ADD CONSTRAINT FK_1ADAD7EB278B5057 FOREIGN KEY (lit_id) REFERENCES lit (id)');
        $this->addSql('ALTER TABLE patient ADD CONSTRAINT FK_1ADAD7EBED5CA9E6 FOREIGN KEY (service_id) REFERENCES service (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1ADAD7EB278B5057 ON patient (lit_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1ADAD7EBED5CA9E6 ON patient (service_id)');
    }
}
