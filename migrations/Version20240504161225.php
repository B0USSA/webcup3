<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240504161225 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE analyse_answers (id INT AUTO_INCREMENT NOT NULL, idquestion_id INT DEFAULT NULL, firstanswer VARCHAR(255) NOT NULL, secondanswer VARCHAR(255) NOT NULL, thirdanswer VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_5A320B03D8E68610 (idquestion_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE analyse_questions (id INT AUTO_INCREMENT NOT NULL, question VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE analyse_answers ADD CONSTRAINT FK_5A320B03D8E68610 FOREIGN KEY (idquestion_id) REFERENCES analyse_questions (id)');
        $this->addSql('ALTER TABLE blockage_answers DROP FOREIGN KEY FK_900E20F7D8E68610');
        $this->addSql('DROP TABLE blockage_questions');
        $this->addSql('DROP TABLE blockage_answers');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE blockage_questions (id INT AUTO_INCREMENT NOT NULL, question VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE blockage_answers (id INT AUTO_INCREMENT NOT NULL, idquestion_id INT DEFAULT NULL, firstanswer VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, secondanswer VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, thirdquestion VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, UNIQUE INDEX UNIQ_900E20F7D8E68610 (idquestion_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE blockage_answers ADD CONSTRAINT FK_900E20F7D8E68610 FOREIGN KEY (idquestion_id) REFERENCES blockage_questions (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE analyse_answers DROP FOREIGN KEY FK_5A320B03D8E68610');
        $this->addSql('DROP TABLE analyse_answers');
        $this->addSql('DROP TABLE analyse_questions');
    }
}
