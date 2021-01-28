<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Geolocation
 *
 * @property int $id
 * @property int $user_id
 * @property string $lat
 * @property string $lng
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Geolocation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Geolocation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Geolocation query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Geolocation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Geolocation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Geolocation whereLat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Geolocation whereLng($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Geolocation whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Geolocation whereUserId($value)
 * @mixin \Eloquent
 */
class Geolocation extends Model
{
    //
}
