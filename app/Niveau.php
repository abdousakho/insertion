<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 19 Nov 2019 14:34:12 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Niveau
 * 
 * @property int $id
 * @property string $uuid
 * @property string $domainesActivite
 * @property string $name
 * @property \Carbon\Carbon $annee
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $beneficiaires
 * @property \Illuminate\Database\Eloquent\Collection $domaines
 * @property \Illuminate\Database\Eloquent\Collection $modules
 *
 * @package App
 */
class Niveau extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	protected $table = 'niveaus';

	protected $dates = [
		'annee'
	];

	protected $fillable = [
		'uuid',
		'domainesActivite',
		'name',
		'annee'
	];

	public function beneficiaires()
	{
		return $this->hasMany(\App\Beneficiaire::class);
	}

	public function domaines()
	{
		return $this->hasMany(\App\Domaine::class);
	}

	public function modules()
	{
		return $this->hasMany(\App\Module::class, 'niveaus_id');
	}
}
