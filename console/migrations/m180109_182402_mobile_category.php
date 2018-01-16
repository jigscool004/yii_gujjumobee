<?php

use yii\db\Migration;

/**
 * Class m180109_182402_mobile_category
 */
class m180109_182402_mobile_category extends Migration {
    /**
     * @inheritdoc
     */
    public function safeUp() {
        $this->createTable('mobile_category', [
            'id' => $this->primaryKey(),
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
        echo "m180109_182402_mobile_category cannot be reverted.\n";
        $this->dropTable('mobile_category');
        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180109_182402_mobile_category cannot be reverted.\n";

        return false;
    }
    */
}
