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
            'lat' => setting_value('evoluted.field_type.google_map::default_latitude') ?? 53.3858833,
            'lng' => setting_value('evoluted.field_type.google_map::default_longitude') ?? -1.4736192,
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
