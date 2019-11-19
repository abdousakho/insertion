<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 19 Nov 2019 14:34:12 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Situationprofessionel
 * 
 * @property int $id
 * @property string $uuid
 * @property string $nom
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $beneficiaires
 *
 * @package App
 */
class Situationprofessionel extends Eloquent
{
	use \Illuminate\Database\Eloquent\SoftDeletes;

	protected $fillable = [
		'uuid',
		'nom'
	];

	public function beneficiaires()
	{
		return $this->hasMany(\App\Beneficiaire::class, 'situation professionel_id');
	}
}
