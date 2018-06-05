<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180603124244 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('DROP INDEX IDX_27FF4FE57E3C61F9');
        $this->addSql('DROP INDEX IDX_27FF4FE51FF438FB');
        $this->addSql('CREATE TEMPORARY TABLE __temp__book_entity AS SELECT id, bookcase_id, owner_id, title, author_name, author_surname, isbn13, publisher, format FROM book_entity');
        $this->addSql('DROP TABLE book_entity');
        $this->addSql('CREATE TABLE book_entity (id INTEGER NOT NULL, bookcase_id INTEGER NOT NULL, owner_id INTEGER NOT NULL, borrower_id INTEGER DEFAULT NULL, title VARCHAR(255) NOT NULL COLLATE BINARY, author_name VARCHAR(100) NOT NULL COLLATE BINARY, author_surname VARCHAR(100) NOT NULL COLLATE BINARY, isbn13 VARCHAR(13) NOT NULL COLLATE BINARY, publisher VARCHAR(255) DEFAULT NULL COLLATE BINARY, format VARCHAR(10) DEFAULT NULL COLLATE BINARY, borrow_date DATETIME DEFAULT NULL, borrow_period INTEGER DEFAULT NULL, PRIMARY KEY(id), CONSTRAINT FK_27FF4FE51FF438FB FOREIGN KEY (bookcase_id) REFERENCES bookcase_entity (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_27FF4FE57E3C61F9 FOREIGN KEY (owner_id) REFERENCES fos_user (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_27FF4FE511CE312B FOREIGN KEY (borrower_id) REFERENCES fos_user (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO book_entity (id, bookcase_id, owner_id, title, author_name, author_surname, isbn13, publisher, format) SELECT id, bookcase_id, owner_id, title, author_name, author_surname, isbn13, publisher, format FROM __temp__book_entity');
        $this->addSql('DROP TABLE __temp__book_entity');
        $this->addSql('CREATE INDEX IDX_27FF4FE57E3C61F9 ON book_entity (owner_id)');
        $this->addSql('CREATE INDEX IDX_27FF4FE51FF438FB ON book_entity (bookcase_id)');
        $this->addSql('CREATE INDEX IDX_27FF4FE511CE312B ON book_entity (borrower_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('DROP INDEX IDX_27FF4FE51FF438FB');
        $this->addSql('DROP INDEX IDX_27FF4FE57E3C61F9');
        $this->addSql('DROP INDEX IDX_27FF4FE511CE312B');
        $this->addSql('CREATE TEMPORARY TABLE __temp__book_entity AS SELECT id, bookcase_id, owner_id, title, author_name, author_surname, isbn13, publisher, format FROM book_entity');
        $this->addSql('DROP TABLE book_entity');
        $this->addSql('CREATE TABLE book_entity (id INTEGER NOT NULL, bookcase_id INTEGER NOT NULL, title VARCHAR(255) NOT NULL, author_name VARCHAR(100) NOT NULL, author_surname VARCHAR(100) NOT NULL, isbn13 VARCHAR(13) NOT NULL, publisher VARCHAR(255) DEFAULT NULL, format VARCHAR(10) DEFAULT NULL, owner_id INTEGER DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('INSERT INTO book_entity (id, bookcase_id, owner_id, title, author_name, author_surname, isbn13, publisher, format) SELECT id, bookcase_id, owner_id, title, author_name, author_surname, isbn13, publisher, format FROM __temp__book_entity');
        $this->addSql('DROP TABLE __temp__book_entity');
        $this->addSql('CREATE INDEX IDX_27FF4FE51FF438FB ON book_entity (bookcase_id)');
        $this->addSql('CREATE INDEX IDX_27FF4FE57E3C61F9 ON book_entity (owner_id)');
    }
}
