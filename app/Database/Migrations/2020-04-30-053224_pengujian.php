<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pengujian extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_bahan_uji' => [
				'type' => 'SMALLINT',
				'constraint' => '6',
				'auto_increment' => TRUE
			],
			'id_kriteria' => [
				'type' => 'SMALLINT',
				'constraint' => '6',
			],
			'id_alternatif' => [
				'type' => 'SMALLINT',
				'constraint' => '6',
			],
			'nilai' => [
				'type' => 'DOUBLE',
			],
		]);
		$this->forge->addKey('id_bahan_uji', TRUE);
		$this->forge->addKey('id_kriteria');
		$this->forge->addKey('id_alternatif');
		$this->forge->addForeignKey('id_kriteria', 'kriteria', 'id_kriteria');
		$this->forge->addForeignKey('id_alternatif', 'alternatif', 'id_alternatif');
		$this->forge->createTable('pengujian');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//
	}
}
