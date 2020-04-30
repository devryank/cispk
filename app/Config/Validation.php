<?php namespace Config;

class Validation
{
	//--------------------------------------------------------------------
	// Setup
	//--------------------------------------------------------------------

	/**
	 * Stores the classes that contain the
	 * rules that are available.
	 *
	 * @var array
	 */
	public $ruleSets = [
		\CodeIgniter\Validation\Rules::class,
		\CodeIgniter\Validation\FormatRules::class,
		\CodeIgniter\Validation\FileRules::class,
		\CodeIgniter\Validation\CreditCardRules::class,
	];

	/**
	 * Specifies the views that are used to display the
	 * errors.
	 *
	 * @var array
	 */
	public $templates = [
		'list'   => 'CodeIgniter\Validation\Views\list',
		'single' => 'CodeIgniter\Validation\Views\single',
	];

	//--------------------------------------------------------------------
	// Rules
	//--------------------------------------------------------------------

	// auth
	public $register = [
		'full_name' => 'required|string|min_length[3]|max_length[100]',
		'username' => 'required|min_length[3]|max_length[100]|is_unique[users.username]',
		'password' => 'required|min_length[3]',
		'conf_password' => 'required|min_length[3]|matches[password]',
	];
	public $register_errors = [
		'full_name' => [
			'required' => 'wajib diisi',
			'string' => 'hanya dapat diisi karakter',
			'min_length' => 'minimal diisi 3 karakter',
			'max_length' => 'minimal diisi 100 karakter',
		],
		'username' => [
			'required' => 'wajib diisi',
			'min_length' => 'minimal diisi 3 karakter',
			'max_length' => 'minimal diisi 100 karakter',
			'is_unique' => 'Username sudah digunakan pengguna lain',
		],
		'password' => [
			'required' => 'wajib diisi',
			'min_length' => 'minimal diisi 3 karakter',
		],
		'conf_password' => [
			'required' => 'wajib diisi',
			'min_length' => 'minimal diisi 3 karakter',
			'matches' => 'Password yang diketik tidak sama',
		]
	];

	public $login = [
		'username' => 'required|min_length[3]|max_length[100]',
		'password' => 'required|min_length[3]'
	];
	public $login_errors = [
		'username' => [
			'required' => 'wajib diisi',
			'min_length' => 'minimal diisi 3 karakter',
			'max_length' => 'minimal diisi 100 karakter',
		],
		'password' => [
			'required' => 'Kolom password wajib diisi',
			'min_length' => 'Kolom password minimal diisi 3 karakter',
		],
	];

	// dashboard
	// kasus

	public $kasus = [
		'nama_kasus' => 'required|min_length[3]|max_length[100]|is_unique[kasus.nama_kasus]',
	];
	public $kasus_errors = [
		'nama_kasus' => [
			'required' => 'wajib diisi',
			'min_length' => 'minimal diisi 3 karakter',
			'max_length' => 'minimal diisi 100 karakter',
			'is_unique' => 'studi kasus sudah ada'
		]
	];

	public $kriteria = [
		'nama_kriteria' => 'required|min_length[3]|max_length[50]',
		'tipe' => 'required',
		'bobot' => 'required|decimal',
	];
	public $kriteria_errors = [
		'nama_kriteria' => [
			'required' => 'wajib diisi',
			'min_length' => 'minimal diisi 3 karakter',
			'max_length' => 'minimal diisi 50 karakter',
		],
		'tipe' => [
			'required' => 'wajib diisi',
		],
		'bobot' => [
			'required' => 'wajib diisi',
			'decimal' => 'hanya dapat diisi angka desimal',
		],
	];

	public $alternatif = [
		'nama_alternatif' => 'required',
	];
	public $alternatif_errors = [
		'nama_alternatif' => [
			'required' => 'wajib diisi'
		]
	];

	public $tambah_nilai = [
		'nilai' => 'required',
		'id_kriteria' => 'required'
	];
	public $tambah_nilai_errors = [
		'nilai' => [
			'required' => 'wajib diisi'
		],
		'id_kriteria' => [
			'required' => 'wajib diisi'
		]
	];

	public $edit_nilai = [
		'nilai' => 'required'
	];
	public $edit_nilai_errors = [
		'nilai' => [
			'required' => 'wajib diisi'
		],
	];

	// profile
	public $profile = [
		'full_name' => 'required|min_length[3]|max_length[100]',
	];
	public $profile_errors = [
		'full_name' => [
			'required' => 'wajib diisi',
			'min_length' => 'minimal diisi 3 karakter',
			'max_length' => 'minimal diisi 100 karakter',
		],
	];

}
