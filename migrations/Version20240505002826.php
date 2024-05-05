<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240505002826 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE team (id INT AUTO_INCREMENT NOT NULL, attacker_id INT DEFAULT NULL, defenser_id INT DEFAULT NULL, supporter_id INT DEFAULT NULL, teamname VARCHAR(255) NOT NULL, representation_image VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_C4E0A61F65F8CAE3 (attacker_id), UNIQUE INDEX UNIQ_C4E0A61F54ED094C (defenser_id), UNIQUE INDEX UNIQ_C4E0A61F4AF59D5D (supporter_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE team ADD CONSTRAINT FK_C4E0A61F65F8CAE3 FOREIGN KEY (attacker_id) REFERENCES hero (id)');
        $this->addSql('ALTER TABLE team ADD CONSTRAINT FK_C4E0A61F54ED094C FOREIGN KEY (defenser_id) REFERENCES hero (id)');
        $this->addSql('ALTER TABLE team ADD CONSTRAINT FK_C4E0A61F4AF59D5D FOREIGN KEY (supporter_id) REFERENCES hero (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE team DROP FOREIGN KEY FK_C4E0A61F65F8CAE3');
        $this->addSql('ALTER TABLE team DROP FOREIGN KEY FK_C4E0A61F54ED094C');
        $this->addSql('ALTER TABLE team DROP FOREIGN KEY FK_C4E0A61F4AF59D5D');
        $this->addSql('DROP TABLE team');
    }
}
