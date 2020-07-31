<?php namespace Evoluted\GooglemapFieldType;

use Anomaly\Streams\Platform\Addon\FieldType\FieldTypePresenter;

class GoogleMapFieldTypePresenter extends FieldTypePresenter
{
    /**
     * Renders a google map
     */
    public function map()
    {
        return view('evoluted.field_type.google_map::map', [
            'center' => $this->object->getValueOrDefault(),
        ])->render();
    }
}
