<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211208131943 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE loan ADD ressource_id INT NOT NULL');
        $this->addSql('ALTER TABLE loan ADD CONSTRAINT FK_C5D30D03FC6CD52A FOREIGN KEY (ressource_id) REFERENCES ressource (id)');
        $this->addSql('CREATE INDEX IDX_C5D30D03FC6CD52A ON loan (ressource_id)');
        $this->addSql('ALTER TABLE ressource DROP FOREIGN KEY FK_939F4544CE73868F');
        $this->addSql('DROP INDEX IDX_939F4544CE73868F ON ressource');
        $this->addSql('ALTER TABLE ressource DROP loan_id');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6492F68B530');
        $this->addSql('DROP INDEX IDX_8D93D6492F68B530 ON user');
        $this->addSql('ALTER TABLE user CHANGE group_id_id group_id INT NOT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649FE54D947 FOREIGN KEY (group_id) REFERENCES `group` (id)');
        $this->addSql('CREATE INDEX IDX_8D93D649FE54D947 ON user (group_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE loan DROP FOREIGN KEY FK_C5D30D03FC6CD52A');
        $this->addSql('DROP INDEX IDX_C5D30D03FC6CD52A ON loan');
        $this->addSql('ALTER TABLE loan DROP ressource_id');
        $this->addSql('ALTER TABLE ressource ADD loan_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE ressource ADD CONSTRAINT FK_939F4544CE73868F FOREIGN KEY (loan_id) REFERENCES loan (id)');
        $this->addSql('CREATE INDEX IDX_939F4544CE73868F ON ressource (loan_id)');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649FE54D947');
        $this->addSql('DROP INDEX IDX_8D93D649FE54D947 ON user');
        $this->addSql('ALTER TABLE user CHANGE group_id group_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6492F68B530 FOREIGN KEY (group_id_id) REFERENCES `group` (id)');
        $this->addSql('CREATE INDEX IDX_8D93D6492F68B530 ON user (group_id_id)');
    }
}
