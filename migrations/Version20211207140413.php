<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211207140413 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `group` DROP FOREIGN KEY FK_6DC044C5A76ED395');
        $this->addSql('DROP INDEX IDX_6DC044C5A76ED395 ON `group`');
        $this->addSql('ALTER TABLE `group` DROP user_id');
        $this->addSql('ALTER TABLE user ADD group_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6492F68B530 FOREIGN KEY (group_id_id) REFERENCES `group` (id)');
        $this->addSql('CREATE INDEX IDX_8D93D6492F68B530 ON user (group_id_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `group` ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE `group` ADD CONSTRAINT FK_6DC044C5A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_6DC044C5A76ED395 ON `group` (user_id)');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6492F68B530');
        $this->addSql('DROP INDEX IDX_8D93D6492F68B530 ON user');
        $this->addSql('ALTER TABLE user DROP group_id_id');
    }
}
