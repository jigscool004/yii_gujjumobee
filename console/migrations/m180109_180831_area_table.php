<?php

use yii\db\Migration;

/**
 * Class m180109_180831_area_table
 */
class m180109_180831_area_table extends Migration {
    /**
     * @inheritdoc
     */
    public function safeUp() {
        $this->createTable('area', [
            'id' => $this->primaryKey(),
            'area' => $this->string(225),
            'city_id' => $this->integer(11),
            'zipcode' => $this->integer(8),
            'status' => $this->integer(1)->defaultValue(1),
            'created_on' => $this->dateTime(),
            'created_by' => $this->integer(),
            'updated_on' => $this->dateTime(),
            'updated_by' => $this->integer()
        ]);
    }
    /**
     * @inheritdoc
     */
    public function safeDown() {
        echo "m180109_180831_area_table cannot be reverted.\n";
        $this->dropTable('area');
        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180109_180831_area_table cannot be reverted.\n";

        return false;
    }
    */
}
