<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 19 Nov 2019 14:34:12 +0000.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class User
 * 
 * @property int $id
 * @property string $uuid
 * @property int $roles_id
 * @property string $firstname
 * @property string $name
 * @property string $telephone
 * @property string $email
 * @property boolean $fichier
 * @property string $matricule
 * @property \Carbon\Carbon $email_verified_at
 * @property string $password
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Role $role
 * @property \Illuminate\Database\Eloquent\Collection $administrateurs
 * @property \Illuminate\Database\Eloquent\Collection $beneficiaires
 * @property \Illuminate\Database\Eloquent\Collection $gestionnaires
 *
 * @package App
 * 
 */
class User extends  Authenticatable

{
	use \Illuminate\Database\Eloquent\SoftDeletes;
	use \App\Helpers\UuidForKey;

	protected $casts = [
		'roles_id' => 'int',
		'fichier' => 'boolean'
	];

	protected $dates = [
		'email_verified_at'
	];

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'uuid',
		'roles_id',
		'firstname',
		'name',
		'telephone',
		'email',
		'fichier',
		'matricule',
		'email_verified_at',
		'password'
	];

	public function role()
	{
		return $this->belongsTo(\App\Role::class, 'roles_id');
	}

	public function administrateur()
	{
		return $this->hasone(\App\Administrateur::class, 'users_id');
	}

	public function beneficiaire()
	{
		return $this->hasone(\App\Beneficiaire::class, 'users_id');
	}

	public function gestionnaire()
	{
		return $this->hasone(\App\Gestionnaire::class, 'users_id');
	}
}
