<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211118152342 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `admin` CHANGE id id INT AUTO_INCREMENT NOT NULL, CHANGE nom nom VARCHAR(255) NOT NULL, CHANGE prenom prenom VARCHAR(255) NOT NULL, CHANGE identifiant identifiant VARCHAR(255) NOT NULL, CHANGE mdp mdp VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE infirmier CHANGE id id INT AUTO_INCREMENT NOT NULL, CHANGE nom nom VARCHAR(255) NOT NULL, CHANGE prenom prenom VARCHAR(255) NOT NULL, CHANGE identifiant identifiant VARCHAR(255) NOT NULL, CHANGE mdp mdp VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE lit CHANGE id id INT AUTO_INCREMENT NOT NULL, CHANGE numero numero INT NOT NULL, CHANGE chambre chambre INT NOT NULL, CHANGE longueur longueur DOUBLE PRECISION NOT NULL, CHANGE largeur largeur DOUBLE PRECISION NOT NULL, CHANGE etat etat TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE patient ADD service_id INT DEFAULT NULL, ADD lit_id INT DEFAULT NULL, ADD lieu VARCHAR(255) NOT NULL, DROP lieu_naissance, DROP service, DROP lit, CHANGE id id INT AUTO_INCREMENT NOT NULL, CHANGE nom nom VARCHAR(255) NOT NULL, CHANGE prenom prenom VARCHAR(255) NOT NULL, CHANGE date_naissance date_naissance DATE NOT NULL, CHANGE description description VARCHAR(255) NOT NULL, CHANGE probleme probleme VARCHAR(255) NOT NULL, CHANGE numero_ss numero_ss INT NOT NULL');
        $this->addSql('ALTER TABLE patient ADD CONSTRAINT FK_1ADAD7EBED5CA9E6 FOREIGN KEY (service_id) REFERENCES service (id)');
        $this->addSql('ALTER TABLE patient ADD CONSTRAINT FK_1ADAD7EB278B5057 FOREIGN KEY (lit_id) REFERENCES lit (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1ADAD7EBED5CA9E6 ON patient (service_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1ADAD7EB278B5057 ON patient (lit_id)');
        $this->addSql('ALTER TABLE service CHANGE id id INT AUTO_INCREMENT NOT NULL, CHANGE label label VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `admin` CHANGE id id INT AUTO_INCREMENT NOT NULL COMMENT \'Id de l\'\'admin\', CHANGE nom nom VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci` COMMENT \'Nom de l\'\'administration\', CHANGE prenom prenom VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci` COMMENT \'Prénom de l\'\'administration\', CHANGE identifiant identifiant VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci` COMMENT \'Identifiant de connexion\', CHANGE mdp mdp VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci` COMMENT \'mot de passe de l\'\'utilisateur\'');
        $this->addSql('ALTER TABLE infirmier CHANGE id id INT AUTO_INCREMENT NOT NULL COMMENT \'Identifiant de l\'\'infirmier\', CHANGE nom nom VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci` COMMENT \'Nom de l\'\'infirmier\', CHANGE prenom prenom VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci` COMMENT \'Prenom de l\'\'infirmier\', CHANGE identifiant identifiant VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci` COMMENT \'Identifiant de connexion de l\'\'infirmier\', CHANGE mdp mdp VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci` COMMENT \'mot de pase de l\'\'infirmier\'');
        $this->addSql('ALTER TABLE lit CHANGE id id INT AUTO_INCREMENT NOT NULL COMMENT \'identifiant du lit\', CHANGE numero numero INT NOT NULL COMMENT \'numero du lit\', CHANGE chambre chambre INT NOT NULL COMMENT \'numero de chambre ou se trouve le lit\', CHANGE longueur longueur INT NOT NULL COMMENT \'longueur du lit en cm\', CHANGE largeur largeur INT NOT NULL COMMENT \'largeur du lit en cm\', CHANGE etat etat TINYINT(1) NOT NULL COMMENT \'Si le lit est occupe ou non\'');
        $this->addSql('ALTER TABLE patient DROP FOREIGN KEY FK_1ADAD7EBED5CA9E6');
        $this->addSql('ALTER TABLE patient DROP FOREIGN KEY FK_1ADAD7EB278B5057');
        $this->addSql('DROP INDEX UNIQ_1ADAD7EBED5CA9E6 ON patient');
        $this->addSql('DROP INDEX UNIQ_1ADAD7EB278B5057 ON patient');
        $this->addSql('ALTER TABLE patient ADD lieu_naissance VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci` COMMENT \'Lieu de naissance du patient\', ADD service INT NOT NULL COMMENT \'Service ans lequel se trouve le patient\', ADD lit INT NOT NULL COMMENT \'Numero de lit dans lequel se trouve le patient\', DROP service_id, DROP lit_id, DROP lieu, CHANGE id id INT AUTO_INCREMENT NOT NULL COMMENT \'Identifiant du patient\', CHANGE nom nom VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci` COMMENT \'Nom du patient\', CHANGE prenom prenom VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci` COMMENT \'Prenom du patient\', CHANGE date_naissance date_naissance DATE NOT NULL COMMENT \'Date de naissance du patient\', CHANGE description description VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci` COMMENT \'Description du patient\', CHANGE probleme probleme VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci` COMMENT \'Raison de l\'\'hospitalisation du patient\', CHANGE numero_ss numero_ss INT NOT NULL COMMENT \'Numero de securite sociale du patient\'');
        $this->addSql('ALTER TABLE service CHANGE id id INT AUTO_INCREMENT NOT NULL COMMENT \'Identifiant du service\', CHANGE label label VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci` COMMENT \'Label du service\'');
    }
}
