<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240603134551 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE alternative ADD CONSTRAINT FK_EFF5DFA3F94EAC8 FOREIGN KEY (etape_precedente_id) REFERENCES etape (id)');
        $this->addSql('ALTER TABLE alternative ADD CONSTRAINT FK_EFF5DFA62A0957E FOREIGN KEY (etape_suivante_id) REFERENCES etape (id)');
        $this->addSql('ALTER TABLE aventure ADD CONSTRAINT FK_1E56DE4B9551B165 FOREIGN KEY (premiere_etape_id) REFERENCES etape (id)');
        $this->addSql('ALTER TABLE etape ADD CONSTRAINT FK_285F75DD873DBB5F FOREIGN KEY (aventure_id) REFERENCES aventure (id)');
        $this->addSql('ALTER TABLE etape ADD CONSTRAINT FK_285F75DDC3DCFBBF FOREIGN KEY (fin_aventure_id) REFERENCES aventure (id)');
        $this->addSql('ALTER TABLE partie ADD CONSTRAINT FK_59B1F3DEDDC7141 FOREIGN KEY (aventurier_id) REFERENCES personnage (id)');
        $this->addSql('ALTER TABLE partie ADD CONSTRAINT FK_59B1F3D873DBB5F FOREIGN KEY (aventure_id) REFERENCES aventure (id)');
        $this->addSql('ALTER TABLE partie ADD CONSTRAINT FK_59B1F3D4A8CA2AD FOREIGN KEY (etape_id) REFERENCES etape (id)');
        $this->addSql('ALTER TABLE personnage ADD CONSTRAINT FK_6AEA486D86383B10 FOREIGN KEY (avatar_id) REFERENCES avatar (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE alternative DROP FOREIGN KEY FK_EFF5DFA3F94EAC8');
        $this->addSql('ALTER TABLE alternative DROP FOREIGN KEY FK_EFF5DFA62A0957E');
        $this->addSql('ALTER TABLE personnage DROP FOREIGN KEY FK_6AEA486D86383B10');
        $this->addSql('ALTER TABLE aventure DROP FOREIGN KEY FK_1E56DE4B9551B165');
        $this->addSql('ALTER TABLE partie DROP FOREIGN KEY FK_59B1F3DEDDC7141');
        $this->addSql('ALTER TABLE partie DROP FOREIGN KEY FK_59B1F3D873DBB5F');
        $this->addSql('ALTER TABLE partie DROP FOREIGN KEY FK_59B1F3D4A8CA2AD');
        $this->addSql('ALTER TABLE etape DROP FOREIGN KEY FK_285F75DD873DBB5F');
        $this->addSql('ALTER TABLE etape DROP FOREIGN KEY FK_285F75DDC3DCFBBF');
    }
}
