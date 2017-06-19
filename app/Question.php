<?php

namespace App;

use Grimzy\LaravelMysqlSpatial\Eloquent\SpatialTrait;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use SpatialTrait;

    protected $table = 'questionaire';
    protected $spatialFields = [
        'location'
    ];

}
