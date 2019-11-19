<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 19 Nov 2019 14:34:12 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Beneficiaire
 * 
 * @property int $id
 * @property string $uuid
 * @property int $users_id
 * @property int $structures_id
 * @property int $situation professionel_id
 * @property int $niveau_id
 * @property \Carbon\Carbon $date_debut
 * @property \Carbon\Carbon $date_fin
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Niveau $niveau
 * @property \App\Situationprofessionel $situationprofessionel
 * @property \App\Operateur $operateur
 * @property \App\User $user
 *
 * @package App
 */
class Beneficiaire extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $casts = [
		'users_id' => 'int',
		'structures_id' => 'int',
		'situation professionel_id' => 'int',
		'niveau_id' => 'int'
	];

	protected $dates = [
		'date_debut',
		'date_fin'
	];

	protected $fillable = [
		'uuid',
		'users_id',
		'structures_id',
		'situation professionel_id',
		'niveau_id',
		'date_debut',
		'date_fin'
	];

	public function niveau()
	{
		return $this->belongsTo(\App\Niveau::class);
	}

	public function situationprofessionel()
	{
		return $this->belongsTo(\App\Situationprofessionel::class, 'situation professionel_id');
	}

	public function operateur()
	{
		return $this->belongsTo(\App\Operateur::class, 'structures_id');
	}

	public function user()
	{
		return $this->belongsTo(\App\User::class, 'users_id');
	}
}
