<?php

namespace Oceanapplications\NovaToggle;

use Laravel\Nova\Fields\Boolean;

class Toggle extends Boolean
{
    public $component = 'nova-toggle';

    public function trueLabel($label){
        return $this->withMeta([
            'true_label' => $label,
        ]);
    }

    public function falseLabel($label){
        return $this->withMeta([
            'false_label' => $label,
        ]);
    }

    public function showLabels(){
        return $this->withMeta([
            'show_true_label' => true,
            'show_false_label' => true,
        ]);
    }

    public function showOnlyTrueLabel(){
        return $this->withMeta([
            'show_true_label' => true,
            'show_false_label' => false,
        ]);
    }

    public function showOnlyFalseLabel(){
        return $this->withMeta([
            'show_true_label' => false,
            'show_false_label' => true,
        ]);
    }

    public function hideLabelOnIndex(){
        return $this->withMeta([
            'hide_label_on_index' => true,
        ]);
    }

    public function editableIndex(){
        return $this->withMeta([
            'editable_index' => true,
        ]);
    }

    public function width($width){
        return $this->withMeta([
            'width' => $width,
            'height' => round($width/(60/26),0),
        ]);
    }

    public function height($height){
        return $this->withMeta([
            'height' => $height,
        ]);
    }

    public function trueColor($colour){
        return $this->withMeta([
            'true_color' => $colour,
        ]);
    }

    public function falseColor($colour){
        return $this->withMeta([
            'false_color' => $colour,
        ]);
    }

    //TODO
    // public function textColor($colour){
    //     return $this->withMeta([
    //         'text_color' => $colour,
    //     ]);
    // }

    public function speed($ms){
        return $this->withMeta([
            'speed' => $ms,
        ]);
    }

    /**
     * @param string $viaResource resource type
     * @param string $viaResourceId resource id
     * @return void
     */
    public function inPivot($viaResource, $viaResourceId) {
        if ($viaResource !== null && $viaResourceId !== null) {
            return $this->withMeta([
                'pivot' => true,
                'viaResource' => $viaResource,
                'viaResourceId' => $viaResourceId,
            ]);
        }
    }

}
