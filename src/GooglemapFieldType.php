<?php namespace Evoluted\GooglemapFieldType;

use Anomaly\Streams\Platform\Addon\FieldType\FieldType;

class GooglemapFieldType extends FieldType
{
    protected $columnType = 'text';

    protected $inputView = 'evoluted.field_type.googlemap::input';
}
