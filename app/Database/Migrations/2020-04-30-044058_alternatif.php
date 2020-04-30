<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Alternatif extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_alternatif' => [
				'type' => 'SMALLINT',
				'constraint' => '6',
				'auto_increment' => TRUE
			],
			'id_kasus' => [
				'type' => 'SMALLINT',
				'constraint' => '6'
			],
			'nama_alternatif' => [
				'type' => 'VARCHAR',
				'constraint' => '100'
			],
			'slug' => [
				'type' => 'VARCHAR',
				'constraint' => '255'
			],
		]);
		$this->forge->addKey('id_alternatif', TRUE);
		$this->forge->addKey('id_kasus');
		$this->forge->addForeignKey('id_kasus', 'kasus', 'id_kasus');
		$this->forge->createTable('alternatif');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//
	}
}
