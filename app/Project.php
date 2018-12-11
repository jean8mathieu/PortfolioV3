<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use SoftDeletes;

    /**
     * @var string table name
     */
    protected $table = "projects";

    /**
     * @var array fillable column
     */
    protected $fillable = ['user_id', 'title', 'short_description', 'description', 'image-large', 'image-small', 'github'];

    /**
     * @var array hidden column
     */
    protected $hidden = ['deleted_at'];
}
