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
        $this->createTable('admin', [
            'id' => $this->primaryKey(),
            'username' => $this->string(225),
            'auth_key' => $this->string(225),

        ]);
    }

    /**
     * @inheritdoc
     */
    public function safeDown() {
        echo "m171211_172629_mobile_model cannot be reverted.\n";

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
