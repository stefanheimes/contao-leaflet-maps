<?php

/**
 * @package    dev
 * @author     David Molineus <david.molineus@netzmacht.de>
 * @copyright  2014 netzmacht creative David Molineus
 * @license    LGPL 3.0
 * @filesource
 *
 */

namespace Netzmacht\Contao\Leaflet\Mapper;

use Netzmacht\Contao\Leaflet\Filter\Filter;
use Netzmacht\Contao\Leaflet\Model\ControlModel;
use Netzmacht\Contao\Leaflet\Model\MapModel;
use Netzmacht\LeafletPHP\Definition;
use Netzmacht\LeafletPHP\Definition\Control;
use Netzmacht\LeafletPHP\Definition\Layer;
use Netzmacht\LeafletPHP\Definition\Map;

/**
 * Class MapMapper maps the database map model to the leaflet definition.
 *
 * @package Netzmacht\Contao\Leaflet\Mapper
 */
class MapMapper extends AbstractMapper
{
    /**
     * Class of the model being build.
     *
     * @var string
     */
    protected static $modelClass = 'Netzmacht\Contao\Leaflet\Model\MapModel';

    /**
     * Class of the definition being created.
     *
     * @var string
     */
    protected static $definitionClass = 'Netzmacht\LeafletPHP\Definition\Map';

    /**
     * {@inheritdoc}
     */
    protected function initialize()
    {
        $this->optionsBuilder
            ->addOptions('center', 'zoom', 'zoomControl')
            ->addOptions('dragging', 'touchZoom', 'scrollWheelZoom', 'doubleClickZoom', 'boxZoom', 'tap', 'keyboard')
            ->addOptions('trackResize', 'closeOnClick', 'bounceAtZoomLimits')
            ->addConditionalOptions('adjustZoomExtra', array('minZoom', 'maxZoom'))
            ->addConditionalOptions('keyboard', array('keyboardPanOffset', 'keyboardZoomOffset'));
    }

    /**
     * {@inheritdoc}
     */
    protected function build(
        Definition $map,
        \Model $model,
        DefinitionMapper $mapper,
        Filter $filter = null,
        Definition $parent = null
    ) {
        if ($map instanceof Map && $model instanceof MapModel) {
            $this->buildCustomOptions($map, $model);
            $this->buildControls($map, $model, $mapper, $filter);
            $this->buildLayers($map, $model, $mapper, $filter);
            $this->buildBoundsCalculation($map, $model);
            $this->buildLocate($map, $model);
        }
    }

    /**
     * {@inheritdoc}
     */
    protected function buildConstructArguments(
        \Model $model,
        DefinitionMapper $mapper,
        Filter $filter = null,
        $elementId = null
    ) {
        return array(
            $this->getElementId($model, $elementId),
            $this->getElementId($model, $elementId)
        );
    }

    /**
     * Build map custom options.
     *
     * @param Map      $map   The map being built.
     * @param MapModel $model The map model.
     *
     * @return void
     */
    protected function buildCustomOptions(Map $map, MapModel $model)
    {
        if ($model->options) {
            $map->setOptions(json_decode($model->options, true));
        }

        $map->setOption('dynamicLoad', (bool) $model->dynamicLoad);
    }

    /**
     * Build map controls.
     *
     * @param Map              $map    The map being built.
     * @param MapModel         $model  The map model.
     * @param DefinitionMapper $mapper The definition mapper.
     * @param Filter           $filter Optional request filter.
     *
     * @return void
     */
    private function buildControls(Map $map, MapModel $model, DefinitionMapper $mapper, Filter $filter = null)
    {
        $collection = ControlModel::findActiveBy('pid', $model->id, array('order' => 'sorting'));

        if (!$collection) {
            return;
        }

        foreach ($collection as $control) {
            $control = $mapper->handle($control, $filter, null, $map);

            if ($control instanceof Control) {
                $control->addTo($map);
            }
        }
    }

    /**
     * Build map layers.
     *
     * @param Map              $map    The map being built.
     * @param MapModel         $model  The map model.
     * @param DefinitionMapper $mapper Definition mapper.
     * @param Filter           $filter Optional request filter.
     *
     * @return void
     */
    private function buildLayers(Map $map, MapModel $model, DefinitionMapper $mapper, Filter $filter = null)
    {
        $collection = $model->findActiveLayers();

        if ($collection) {
            foreach ($collection as $layer) {
                if (!$layer->active) {
                    continue;
                }

                $layer = $mapper->handle($layer, $filter, null, $map);
                if ($layer instanceof Layer) {
                    $layer->addTo($map);
                }
            }
        }
    }

    /**
     * Build map bounds calculations.
     *
     * @param Map      $map   The map being built.
     * @param MapModel $model The map model.
     *
     * @return void
     */
    private function buildBoundsCalculation(Map $map, MapModel $model)
    {
        $adjustBounds = deserialize($model->adjustBounds, true);

        if (in_array('deferred', $adjustBounds)) {
            $map->setOption('adjustBounds', true);
        }

        if (in_array('load', $adjustBounds)) {
            $map->calculateFeatureBounds();
        }
    }


    /**
     * Build map bounds calculations.
     *
     * @param Map      $map   The map being built.
     * @param MapModel $model The map model.
     *
     * @return void
     */
    private function buildLocate(Map $map, MapModel $model)
    {
        if ($model->locate) {
            $options = array();

            $mapping = array(
                'setView'            => 'locateSetView',
                'watch'              => 'locateWatch',
                'enableHighAccuracy' => 'enableHighAccuracy',
            );

            foreach ($mapping as $option => $property) {
                if ($model->$property) {
                    $options[$option] = (bool) $model->$property;
                }
            }

            $mapping = array(
                'maxZoom'    => 'locateMaxZoom',
                'timeout'    => 'locateTimeout',
                'maximumAge' => 'locateMaximumAge',
            );

            foreach ($mapping as $option => $property) {
                if ($model->$property) {
                    $options[$option] = (int) $model->$property;
                }
            }

            $map->locate($options);
        }
    }
}
