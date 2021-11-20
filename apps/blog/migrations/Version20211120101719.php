<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211120101719 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE post_category (postId INT NOT NULL, categoryId INT NOT NULL, INDEX idx_pc_category (categoryId), INDEX idx_pc_post (postId), PRIMARY KEY(postId, categoryId)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE post_comment (id INT AUTO_INCREMENT NOT NULL, postId INT NOT NULL, parentId INT DEFAULT NULL, title VARCHAR(100) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_0900_ai_ci`, published TINYINT(1) DEFAULT \'0\' NOT NULL, createdAt DATETIME NOT NULL, publishedAt DATETIME DEFAULT NULL, content TEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, INDEX idx_comment_parent (parentId), INDEX idx_comment_post (postId), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE post_tag (postId INT NOT NULL, tagId INT NOT NULL, INDEX idx_pc_post (postId), INDEX idx_pc_tag (tagId), PRIMARY KEY(postId, tagId)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE post_category ADD CONSTRAINT fk_pc_category FOREIGN KEY (categoryId) REFERENCES category (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE post_category ADD CONSTRAINT fk_pc_post FOREIGN KEY (postId) REFERENCES post (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE post_comment ADD CONSTRAINT fk_comment_parent FOREIGN KEY (parentId) REFERENCES post_comment (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE post_comment ADD CONSTRAINT fk_comment_post FOREIGN KEY (postId) REFERENCES post (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE post_tag ADD CONSTRAINT fk_pc_tag FOREIGN KEY (tagId) REFERENCES tag (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE post_tag ADD CONSTRAINT fk_pt_post FOREIGN KEY (postId) REFERENCES post (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE category ADD parentId INT DEFAULT NULL');
        $this->addSql('ALTER TABLE category ADD CONSTRAINT fk_category_parent FOREIGN KEY (parentId) REFERENCES category (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX idx_category_parent ON category (parentId)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE post_comment DROP FOREIGN KEY fk_comment_parent');
        $this->addSql('DROP TABLE post_category');
        $this->addSql('DROP TABLE post_comment');
        $this->addSql('DROP TABLE post_tag');
        $this->addSql('ALTER TABLE category DROP FOREIGN KEY fk_category_parent');
        $this->addSql('DROP INDEX idx_category_parent ON category');
        $this->addSql('ALTER TABLE category DROP parentId');
    }
}
