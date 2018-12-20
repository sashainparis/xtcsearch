<?php

namespace Drupal\xtcsearch\Plugin\XtcSearchFilterType;


use Drupal\xtcsearch\PluginManager\XtcSearchFilterType\XtcSearchFilterTypePluginBase;

/**
 * Plugin implementation of the es_filter.
 *
 * @XtcSearchFilterType(
 *   id = "checkbox",
 *   label = @Translation("Checkbox"),
 *   description = @Translation("Checkbox filter."),
 * )
 */
class XtcSearchCheckboxFilterType extends XtcSearchFilterTypePluginBase
{

  public function getFilter(){
    return [
      '#type' => 'checkboxes',
      '#title' => $this->getTitle(),
      '#options' => $this->getOptions(),
      '#default_value' => $this->getDefault(),
    ];
  }

}
