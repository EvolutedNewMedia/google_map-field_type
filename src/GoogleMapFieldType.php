<?php namespace Evoluted\GoogleMapFieldType;

use Anomaly\Streams\Platform\Addon\FieldType\FieldType;

class GoogleMapFieldType extends FieldType
{
    protected $columnType = 'text';

    protected $inputView = 'evoluted.field_type.google_map::input';

    /**
     * Get the value.
     *
     * @return string
     */
    public function getDefaultValue()
    {
        return json_encode([
            'lat' => (float)setting_value('evoluted.field_type.google_map::default_latitude', 53.385144016598346),
            'lng' => (float)setting_value('evoluted.field_type.google_map::default_longitude', -1.4779945323242183),
        ]);
    }

    /**
     * Get the value.
     *
     * @return string
     */
    public function getValueOrDefault()
    {
        $value = $this->getValue();
        return !empty($value) ? $value : $this->getDefaultValue();
    }
}
