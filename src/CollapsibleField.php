<?php

namespace Fabble\CollapsibleField;

use Laravel\Nova\Fields\Field;
use Laravel\Nova\Http\Requests\NovaRequest;

class CollapsibleField extends Field
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'collapsible-field';

    public $showOnIndex = false;

    public function __construct($title,$fields, $attribute = null, $resolveCallback = null)
    {
        parent::__construct('', $attribute, $resolveCallback);

        $this->withMeta(['title' => $title]);

        $this->withMeta(['fields' => $fields]);
    }

    public function showOnDefault()
    {
        return $this->withMeta(['showDefault' => true]);
    }

    public function resolveForDisplay($resource, $attribute = null)
    {
        foreach ($this->meta['fields'] as $field) {
            $field->resolveForDisplay($resource);
        }
    }

    public function resolve($resource, $attribute = null)
    {
        foreach ($this->meta['fields'] as $field) {
            $field->resolve($resource, $attribute);
        }
    }

    public function fillInto(NovaRequest $request, $model, $attribute, $requestAttribute = null)
    {
        foreach($this->meta['fields'] as $field) {
            $field->fill($request, $model);
        }
    }
}
