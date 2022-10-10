<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221002171452 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE approch_type (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE climbing_spot (id INT AUTO_INCREMENT NOT NULL, min_level_id INT NOT NULL, max_level_id INT NOT NULL, exposure_id INT NOT NULL, engagement_id INT NOT NULL, equipment_id INT NOT NULL, rock_type_id INT NOT NULL, rout_profil_id INT NOT NULL, approach_id INT NOT NULL, name VARCHAR(100) NOT NULL, INDEX IDX_CFE9117BBEE72D9E (min_level_id), INDEX IDX_CFE9117B2E943D74 (max_level_id), INDEX IDX_CFE9117BC677C140 (exposure_id), INDEX IDX_CFE9117BD30F6F97 (engagement_id), INDEX IDX_CFE9117B517FE9FE (equipment_id), INDEX IDX_CFE9117B4048A977 (rock_type_id), INDEX IDX_CFE9117B8863CFC2 (rout_profil_id), INDEX IDX_CFE9117B15140614 (approach_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE engagement (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE equimpent (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE exposure (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE level (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rock_type (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rout_profil (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sector (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, first_name VARCHAR(50) NOT NULL, last_name VARCHAR(100) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE climbing_spot ADD CONSTRAINT FK_CFE9117BBEE72D9E FOREIGN KEY (min_level_id) REFERENCES level (id)');
        $this->addSql('ALTER TABLE climbing_spot ADD CONSTRAINT FK_CFE9117B2E943D74 FOREIGN KEY (max_level_id) REFERENCES level (id)');
        $this->addSql('ALTER TABLE climbing_spot ADD CONSTRAINT FK_CFE9117BC677C140 FOREIGN KEY (exposure_id) REFERENCES exposure (id)');
        $this->addSql('ALTER TABLE climbing_spot ADD CONSTRAINT FK_CFE9117BD30F6F97 FOREIGN KEY (engagement_id) REFERENCES engagement (id)');
        $this->addSql('ALTER TABLE climbing_spot ADD CONSTRAINT FK_CFE9117B517FE9FE FOREIGN KEY (equipment_id) REFERENCES equimpent (id)');
        $this->addSql('ALTER TABLE climbing_spot ADD CONSTRAINT FK_CFE9117B4048A977 FOREIGN KEY (rock_type_id) REFERENCES rock_type (id)');
        $this->addSql('ALTER TABLE climbing_spot ADD CONSTRAINT FK_CFE9117B8863CFC2 FOREIGN KEY (rout_profil_id) REFERENCES rout_profil (id)');
        $this->addSql('ALTER TABLE climbing_spot ADD CONSTRAINT FK_CFE9117B15140614 FOREIGN KEY (approach_id) REFERENCES approch_type (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE climbing_spot DROP FOREIGN KEY FK_CFE9117BBEE72D9E');
        $this->addSql('ALTER TABLE climbing_spot DROP FOREIGN KEY FK_CFE9117B2E943D74');
        $this->addSql('ALTER TABLE climbing_spot DROP FOREIGN KEY FK_CFE9117BC677C140');
        $this->addSql('ALTER TABLE climbing_spot DROP FOREIGN KEY FK_CFE9117BD30F6F97');
        $this->addSql('ALTER TABLE climbing_spot DROP FOREIGN KEY FK_CFE9117B517FE9FE');
        $this->addSql('ALTER TABLE climbing_spot DROP FOREIGN KEY FK_CFE9117B4048A977');
        $this->addSql('ALTER TABLE climbing_spot DROP FOREIGN KEY FK_CFE9117B8863CFC2');
        $this->addSql('ALTER TABLE climbing_spot DROP FOREIGN KEY FK_CFE9117B15140614');
        $this->addSql('DROP TABLE approch_type');
        $this->addSql('DROP TABLE climbing_spot');
        $this->addSql('DROP TABLE engagement');
        $this->addSql('DROP TABLE equimpent');
        $this->addSql('DROP TABLE exposure');
        $this->addSql('DROP TABLE level');
        $this->addSql('DROP TABLE rock_type');
        $this->addSql('DROP TABLE rout_profil');
        $this->addSql('DROP TABLE sector');
        $this->addSql('DROP TABLE `user`');
    }
}
