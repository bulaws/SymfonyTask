<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180722182624 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf(
            $this->connection->getDatabasePlatform()->getName() !== 'mysql',
            'Migration can only be executed safely on \'mysql\'.'
        );

        $this->addSql("INSERT INTO page_content 
        (page_name, title, about_content, additional_info, show_additional_info) 
        VALUES ('home', 'home page', 'Lorem Ipsum - це текст-\"риба\", що використовується в друкарстві та дизайні. Lorem Ipsum є,
                фактично, стандартною \"рибою\" аж з XVI сторіччя, коли невідомий друкар взяв шрифтову гранку
                та склав на ній підбірку зразків шрифтів.', 'Kyiv 2018. (044) 000-00-00', true),
                ('main', 'main page', 'Lorem Ipsum - це текст-\"риба\", що використовується в друкарстві та дизайні. ', 'Kyiv: (044) 000-00-00', false)");


    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf(
            $this->connection->getDatabasePlatform()->getName() !== 'mysql',
            'Migration can only be executed safely on \'mysql\'.'
        );

        $this->addSql("DELETE FROM page_content WHERE page_name = 'home' OR page_name = 'main'");
    }
}
