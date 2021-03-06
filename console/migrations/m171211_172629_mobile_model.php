<?php

use yii\db\Migration;

/**
 * Class m171211_172629_mobile_model
 */
class m171211_172629_mobile_model extends Migration {
    /**
     * @inheritdoc
     */
    public function safeUp() {
        $this->createTable('mobile_model', [
            'id' => $this->primaryKey(),
            'category_id' => $this->integer(11),
            'name' => $this->string(225),
            'status' => $this->integer('1')->defaultValue(1),
            'created_by' => $this->integer(),
            'created_on' => $this->dateTime(),
            'updated_on' => $this->dateTime(),
            'update_by' => $this->integer()

        ]);
    }

    /**
     * @inheritdoc
     */
    public function safeDown() {
        echo "m171211_172629_mobile_model cannot be reverted.\n";
        $this->dropTable('mobile_model');
        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171211_172629_mobile_model cannot be reverted.\n";

        return false;
    }
    */
}
