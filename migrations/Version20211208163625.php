<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211208163625 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE loan ADD user_id INT NOT NULL');
        $this->addSql('ALTER TABLE loan ADD CONSTRAINT FK_C5D30D03A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_C5D30D03A76ED395 ON loan (user_id)');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649CE73868F');
        $this->addSql('DROP INDEX IDX_8D93D649CE73868F ON user');
        $this->addSql('ALTER TABLE user DROP loan_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE loan DROP FOREIGN KEY FK_C5D30D03A76ED395');
        $this->addSql('DROP INDEX IDX_C5D30D03A76ED395 ON loan');
        $this->addSql('ALTER TABLE loan DROP user_id');
        $this->addSql('ALTER TABLE user ADD loan_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649CE73868F FOREIGN KEY (loan_id) REFERENCES loan (id)');
        $this->addSql('CREATE INDEX IDX_8D93D649CE73868F ON user (loan_id)');
    }
}
