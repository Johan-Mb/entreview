<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220513131036 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE artist_place (artist_id INT NOT NULL, place_id INT NOT NULL, INDEX IDX_1411639EB7970CF8 (artist_id), INDEX IDX_1411639EDA6A219 (place_id), PRIMARY KEY(artist_id, place_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE request_artist (request_id INT NOT NULL, artist_id INT NOT NULL, INDEX IDX_4A00557C427EB8A5 (request_id), INDEX IDX_4A00557CB7970CF8 (artist_id), PRIMARY KEY(request_id, artist_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE request_place (request_id INT NOT NULL, place_id INT NOT NULL, INDEX IDX_290AEFE8427EB8A5 (request_id), INDEX IDX_290AEFE8DA6A219 (place_id), PRIMARY KEY(request_id, place_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE artist_place ADD CONSTRAINT FK_1411639EB7970CF8 FOREIGN KEY (artist_id) REFERENCES artist (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE artist_place ADD CONSTRAINT FK_1411639EDA6A219 FOREIGN KEY (place_id) REFERENCES place (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE request_artist ADD CONSTRAINT FK_4A00557C427EB8A5 FOREIGN KEY (request_id) REFERENCES request (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE request_artist ADD CONSTRAINT FK_4A00557CB7970CF8 FOREIGN KEY (artist_id) REFERENCES artist (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE request_place ADD CONSTRAINT FK_290AEFE8427EB8A5 FOREIGN KEY (request_id) REFERENCES request (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE request_place ADD CONSTRAINT FK_290AEFE8DA6A219 FOREIGN KEY (place_id) REFERENCES place (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE artist ADD event_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE artist ADD CONSTRAINT FK_159968771F7E88B FOREIGN KEY (event_id) REFERENCES event (id)');
        $this->addSql('CREATE INDEX IDX_159968771F7E88B ON artist (event_id)');
        $this->addSql('ALTER TABLE request ADD media_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE request ADD CONSTRAINT FK_3B978F9FEA9FDD75 FOREIGN KEY (media_id) REFERENCES media (id)');
        $this->addSql('CREATE INDEX IDX_3B978F9FEA9FDD75 ON request (media_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE artist_place');
        $this->addSql('DROP TABLE request_artist');
        $this->addSql('DROP TABLE request_place');
        $this->addSql('ALTER TABLE artist DROP FOREIGN KEY FK_159968771F7E88B');
        $this->addSql('DROP INDEX IDX_159968771F7E88B ON artist');
        $this->addSql('ALTER TABLE artist DROP event_id');
        $this->addSql('ALTER TABLE request DROP FOREIGN KEY FK_3B978F9FEA9FDD75');
        $this->addSql('DROP INDEX IDX_3B978F9FEA9FDD75 ON request');
        $this->addSql('ALTER TABLE request DROP media_id');
    }
}
