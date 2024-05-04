<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240504153405 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE blockage_answers (id INT AUTO_INCREMENT NOT NULL, idquestion_id INT DEFAULT NULL, firstanswer VARCHAR(255) NOT NULL, secondanswer VARCHAR(255) NOT NULL, thirdquestion VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_900E20F7D8E68610 (idquestion_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE negotiation_answers (id INT AUTO_INCREMENT NOT NULL, idquestion_id INT DEFAULT NULL, firstanswer VARCHAR(255) NOT NULL, secondanswer VARCHAR(255) NOT NULL, thirdanswer VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_46F80E18D8E68610 (idquestion_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE position_answers (id INT AUTO_INCREMENT NOT NULL, idquestion_id INT DEFAULT NULL, firstanswer VARCHAR(255) NOT NULL, secondanswer VARCHAR(255) NOT NULL, thirdanswer VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_C321D7F5D8E68610 (idquestion_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE blockage_answers ADD CONSTRAINT FK_900E20F7D8E68610 FOREIGN KEY (idquestion_id) REFERENCES blockage_questions (id)');
        $this->addSql('ALTER TABLE negotiation_answers ADD CONSTRAINT FK_46F80E18D8E68610 FOREIGN KEY (idquestion_id) REFERENCES negotiation_questions (id)');
        $this->addSql('ALTER TABLE position_answers ADD CONSTRAINT FK_C321D7F5D8E68610 FOREIGN KEY (idquestion_id) REFERENCES position_questions (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE blockage_answers DROP FOREIGN KEY FK_900E20F7D8E68610');
        $this->addSql('ALTER TABLE negotiation_answers DROP FOREIGN KEY FK_46F80E18D8E68610');
        $this->addSql('ALTER TABLE position_answers DROP FOREIGN KEY FK_C321D7F5D8E68610');
        $this->addSql('DROP TABLE blockage_answers');
        $this->addSql('DROP TABLE negotiation_answers');
        $this->addSql('DROP TABLE position_answers');
    }
}
