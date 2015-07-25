<?php

use yii\db\Schema;
use yii\db\Migration;

class m150724_163942_cards extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%status}}', [
            'id' => Schema::TYPE_PK,
            'statusName' => Schema::TYPE_STRING . '(20) NOT NULL COMMENT "Статус карты"',
        ], $tableOptions);

        $this->createTable('{{%series}}', [
            'id' => Schema::TYPE_PK,
            'seriesName' => Schema::TYPE_STRING . '(5) NOT NULL COMMENT "Серия карты"',
        ], $tableOptions);

        $this->createTable('{{%card}}', [
            'id' => Schema::TYPE_PK,
            'seriesId' => Schema::TYPE_INTEGER . '  COMMENT "Серия"',
            'number' => Schema::TYPE_INTEGER . ' NOT NULL COMMENT "Номер"',
            'issueDateTime' => Schema::TYPE_DATETIME . ' NOT NULL  COMMENT "Дата выпуска"',
            'endingDateTime' => Schema::TYPE_DATETIME . ' NOT NULL  COMMENT "Дата окончания"',
            'lastDateOfUse' => Schema::TYPE_DATETIME . ' NOT NULL  COMMENT "Дата посл. исп."',
            'currentSumm' => Schema::TYPE_INTEGER . ' NOT NULL  COMMENT "Остаток"',
            'statusId' => Schema::TYPE_INTEGER . '  COMMENT "Статус"',
        ], $tableOptions);

        // indexes and foreign keys
        $this->createIndex('unique_card_number', '{{%card}}', 'number', true);

        $this->createIndex('FK_card_status', '{{%card}}', 'statusId', false);
        $this->addForeignKey(
            'FK_card_status', '{{%card}}', 'statusId', '{{%status}}', 'id', 'SET NULL', 'CASCADE'
        );

        $this->createIndex('FK_card_series', '{{%card}}', 'seriesId', false);
        $this->addForeignKey(
            'FK_card_series', '{{%card}}', 'seriesId', '{{%series}}', 'id', 'SET NULL', 'CASCADE'
        );

        //inserts
        $this->insert('{{%status}}', [
            'statusName' => 'Не активирована'
        ]);

        $this->insert('{{%status}}', [
            'statusName' => 'Активирована'
        ]);

        $this->insert('{{%status}}', [
            'statusName' => 'Просрочена'
        ]);

        $this->insert('{{%series}}', [
            'seriesName' => '00001'
        ]);

        $this->insert('{{%series}}', [
            'seriesName' => '11111'
        ]);

        $this->insert('{{%series}}', [
            'seriesName' => '22222'
        ]);

        $this->insert('{{%series}}', [
            'seriesName' => '33333'
        ]);

        $this->insert('{{%series}}', [
            'seriesName' => '44444'
        ]);

        $this->insert('{{%series}}', [
            'seriesName' => '55555'
        ]);

        $currentDate = date('Y-m-d H:i:s');

        $plusThreeMonthDate = date("Y-m-d  H:i:s",  strtotime(date("Y-m-d  H:i:s", strtotime($currentDate)) . " +3 month"));
        $plusOneYearDate = date("Y-m-d  H:i:s",  strtotime(date("Y-m-d  H:i:s", strtotime($currentDate)) . " +1 year"));

        $minusOneMonthDate = date("Y-m-d  H:i:s",  strtotime(date("Y-m-d  H:i:s", strtotime($currentDate)) . " -1 month"));
        $minusTwoMonthDate = date("Y-m-d  H:i:s",  strtotime(date("Y-m-d  H:i:s", strtotime($currentDate)) . " -2 month"));
        $minusOneDayDate = date("Y-m-d  H:i:s",  strtotime(date("Y-m-d  H:i:s", strtotime($currentDate)) . " -1 day"));

        $this->insert('{{%card}}', [
            'seriesId' => 2,
            'number' => 1000,
            'issueDateTime' => $minusOneMonthDate,
            'endingDateTime' => $plusThreeMonthDate,
            'lastDateOfUse' => $minusOneDayDate,
            'currentSumm' => -300,
            'statusId' => 1
        ]);

        $this->insert('{{%card}}', [
            'seriesId' => 3,
            'number' => 1005,
            'issueDateTime' => $minusTwoMonthDate,
            'endingDateTime' => $plusOneYearDate,
            'lastDateOfUse' => $currentDate,
            'currentSumm' => 500000,
            'statusId' => 2
        ]);

        $this->insert('{{%card}}', [
            'seriesId' => 2,
            'number' => 1006,
            'issueDateTime' => $minusTwoMonthDate,
            'endingDateTime' => $minusOneMonthDate,
            'lastDateOfUse' => $minusTwoMonthDate,
            'currentSumm' => 20000,
            'statusId' => 3
        ]);
    }

    public function down()
    {
        $this->dropTable('{{%card}}');
        $this->dropTable('{{%series}}');
        $this->dropTable('{{%status}}');

        return true;
    }
}
