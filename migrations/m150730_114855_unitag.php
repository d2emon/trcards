<?php

use yii\db\Schema;
use yii\db\Migration;

class m150730_114855_unitag extends Migration
{
    public function safeUp()
    {
	$this->createTable("{{%tag_group}}", [
	    "id"              => "pk",
	    "name"            => "string",
	    "description"     => "text",
	]);

	$this->createTable("{{%unitag}}", [
	    "id"              => "pk",
	    "tag_group_id"    => "integer",
	    "name"            => "string",
	    "description"     => "text",
            "parent_id"       => "integer",
	]);

	$this->addForeignKey( "unitag_tag_group_id", "{{%unitag}}", "tag_group_id", "{{%tag_group}}", "id" );
    }

    public function safeDown()
    {
	$this->dropTable("{{%unitag}}");
	$this->dropTable("{{%tag_group}}");
	return true;
    }
}
