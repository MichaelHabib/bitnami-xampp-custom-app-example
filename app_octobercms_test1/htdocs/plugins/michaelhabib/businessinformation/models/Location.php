<?php namespace MichaelHabib\BusinessInformation\Models;

use Model;

/**
 * Model
 */
class Location extends Model
{
    use \October\Rain\Database\Traits\Validation;
    
    use \October\Rain\Database\Traits\SoftDelete;

    protected $dates = ['deleted_at'];

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    /**
     * @var string The database table used by the model.
     */
    public $table = 'michaelhabib_businessinformation_location';
    public $jsonable = [
      'gallery3'  
    ];
    public  $attachOne = [
//      'image'  => 'System\Models\File',
       'image2'  => 'System\Models\File',
    ];
    
    public $attachMany = [
         'gallery2' => 'System\Models\File',
    ];
    
    public $belongsToMany = [
//        'gallery' => [
//            'System\Models\File',
//            'table' => 'michaelhabib_businessinformation_location_image_for_gallery'
//         ]
    ];
}
