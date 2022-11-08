<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221108183040 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE product');
        $this->addSql('DROP INDEX UNIQ_90D3F060A0905086 ON adherent');
        $this->addSql('ALTER TABLE adherent ADD name_poste_id INT DEFAULT NULL, DROP poste_id');
        $this->addSql('ALTER TABLE adherent ADD CONSTRAINT FK_90D3F0608C41A548 FOREIGN KEY (name_poste_id) REFERENCES poste (id)');
        $this->addSql('CREATE INDEX IDX_90D3F0608C41A548 ON adherent (name_poste_id)');
        $this->addSql('ALTER TABLE user ADD payement TINYINT(1) NOT NULL, DROP image_file, CHANGE image_name image_name VARCHAR(255) DEFAULT NULL, CHANGE image_size image_size INT DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE product (id INT AUTO_INCREMENT NOT NULL, updated_at DATETIME NOT NULL, image_name VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, image_original_name VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, image_mime_type VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, image_size INT DEFAULT NULL, image_dimensions LONGTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci` COMMENT \'(DC2Type:simple_array)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE adherent DROP FOREIGN KEY FK_90D3F0608C41A548');
        $this->addSql('DROP INDEX IDX_90D3F0608C41A548 ON adherent');
        $this->addSql('ALTER TABLE adherent ADD poste_id INT NOT NULL, DROP name_poste_id');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_90D3F060A0905086 ON adherent (poste_id)');
        $this->addSql('ALTER TABLE user ADD image_file VARCHAR(255) DEFAULT NULL, DROP payement, CHANGE image_name image_name VARCHAR(255) NOT NULL, CHANGE image_size image_size INT NOT NULL');
    }
}
