<?php namespace Evoluted\GooglemapFieldType;

use Anomaly\Streams\Platform\Addon\FieldType\FieldTypePresenter;

class GoogleMapFieldTypePresenter extends FieldTypePresenter
{
    /**
     * The initial zoom level
     *
     * @var integer
     */
    protected $zoom = 16;

    /**
     * Classes to add to the map div
     *
     * @var array
     */
    protected $classes = [];

    /**
     * Whether the zoom control should be shown
     *
     * @var boolean
     */
    protected $controls = [
        'zoom' => false,
        'mapType' => false,
        'scale' => false,
        'streetView' => false,
        'rotate' => false,
        'fullscreen' => false
    ];

    /**
     * Renders a google map
     *
     * @return string The HTML render
     */
    public function render()
    {
        return view('evoluted.field_type.google_map::map', [
            'center' => $this->object->getValueOrDefault(),
            'zoom' => $this->zoom,
            'classes' => $this->classes,
            'controls' => json_encode($this->controls),
        ])->render();
    }

    /**
     * Sets the initial zoom level
     *
     * @param integer $zoom
     * @return this
     */
    public function setZoom(int $zoom)
    {
        $this->zoom = $zoom;

        return $this;
    }

    /**
     * Adds a class to the map element. Can be called multiple times
     *
     * @param string $class
     * @return this
     */
    public function addClass(string $class)
    {
        $this->classes[] = $class;

        return $this;
    }

    /**
     * Enabled the controls named in the array
     *
     * @param array $controls Possible values are "zoom", "mapType", "scale", "streetView", "rotate", "fullscreen"
     * @return this
     */
    public function enableControls(array $controls)
    {
        foreach ($controls as $controlName) {
            $this->controls[$controlName] = true;
        }

        return $this;
    }
}
