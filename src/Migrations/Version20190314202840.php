<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190314202840 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE condidat (id CHAR(36) NOT NULL COMMENT \'(DC2Type:guid)\', firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, email VARCHAR(100) NOT NULL, phone INT NOT NULL, resume VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE article (id CHAR(36) NOT NULL COMMENT \'(DC2Type:guid)\', admin_id CHAR(36) NOT NULL COMMENT \'(DC2Type:guid)\', title VARCHAR(255) NOT NULL, body LONGTEXT NOT NULL, picture VARCHAR(255) DEFAULT NULL, INDEX IDX_23A0E66642B8210 (admin_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE admin (id CHAR(36) NOT NULL COMMENT \'(DC2Type:guid)\', name VARCHAR(40) NOT NULL, email VARCHAR(40) NOT NULL, password VARCHAR(100) NOT NULL, picture VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_880E0D76E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE employer (id CHAR(36) NOT NULL COMMENT \'(DC2Type:guid)\', name VARCHAR(100) NOT NULL, company VARCHAR(100) NOT NULL, phone INT NOT NULL, email VARCHAR(100) NOT NULL, message VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E66642B8210 FOREIGN KEY (admin_id) REFERENCES admin (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E66642B8210');
        $this->addSql('DROP TABLE condidat');
        $this->addSql('DROP TABLE article');
        $this->addSql('DROP TABLE admin');
        $this->addSql('DROP TABLE employer');
    }
}
