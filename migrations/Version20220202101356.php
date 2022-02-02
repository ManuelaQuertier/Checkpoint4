<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220202101356 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE multiplications_table (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE multiplications_table_operation (multiplications_table_id INT NOT NULL, operation_id INT NOT NULL, INDEX IDX_5A2F4D57F742377E (multiplications_table_id), INDEX IDX_5A2F4D5744AC3583 (operation_id), PRIMARY KEY(multiplications_table_id, operation_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE operation (id INT AUTO_INCREMENT NOT NULL, result_id INT NOT NULL, operation VARCHAR(255) NOT NULL, INDEX IDX_1981A66D7A7B643 (result_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE result (id INT AUTO_INCREMENT NOT NULL, result INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE multiplications_table_operation ADD CONSTRAINT FK_5A2F4D57F742377E FOREIGN KEY (multiplications_table_id) REFERENCES multiplications_table (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE multiplications_table_operation ADD CONSTRAINT FK_5A2F4D5744AC3583 FOREIGN KEY (operation_id) REFERENCES operation (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE operation ADD CONSTRAINT FK_1981A66D7A7B643 FOREIGN KEY (result_id) REFERENCES result (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE multiplications_table_operation DROP FOREIGN KEY FK_5A2F4D57F742377E');
        $this->addSql('ALTER TABLE multiplications_table_operation DROP FOREIGN KEY FK_5A2F4D5744AC3583');
        $this->addSql('ALTER TABLE operation DROP FOREIGN KEY FK_1981A66D7A7B643');
        $this->addSql('DROP TABLE multiplications_table');
        $this->addSql('DROP TABLE multiplications_table_operation');
        $this->addSql('DROP TABLE operation');
        $this->addSql('DROP TABLE result');
    }
}
