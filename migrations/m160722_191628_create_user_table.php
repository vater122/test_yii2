<?php

use yii\db\Migration;

/**
 * Handles the creation for table `user`.
 */
class m160722_191628_create_user_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('user', [
            'id' => $this->primaryKey(),
            'email'=>$this->string(100),
            'password'=>$this->string(255)
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('user');
    }
}
