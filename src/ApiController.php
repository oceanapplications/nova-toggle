<?php

namespace Oceanapplications\NovaToggle;

use Illuminate\Http\Request;

class ApiController
{
    public function index(\Laravel\Nova\Http\Requests\ResourceDetailRequest $request)
    {
        $resourceClass = $request->resource();
        $modelClass = $resourceClass::$model;
        $model = $modelClass::find($request->post('resourceId'));

        if($model) {
            if ($request->viaResourceId != null && $request->viaResource != null) {
                 $related = $model->{$request->viaResource}()->find($request->viaResourceId);
                 $related->pivot->{$request->post('fieldName')} = $request->post('value');
                 $related->pivot->save();

                return [
                    'success' => true
                ];
            }

            $model->{$request->post('fieldName')} = $request->post('value');
            $model->save();

            return [
                'success' => true
            ];
        }

        return [
            'success' => false
        ];
    }
}
