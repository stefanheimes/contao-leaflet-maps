
# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [Unreleased]

## [3.2.3] - 2022-02-22

### Changed

 - Support symfony 5 (Contao 4.13 support) ([#110](https://github.com/netzmacht/contao-leaflet-maps/issues/110))
 - Support doctrine/dbal 3 (Contao 4.13 support) ([#110](https://github.com/netzmacht/contao-leaflet-maps/issues/110))
 - Fix missing icon in backend navigation ([#101](https://github.com/netzmacht/contao-leaflet-maps/issues/101))
 - Fix empty help wizard ([#99](https://github.com/netzmacht/contao-leaflet-maps/issues/99))
 - Update leaflet providers ([111](https://github.com/netzmacht/contao-leaflet-maps/issues/111), [102](https://github.com/netzmacht/contao-leaflet-maps/issues/102))
 - Fix tile layer implementation ([#108](https://github.com/netzmacht/contao-leaflet-maps/issues/108))
 - Fix access to tile layer fields ([#107](https://github.com/netzmacht/contao-leaflet-maps/issues/107))
 - Fix nexted folder structure ([#97](https://github.com/netzmacht/contao-leaflet-maps/issues/97))

## [3.2.2] - 2020-12-18

### Fixed

 - Remove template debug placeholders, it breaks generated javascript ([#93](https://github.com/netzmacht/contao-leaflet-maps/issues/93))
 - Generate absolute urls for file layers ([#92](https://github.com/netzmacht/contao-leaflet-maps/issues/92)) 

## [3.2.1] - 2020-09-02

### Fixed

 - Do not append javascript to the body anymore as consent tools might interrupt rendering

## [3.2.0] - 2020-08-28

### Added

 - Add support for consent tools based on `hofff/contao-consent-bridge`

## [3.1.7] - 2020-08-28

### Fixed

 - Duplicate map layer relations ([#89](https://github.com/netzmacht/contao-leaflet-maps/issues/89))

## [3.1.6] - 2020-01-03

### Fixed

 - Do not add options which value is `NULL`
 - Fix button labels ([#83](https://github.com/netzmacht/contao-leaflet-maps/issues/83))
 - Fix potential security issue of symfony/dependency-injection (https://github.com/advisories/GHSA-pgwj-prpq-jpc2)

### Changed 

 - Use relative path for backend icon ([#82](https://github.com/netzmacht/contao-leaflet-maps/issues/82))


## [3.1.5] - 2019-08-26

### Fixed

 - Use twig directly instead of templating component to restore Contao 4.8
 
## [3.1.4] - 2019-02-13

### Fixed

 - Fix ordering changes in layer control element aren't recognized ([#72](https://github.com/netzmacht/contao-leaflet-maps/issues/72))
 - Fix markers with negative coordinates aren't displayed ([#74](https://github.com/netzmacht/contao-leaflet-maps/issues/74))
 - Fix image icon with non existing image throws exception ([#75](https://github.com/netzmacht/contao-leaflet-maps/issues/75))
 - Fix invalid alias then using multiple edit. Aliases aren't copied anymore. ([#71](https://github.com/netzmacht/contao-leaflet-maps/issues/71))

## [3.1.3] - 2019-01-10

### Fixed

 - Fix broken api routes in Contao 4.6/Symfony 4 (#69)
 - Fix broken about.html.twig template. Error block was missing

## 3.1.2 - 2018-12-18

[Full Changelog](https://github.com/netzmacht/contao-leaflet-maps/compare/3.1.1...3.1.2)

### Fixed

 - Fix broken MapBox integration: Access token is now required
 - Fix broken OpenWeatherMap integration: Api key is now required
 - Fix broken Thunderforest integration: Api key is now required

### Added

 - Add missing OpenPtMap of leaflet-providers
 - Add missing OpenRailwayMap of leaflet-providers
 - Add missing OpenFireMap of leaflet-providers
 - Add missing SafeCast of leaflet-providers
 - Add missing map types `normalNightTransit`, `normalNightTransitMobile`, `reducedDay`, `reducedNight`, 
   `hybridDayTransit` and `hybridDayGrey` of HERE provider
 - Add missing map types `Voyager`, `VoyagerNoLabels`, `VoyagerOnlyLabels` and `VoyagerLabelsUnder` of CartoDB provider
 - Add missing Wikimedia of leaflet-providers
 - Add missing GeoportailFrance of leaflet-providers
 - Add missing OneMapSG of leaflet-providers

## [3.1.1] - 2018-12-07

### Fixed

 - Fix missing marker cluster icon.
 - Ignore markers without coordinates to prevent uncaught exception caused by invalid coordinates.

## 3.1.0 - 2018-11-01

[Full Changelog](https://github.com/netzmacht/contao-leaflet-maps/compare/3.0.4...3.1.0)

### Added

 - Custom route to load map data.
 - Add distance filter support for the marker layer (Bounds Mode "fit" has to be enabled).
 - Add support for relative css units for map size definition (#59).
 - Add hint that zoom level is probably required (#56).

### Deprecated

 - Deprecate `Netzmacht\Contao\Leaflet\Frontend\RequestUrl`. Use router to generate request url for layer data.
 - Deprecate `Netzmacht\Contao\Leaflet\Frontend\DataController`. Use introduced endpoint to get map data.
 
### Changed

 - Require PHP 7.1.
 - Rewritten about page using own route (#48).

### Fixed

 - Pressing enter on backend geocode control doesn't submit form anymore.
 - Fix broken marker cluster layer (#60).


## [3.0.4] - 2018-10-08

### Fixed

 - Fix broken content element attributes (Missing class and custom id).

## [3.0.3] - 2018-09-18

### Fixed

 - Make alias generator services public for Contao 4.6/Symfony 4.0 compatibility.

## [3.0.2] - 2018-08-23

 - Run composer require checker and solve issues.
 
## [3.0.1] - 2018-06-20

 - Fix broken dynamic bbox related data loading (#57) 

## [3.0.0] - 2018-01-05

 - Make hook/dca listener services public

## [3.0.0-beta1] - 2017-11-15

Enhancements

  - Updated translations

Bugfixes
  
  - Broken service definitions
  - Broken file layer id 

## [3.0.0-alpha2] - 2017-10-19

Implemented enhancements
 
 - Refactor to a more service oriented architecture
 - Use a proper template for the map templates (Customize templates has to be adjusted!)
 - New file layer for gpx,kml,wkt,topojson,geojson files added
 - Bypass filesystem cache in debug mode
 - Changelog added

[Unreleased]: https://github.com/netzmacht/contao-leaflet-maps/compare/3.2.2...hotfix/3.2.3
[3.2.2]: https://github.com/netzmacht/contao-leaflet-maps/compare/3.2.1...3.2.2
[3.2.1]: https://github.com/netzmacht/contao-leaflet-maps/compare/3.2.0...3.2.1
[3.2.0]: https://github.com/netzmacht/contao-leaflet-maps/compare/3.1.7...3.2.0
[3.1.7]: https://github.com/netzmacht/contao-leaflet-maps/compare/3.1.6...3.1.7
[3.1.6]: https://github.com/netzmacht/contao-leaflet-maps/compare/3.1.5...3.1.6
[3.1.5]: https://github.com/netzmacht/contao-leaflet-maps/compare/3.1.4...3.1.5
[3.1.4]: https://github.com/netzmacht/contao-leaflet-maps/compare/3.1.3...3.1.4
[3.1.3]: https://github.com/netzmacht/contao-leaflet-maps/compare/3.1.2...3.1.3
[3.1.1]: https://github.com/netzmacht/contao-leaflet-maps/compare/3.1.0...3.1.1
[3.0.4]: https://github.com/netzmacht/contao-leaflet-maps/compare/3.0.3...3.0.4
[3.0.3]: https://github.com/netzmacht/contao-leaflet-maps/compare/3.0.2...3.0.3
[3.0.2]: https://github.com/netzmacht/contao-leaflet-maps/compare/3.0.1...3.0.2
[3.0.1]: https://github.com/netzmacht/contao-leaflet-maps/compare/3.0.0...3.0.1
[3.0.0]: https://github.com/netzmacht/contao-leaflet-maps/compare/3.0.0-beta1...3.0.0
[3.0.0-beta1]: https://github.com/netzmacht/contao-leaflet-maps/compare/3.0.0-alpha2...3.0.0-beta1
[3.0-0-alpha2]: https://github.com/netzmacht/contao-leaflet-maps/compare/3.0.0-alpha1...3.0.0-alpha2
