<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Kasus extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_kasus' => [
				'type' => 'SMALLINT',
				'constraint' => '6',
				'auto_increment' => TRUE
			],
			'nama_kasus' => [
				'type' => 'VARCHAR',
				'constraint' => '100'
			],
			'slug' => [
				'type' => 'VARCHAR',
				'constraint' => '255'
			],
			'id_user' => [
				'type' => 'INT',
				'constraint' => '11'
			],
		]);
		$this->forge->addKey('id_kasus', TRUE);
		$this->forge->addKey('id_user');
		$this->forge->addForeignKey('id_user', 'users', 'id_user');
		$this->forge->createTable('kasus');	
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//
	}
}
