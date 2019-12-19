<?php

namespace Encore\Admin\Latlong;

use Encore\Admin\Form\Field;

class Address extends Field
{
    /**
     * Set to true to automatically get the current position from the browser
     * @var bool
     */
    protected $autoPosition = false;
    /**
     * Column name.
     *
     * @var array
     */
    protected $column = [];

    /**
     * @var string
     */
    protected $view = 'laravel-admin-latlong::address';

    /**
     * Map height.
     *
     * @var int
     */
    protected $height = 300;

    /**
     * Map Zoom
     *
     * @var int
     */
    protected $zoom = 16;

    /**
     * Get assets required by this field.
     *
     * @return array
     */
    public static function getAssets()
    {
        return ['js' => ExtensionAddress::getProvider()->getAssets()];
    }

    /**
     * Latlong constructor.
     *
     * @param string $column
     * @param array $arguments
     */
    public function __construct($column, $arguments)
    {
        $this->column['address'] = (string)$column;

        array_shift($arguments);

        $this->label = $this->formatLabel($arguments);
        $this->id    = $this->formatId($this->column);
    }

    /**
     * Set map height.
     *
     * @param int $height
     * @return $this
     */
    public function height(int $height)
    {
        $this->height = $height;

        return $this;
    }


    /**
     * Set map zoom.
     *
     * @param int $zoom
     * @return $this
     */
    public function zoom(int $zoom)
    {
        $this->zoom = $zoom;

        return $this;
    }

    /**
     * Set true to automatically get the current position from the browser on page load
     * @param $bool
     * @return Latlong
     */
    public function setAutoPosition($bool) {
        $this->autoPosition = $bool;
        return $this;
    }

    /**
     * {@inheritdoc}
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|string
     */
    public function render()
    {
        $this->script = ExtensionAddress::getProvider()
            ->setParams([
                'zoom' => $this->zoom
            ])
            ->setAutoPosition($this->autoPosition)
            ->applyScript2($this->id);

        $variables = [
            'height'   => $this->height,
            'provider' => ExtensionAddress::config('default'),
        ];

        return parent::render()->with($variables);
    }
}
