# Google Map Field Type

A Google Maps field type to use with PyroCMS and the Streams platform.

## Usage

There's two sides to this addon. There's the CMS side allowing users to set an API key and select a location and then there's the front end for displaying the selected location on an embedded Google Map.

## Setting Your API Key
In the CMS, visit the settings module and under the field type settings you will find the option to set your API key. 

**This field type makes use of the Javascript and Places APIs so these need to be enabled for your api credentials. Billing must also be enabled.**

## Setting the Default Location
By default, the initial location for any new map will be the Evoluted office. This can be changed by setting the default latitude and logitude in the settings module in the CMS. 

## Adding a Map Input in the CMS
To add a map input, simply create a field with the type set to `evoluted.field_type.google_map`. There are not currently any configuration options for the CMS control. The data is stored as a JSON string with lat and lng attributes.

### Example Migration

```php
class AddMapFieldToOffice extends Migration {

    protected $fields = [
        'location' => 'evoluted.field_type.google_map'
    ];

}
```

## Rendering a Map in the Theme
To render a Google Map, call the `render()` method on the presenter. There are configuration options that can be called before render to change how the map displays. These are:

- `addClass`: Adds a class to the map container. This can be called multiple times to add multiple classes.
- `setZoom`: Sets the initial zoom on the map.
- `enableControls`: Expects an array of control names. All controls are disabled by default. Possible control names are:
  - `zoom`
  - `mapType`
  - `scale`
  - `streetView`
  - `rotation`
  - `fullscreen`

### Adding the Scripts
The map render will try to include the Javascript it requires in the `scripts.js` collection. If this collection is not used in your theme, the script will need to be added manually to a collection that is. 

The following line can be amended and added to your templates to add the required script to any collection:

```twig
{{ asset_add("scripts.js", "evoluted.field_type.google_map::js/map.js") }}
```

Alternatively the script can be included in place where the map is rendered using:

```twig
{{ asset_script("evoluted.field_type.google_map::js/map.js") }}
```

### Example Usage in Twig

_Assuming `office` is a stream entry and `location` is the field name of a Google Map type field._

```twig
{{ office.location.setZoom(15).enableControls(['zoom', 'fullscreen']).render()|raw }}
```

The above code will show the map with a marker centered on the location chosen in the CMS. The map will start at zoom level 15 and will only show the zoom and full screen controls.