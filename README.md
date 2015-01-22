Leaflet integration into Contao CMS
===================================

[![Build Status](http://img.shields.io/travis/netzmacht/contao-leaflet-maps/master.svg?style=flat-square)](https://travis-ci.org/netzmacht/contao-leaflet-maps)
[![Version](http://img.shields.io/packagist/v/netzmacht/contao-leaflet-maps.svg?style=flat-square)](http://packagist.com/packages/netzmacht/contao-leaflet-maps)
[![License](http://img.shields.io/packagist/l/netzmacht/contao-leaflet-maps.svg?style=flat-square)](http://packagist.com/packages/netzmacht/contao-leaflet-maps)
[![Downloads](http://img.shields.io/packagist/dt/netzmacht/contao-leaflet-maps.svg?style=flat-square)](http://packagist.com/packages/netzmacht/contao-leaflet-maps)
[![Contao Community Alliance coding standard](http://img.shields.io/badge/cca-coding_standard-red.svg?style=flat-square)](https://github.com/contao-community-alliance/coding-standard)

This extension provides a backend gui for integrating [Leaflet](http://leafletjs.com/) into the Contao CMS.

It has a highly flexible and customizable design so that 3rd party extensions and custom development is really easy. 
Developing map applications in Contao with the modern Open Source Map library Leaflet made easy!
  
Features
--------

 - Define Leaflet maps with multiple layers.
 - Manage map controls
    - [Layers control](http://leafletjs.com/reference.html#control-layers)
    - [Zoom control](http://leafletjs.com/reference.html#control-zoom)
    - [Scale control]((http://leafletjs.com/reference.html#control-scale))
    - [Attribution control](http://leafletjs.com/reference.html#control-attribution)
    - [Loading control](https://github.com/ebrelsford/Leaflet.loading)
 - Manage layers 
    - [Tile provider](https://github.com/leaflet-extras/leaflet-providers)
    - Markers - A set of [markers](http://leafletjs.com/reference.html#marker)
    - Vectors - A set of [vectors](http://leafletjs.com/reference.html)
    - Groups  - A group of layers
    - Reference - A link to another layer
 - Manage marker icons
 - Manage vector styles
 - Optional deferred ajax loading of layer data
 - Integrates as frontend module and content element.
 - Uses the GeoJSON format.
 - Autoloading of required assets.
 - [Layer for MetaModels](https://github.com/netzmacht/contao-leaflet-metamodels)
 
Install
-------

```
$ php composer.phar require netzmacht/contao-leaflet-maps:~1.0
```

Credits
-------

The integrated icons are part of the [Farm Fresh Web Icons](http://www.fatcow.com/free-icons) and are licensed under the
[CC BY 3.0 US](http://creativecommons.org/licenses/by/3.0/us/)

The about icon is part of the [Web Blog Icons by SEM Labs](http://semlabs.co.uk/) and is licensed under the 
[CC BY 4.0](http://creativecommons.org/licenses/by/4.0/).

English translations when possible where copied from the used libraries. Mainly the 
[leaflet documentation](leafletjs.com/reference.html) is used.

