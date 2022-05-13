<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220513142230 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE interview_artist (interview_id INT NOT NULL, artist_id INT NOT NULL, INDEX IDX_61A09AF055D69D95 (interview_id), INDEX IDX_61A09AF0B7970CF8 (artist_id), PRIMARY KEY(interview_id, artist_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE interview_place (interview_id INT NOT NULL, place_id INT NOT NULL, INDEX IDX_3D9FF15255D69D95 (interview_id), INDEX IDX_3D9FF152DA6A219 (place_id), PRIMARY KEY(interview_id, place_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE interview_artist ADD CONSTRAINT FK_61A09AF055D69D95 FOREIGN KEY (interview_id) REFERENCES interview (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE interview_artist ADD CONSTRAINT FK_61A09AF0B7970CF8 FOREIGN KEY (artist_id) REFERENCES artist (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE interview_place ADD CONSTRAINT FK_3D9FF15255D69D95 FOREIGN KEY (interview_id) REFERENCES interview (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE interview_place ADD CONSTRAINT FK_3D9FF152DA6A219 FOREIGN KEY (place_id) REFERENCES place (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE interview_artist');
        $this->addSql('DROP TABLE interview_place');
    }
}
