<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 19 Nov 2019 14:34:12 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Domaine
 * 
 * @property int $id
 * @property string $uuid
 * @property string $intitule
 * @property \Carbon\Carbon $anne
 * @property int $niveau_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Niveau $niveau
 * @property \Illuminate\Database\Eloquent\Collection $modules
 * @property \Illuminate\Database\Eloquent\Collection $operateurs
 *
 * @package App
 */
class Domaine extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $casts = [
		'niveau_id' => 'int'
	];

	protected $dates = [
		'anne'
	];

	protected $fillable = [
		'uuid',
		'intitule',
		'anne',
		'niveau_id'
	];

	public function niveau()
	{
		return $this->belongsTo(\App\Niveau::class);
	}

	public function modules()
	{
		return $this->hasMany(\App\Module::class, 'domaines_id');
	}

	public function operateurs()
	{
		return $this->hasMany(\App\Operateur::class, 'domaines_id');
	}
}
