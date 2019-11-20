<?php
use App\Helpers\SnNameGenerator as SnmG;
use Illuminate\Support\Str;

/* @var $factory \Illuminate\Database\Eloquent\Factory */

// use Faker\Generator as Faker;

/* $factory->define(App\Administrateur::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'users_id' => function () {
            return factory(App\User::class)->create()->id;
        },
    ];
}); */
$factory->define(App\Administrateur::class, function (Faker\Generator $faker) {
    $role_id=App\Role::where('name','Administrateur')->first()->id;
    return [
        'users_id' => function () use($role_id) {
             return factory(App\User::class)->create(["roles_id"=>$role_id])->id;
        },
    ];
});
/* @var $factory \Illuminate\Database\Eloquent\Factory */

// use Faker\Generator as Faker;

$factory->define(App\Beneficiaire::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'users_id' => function () {
            return factory(App\User::class)->create()->id;
        },
        'structures_id' => function () {
            return factory(App\Operateur::class)->create()->id;
        },
        'situation professionel_id' => function () {
            return factory(App\Situationprofessionel::class)->create()->id;
        },
        'niveau_id' => function () {
            return factory(App\Niveau::class)->create()->id;
        },
        'date_debut' => $faker->dateTime(),
        'date_fin' => $faker->dateTime(),
    ];
});
/* @var $factory \Illuminate\Database\Eloquent\Factory */

// use Faker\Generator as Faker;

$factory->define(App\Domaine::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'intitule' => $faker->word,
        'anne' => $faker->dateTime(),
        'niveau_id' => function () {
            return factory(App\Niveau::class)->create()->id;
        },
    ];
});
/* @var $factory \Illuminate\Database\Eloquent\Factory */

// use Faker\Generator as Faker;

/* $factory->define(App\Gestionnaire::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'matricule' => $faker->word,
        'users_id' => function () {
            return factory(App\User::class)->create()->id;
        },
    ];
}); */

$factory->define(App\Gestionnaire::class, function (Faker\Generator $faker) {
    $role_id=App\Role::where('name','Gestionnaire')->first()->id;
    return [
        'matricule' => "GEST".$faker->word,
        'users_id' => function () use($role_id) {
             return factory(App\User::class)->create(["roles_id"=>$role_id])->id;
        },
    ];
});

/* @var $factory \Illuminate\Database\Eloquent\Factory */

// use Faker\Generator as Faker;

$factory->define(App\Module::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'intitule' => $faker->word,
        'anne' => $faker->dateTime(),
        'domaines_id' => function () {
            return factory(App\Domaine::class)->create()->id;
        },
        'niveaus_id' => function () {
            return factory(App\Niveau::class)->create()->id;
        },
    ];
});
/* @var $factory \Illuminate\Database\Eloquent\Factory */

// use Faker\Generator as Faker;

$factory->define(App\Niveau::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'domainesActivite' => $faker->word,
        'name' => $faker->name,
        'annee' => $faker->dateTime(),
    ];
});
/* @var $factory \Illuminate\Database\Eloquent\Factory */

// use Faker\Generator as Faker;

$factory->define(App\Operateur::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'nom' => $faker->word,
        'anne' => $faker->dateTime(),
        'domaines_id' => function () {
            return factory(App\Domaine::class)->create()->id;
        },
    ];
});
/* @var $factory \Illuminate\Database\Eloquent\Factory */

// use Faker\Generator as Faker;

$factory->define(App\Role::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'name' => $faker->name,
    ];
});
/* @var $factory \Illuminate\Database\Eloquent\Factory */

// use Faker\Generator as Faker;

$factory->define(App\Situationprofessionel::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'nom' => $faker->word,
    ];
});
/* @var $factory \Illuminate\Database\Eloquent\Factory */

// use Faker\Generator as Faker;

/* $factory->define(App\User::class, function (Faker $faker) {
    return [
        'uuid' => $faker->uuid,
        'roles_id' => function () {
            return factory(App\Role::class)->create()->id;
        },
        'firstname' => $faker->firstName,
        'name' => $faker->name,
        'telephone' => $faker->word,
        'email' => $faker->safeEmail,
        'fichier' => $faker->word,
        'matricule' => $faker->word,
        'email_verified_at' => $faker->dateTime(),
        'password' => bcrypt($faker->password),
    ];
});
 */

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'firstname' => SnmG::getFirstName(),
        'name' => SnmG::getName(),
        'telephone' => $faker->phoneNumber,
        'email' => Str::random(5).".".$faker->safeEmail,
        'fichier' => $faker->word,
        'matricule' => "MAT".$faker->word,
        'email_verified_at' => $faker->dateTimeBetween(),
        'password' => bcrypt('secret'),

    ];
});