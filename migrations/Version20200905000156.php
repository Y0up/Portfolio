<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200905000156 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE photo_category (photo_id INT NOT NULL, category_id INT NOT NULL, INDEX IDX_9570064B7E9E4C8C (photo_id), INDEX IDX_9570064B12469DE2 (category_id), PRIMARY KEY(photo_id, category_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE photo_setting (photo_id INT NOT NULL, setting_id INT NOT NULL, INDEX IDX_AA94AF157E9E4C8C (photo_id), INDEX IDX_AA94AF15EE35BD72 (setting_id), PRIMARY KEY(photo_id, setting_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE photo_category ADD CONSTRAINT FK_9570064B7E9E4C8C FOREIGN KEY (photo_id) REFERENCES photo (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE photo_category ADD CONSTRAINT FK_9570064B12469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE photo_setting ADD CONSTRAINT FK_AA94AF157E9E4C8C FOREIGN KEY (photo_id) REFERENCES photo (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE photo_setting ADD CONSTRAINT FK_AA94AF15EE35BD72 FOREIGN KEY (setting_id) REFERENCES setting (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE country ADD continent_id INT NOT NULL');
        $this->addSql('ALTER TABLE country ADD CONSTRAINT FK_5373C966921F4C77 FOREIGN KEY (continent_id) REFERENCES continent (id)');
        $this->addSql('CREATE INDEX IDX_5373C966921F4C77 ON country (continent_id)');
        $this->addSql('ALTER TABLE photo ADD country_id INT NOT NULL');
        $this->addSql('ALTER TABLE photo ADD CONSTRAINT FK_14B78418F92F3E70 FOREIGN KEY (country_id) REFERENCES country (id)');
        $this->addSql('CREATE INDEX IDX_14B78418F92F3E70 ON photo (country_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE photo_setting');
        $this->addSql('DROP TABLE photo_category');
        $this->addSql('ALTER TABLE country DROP FOREIGN KEY FK_5373C966921F4C77');
        $this->addSql('DROP INDEX IDX_5373C966921F4C77 ON country');
        $this->addSql('ALTER TABLE country DROP continent_id');
        $this->addSql('ALTER TABLE photo DROP FOREIGN KEY FK_14B78418F92F3E70');
        $this->addSql('DROP INDEX IDX_14B78418F92F3E70 ON photo');
        $this->addSql('ALTER TABLE photo DROP country_id');
    }
}
