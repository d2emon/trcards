<?php
namespace d2emon\trcards\helpers;

use d2emon\trcards\models\Unitag;

class UnitagPath 
{
    public static function forModel($model)
    {
	$path = [];
	foreach($model->supTags as $suptag) {
	    $path[] = [
	        'label' => $suptag->name,
		'url'   => ['/site/unitag/view', 'id' => $suptag->id],
	    ];
	}
	$path[] = $model->name;

	return $path;        
    }	

    public static function forId($id)
    {
	return self::forModel(Unitag::findOne($id));
    }
}
