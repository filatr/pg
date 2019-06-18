<?php
/**
 * Created by PhpStorm.
 * User: SkillUP_Student
 * Date: 27.05.2019
 * Time: 21:11
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Article extends Model
{

    protected $table = 'articles';
    protected $primaryKey = 'id';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'author', 'description'
    ];

}