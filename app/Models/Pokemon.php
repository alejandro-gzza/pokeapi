<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Pokemon extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable
     *
     * @var array
     */
    protected $fillable = [
        'pokemon_id',
        'name',
        'front_img',
        'back_img',
        'weight',
        'height',
        'type',
        'hp',
        'attack',
        'defense'
    ];

    /*-------------------------------------------------------------------------------------
    Validation
    ------------------------------------------------------------------------------------- */
    /**
     * Get validation rules
     * @param String $scenario = 'create'
     * @param Array $extra = []
     * @return array
     */
    public static function getValidationRules($scenario = 'create', $extra = [])
    {
        $RequiredInteger = 'required|integer';
        $rules = array(
            'pokemon_id' => 'bail|required|unique:pokemon|integer',
            'name' => 'required|unique:pokemon|max:50|string',
            'front_img' => 'required|unique:pokemon|url',
            'back_img' => 'required|unique:pokemon|url',
            'weight' => $RequiredInteger,
            'height' => $RequiredInteger,
            'type' => 'required|max:50|string',
            'hp' => $RequiredInteger,
            'attack' => $RequiredInteger,
            'defense' => $RequiredInteger
        );

        switch($scenario){
            case 'edit':
                $rules['pokemon_id'] = 'bail|required|unique:pokemon,pokemon_id,'.$extra['pokemon_id'].'|integer';
                $rules['name'] = 'required|unique:pokemon,name,'.$extra['pokemon_id'].'|max:50|string';
                $rules['front_img'] = 'required|unique:pokemon,front_img,'.$extra['pokemon_id'].'|url';
                $rules['back_img'] = 'required|unique:pokemon,back_img,'.$extra['pokemon_id'].'|url';
            break;

            case 'api':
                $rules = ['pokemon_id' => 'bail|required|unique:pokemon|integer|min:1|max:898'];
            break;

            default:
            break;
        }
        return $rules;
    }

    /**
     * Validate params with validation rules
     *
     * @param array $params
     * @param String $scenario = 'create'
     * @param Array $extra = []
     * @return Validator
     */
    public static function validate($params, $scenario = 'create', $extra = []){
        return Validator::make($params, self::getValidationRules($scenario, $extra));
    }

    /*-------------------------------------------------------------------------------------
    Accessors
    ------------------------------------------------------------------------------------- */


    /*-------------------------------------------------------------------------------------
    Mutators
    ------------------------------------------------------------------------------------- */


    /*-------------------------------------------------------------------------------------
    Public functions
    ------------------------------------------------------------------------------------- */


    /*-------------------------------------------------------------------------------------
    Relationships
    ------------------------------------------------------------------------------------- */
    public function users(){
        return $this->belongsToMany('App\Models\User', 'user_pokemon')->withTimestamps();
    }






}

