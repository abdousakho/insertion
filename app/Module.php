<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 19 Nov 2019 14:34:12 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Module
 * 
 * @property int $id
 * @property string $uuid
 * @property string $intitule
 * @property \Carbon\Carbon $anne
 * @property int $domaines_id
 * @property int $niveaus_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Domaine $domaine
 * @property \App\Niveau $niveau
 *
 * @package App
 */
class Module extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $casts = [
		'domaines_id' => 'int',
		'niveaus_id' => 'int'
	];

	protected $dates = [
		'anne'
	];

	protected $fillable = [
		'uuid',
		'intitule',
		'anne',
		'domaines_id',
		'niveaus_id'
	];

	public function domaine()
	{
		return $this->belongsTo(\App\Domaine::class, 'domaines_id');
	}

	public function niveau()
	{
		return $this->belongsTo(\App\Niveau::class, 'niveaus_id');
	}
}
