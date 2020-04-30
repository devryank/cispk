<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_user' => [
				'type' => 'INT',
				'constraint' => 11,
				'auto_increment' => TRUE
			],
			'full_name' => [
				'type' => 'VARCHAR',
				'constraint' => '100',
			],
			'username' => [
				'type' => 'VARCHAR',
				'constraint' => '50',
			],
			'password' => [
				'type' => 'VARCHAR',
				'constraint' => '255'
			]
		]);
		$this->forge->addKey('id_user', TRUE);
		$this->forge->createTable('users');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//
	}
}
