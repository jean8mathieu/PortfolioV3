<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use SoftDeletes;

    /**
     * @var string table name
     */
    protected $table = "articles";

    /**
     * @var array fillable column
     */
    protected $fillable = ['user_id', 'title', 'short_description', 'description', 'image-large', 'image-small'];

    /**
     * @var array hidden column
     */
    protected $hidden = ['deleted_at'];


    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

}
