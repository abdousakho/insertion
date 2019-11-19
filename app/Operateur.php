<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 19 Nov 2019 14:34:12 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Operateur
 * 
 * @property int $id
 * @property string $uuid
 * @property string $nom
 * @property \Carbon\Carbon $anne
 * @property int $domaines_id
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Domaine $domaine
 * @property \Illuminate\Database\Eloquent\Collection $beneficiaires
 *
 * @package App
 */
class Operateur extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $casts = [
		'domaines_id' => 'int'
	];

	protected $dates = [
		'anne'
	];

	protected $fillable = [
		'uuid',
		'nom',
		'anne',
		'domaines_id'
	];

	public function domaine()
	{
		return $this->belongsTo(\App\Domaine::class, 'domaines_id');
	}

	public function beneficiaires()
	{
		return $this->hasMany(\App\Beneficiaire::class, 'structures_id');
	}
}
