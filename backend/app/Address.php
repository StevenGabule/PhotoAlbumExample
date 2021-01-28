<?php

namespace App;

use Barryvdh\LaravelIdeHelper\Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Address
 *
 * @property int $id
 * @property string $street
 * @property string $suite
 * @property string $city
 * @property string $zipcode
 * @property string $geo_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Address newModelQuery()
 * @method static Builder|Address newQuery()
 * @method static Builder|Address query()
 * @method static Builder|Address whereCity($value)
 * @method static Builder|Address whereCreatedAt($value)
 * @method static Builder|Address whereGeoId($value)
 * @method static Builder|Address whereId($value)
 * @method static Builder|Address whereStreet($value)
 * @method static Builder|Address whereSuite($value)
 * @method static Builder|Address whereUpdatedAt($value)
 * @method static Builder|Address whereZipcode($value)
 * @mixin Eloquent
 * @property int $user_id
 * @property-read \App\Geolocation $geolocation
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Address whereUserId($value)
 */
class Address extends Model
{
    protected $guarded = [];

    public function geolocation()
    {
        return $this->belongsTo(Geolocation::class, 'geo_id');
    }
}
