<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221108074247 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE adherent DROP FOREIGN KEY FK_90D3F060A0905086');
        $this->addSql('DROP INDEX IDX_90D3F060A0905086 ON adherent');
        $this->addSql('ALTER TABLE adherent ADD name_poste_id INT DEFAULT NULL, DROP poste_id');
        $this->addSql('ALTER TABLE adherent ADD CONSTRAINT FK_90D3F0608C41A548 FOREIGN KEY (name_poste_id) REFERENCES poste (id)');
        $this->addSql('CREATE INDEX IDX_90D3F0608C41A548 ON adherent (name_poste_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE adherent DROP FOREIGN KEY FK_90D3F0608C41A548');
        $this->addSql('DROP INDEX IDX_90D3F0608C41A548 ON adherent');
        $this->addSql('ALTER TABLE adherent ADD poste_id INT NOT NULL, DROP name_poste_id');
        $this->addSql('ALTER TABLE adherent ADD CONSTRAINT FK_90D3F060A0905086 FOREIGN KEY (poste_id) REFERENCES poste (id)');
        $this->addSql('CREATE INDEX IDX_90D3F060A0905086 ON adherent (poste_id)');
    }
}
