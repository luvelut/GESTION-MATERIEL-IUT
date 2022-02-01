<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211207131308 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(40) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `group` (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, label VARCHAR(40) NOT NULL, INDEX IDX_6DC044C5A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE loan (id INT AUTO_INCREMENT NOT NULL, created_at DATETIME NOT NULL, finished_at DATETIME NOT NULL, returned_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ressource (id INT AUTO_INCREMENT NOT NULL, loan_id INT DEFAULT NULL, label VARCHAR(40) NOT NULL, image VARCHAR(250) DEFAULT NULL, description VARCHAR(250) DEFAULT NULL, quantity_total INT DEFAULT NULL, INDEX IDX_939F4544CE73868F (loan_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ressource_category (ressource_id INT NOT NULL, category_id INT NOT NULL, INDEX IDX_48FDA01BFC6CD52A (ressource_id), INDEX IDX_48FDA01B12469DE2 (category_id), PRIMARY KEY(ressource_id, category_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ressource_group (ressource_id INT NOT NULL, group_id INT NOT NULL, INDEX IDX_F954C041FC6CD52A (ressource_id), INDEX IDX_F954C041FE54D947 (group_id), PRIMARY KEY(ressource_id, group_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, loan_id INT DEFAULT NULL, firstname VARCHAR(40) NOT NULL, lastname VARCHAR(40) NOT NULL, email VARCHAR(60) NOT NULL, password VARCHAR(250) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', INDEX IDX_8D93D649CE73868F (loan_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE `group` ADD CONSTRAINT FK_6DC044C5A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE ressource ADD CONSTRAINT FK_939F4544CE73868F FOREIGN KEY (loan_id) REFERENCES loan (id)');
        $this->addSql('ALTER TABLE ressource_category ADD CONSTRAINT FK_48FDA01BFC6CD52A FOREIGN KEY (ressource_id) REFERENCES ressource (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE ressource_category ADD CONSTRAINT FK_48FDA01B12469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE ressource_group ADD CONSTRAINT FK_F954C041FC6CD52A FOREIGN KEY (ressource_id) REFERENCES ressource (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE ressource_group ADD CONSTRAINT FK_F954C041FE54D947 FOREIGN KEY (group_id) REFERENCES `group` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649CE73868F FOREIGN KEY (loan_id) REFERENCES loan (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ressource_category DROP FOREIGN KEY FK_48FDA01B12469DE2');
        $this->addSql('ALTER TABLE ressource_group DROP FOREIGN KEY FK_F954C041FE54D947');
        $this->addSql('ALTER TABLE ressource DROP FOREIGN KEY FK_939F4544CE73868F');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649CE73868F');
        $this->addSql('ALTER TABLE ressource_category DROP FOREIGN KEY FK_48FDA01BFC6CD52A');
        $this->addSql('ALTER TABLE ressource_group DROP FOREIGN KEY FK_F954C041FC6CD52A');
        $this->addSql('ALTER TABLE `group` DROP FOREIGN KEY FK_6DC044C5A76ED395');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE `group`');
        $this->addSql('DROP TABLE loan');
        $this->addSql('DROP TABLE ressource');
        $this->addSql('DROP TABLE ressource_category');
        $this->addSql('DROP TABLE ressource_group');
        $this->addSql('DROP TABLE user');
    }
}
