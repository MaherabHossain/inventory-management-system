<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class Group extends Model
{
    use HasFactory;
    protected $fillable =  ['tittle'];


    public static function findGroupTittle(){

    	$arr = [];

    	$groups = Group::all();

    	foreach ($groups as $group) {
    		$arr[$group->id] = $group->tittle;
    	}
    	return $arr;

    }

    public function users(){

        return $this->hasMany(User::class);
    }


}
