<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Kriteria extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_kriteria' => [
				'type' => 'SMALLINT',
				'constraint' => '6',
				'auto_increment' => TRUE
			],
			'id_kasus' => [
				'type' => 'SMALLINT',
				'constraint' => '6',
			],
			'nama_kriteria' => [
				'type' => 'VARCHAR',
				'constraint' => '50',
			],
			'slug' => [
				'type' => 'VARCHAR',
				'constraint' => '255',
			],
			'tipe' => [
				'type' => 'ENUM("benefit", "cost")',
				'default' => 'benefit'
			],	
			'bobot' => [
				'type' => 'double',
			],
		]);
		$this->forge->addKey('id_kriteria', TRUE);
		$this->forge->addKey('id_kasus');
		$this->forge->addForeignKey('id_kasus', 'kasus', 'id_kasus');
		$this->forge->createTable('kriteria');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//
	}
}
