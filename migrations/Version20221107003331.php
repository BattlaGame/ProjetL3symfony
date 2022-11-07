<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221107003331 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE adherent DROP INDEX UNIQ_90D3F060A0905086, ADD INDEX IDX_90D3F060A0905086 (poste_id)');
        $this->addSql('ALTER TABLE adherent DROP FOREIGN KEY FK_90D3F06025F06C53');
        $this->addSql('DROP INDEX IDX_90D3F06025F06C53 ON adherent');
        $this->addSql('ALTER TABLE adherent DROP adherent_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE adherent DROP INDEX IDX_90D3F060A0905086, ADD UNIQUE INDEX UNIQ_90D3F060A0905086 (poste_id)');
        $this->addSql('ALTER TABLE adherent ADD adherent_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE adherent ADD CONSTRAINT FK_90D3F06025F06C53 FOREIGN KEY (adherent_id) REFERENCES poste (id)');
        $this->addSql('CREATE INDEX IDX_90D3F06025F06C53 ON adherent (adherent_id)');
    }
}
