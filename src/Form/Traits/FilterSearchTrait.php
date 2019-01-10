<?php
/**
 * Created by PhpStorm.
 * User: aisrael
 * Date: 2019-01-09
 * Time: 14:22
 */

namespace Drupal\xtcsearch\Form\Traits;


use Drupal\xtcsearch\PluginManager\XtcSearchFilterType\XtcSearchFilterTypePluginBase;

trait FilterSearchTrait
{

  use FilterTrait;

  protected function addAggregations() {
    foreach($this->filters as $name => $container) {
      $filter = $this->loadFilter($name);
      $filter->setForm($this->form);
      $filter->addAggregation();
    }
  }

  protected function getCriteria() {
    foreach($this->filters as $name => $container) {
      $filter = $this->loadFilter($name);
      $filter->setForm($this->form);
      $this->musts[$filter->getQueryName()] = $filter->getRequest();
      $this->addCompletion($filter);
      $this->addSuggest($filter);
    }
  }

  protected function addCompletion(XtcSearchFilterTypePluginBase $filter){
    if($filter->hasCompletion() && !empty($filter->initCompletion())) {
      $this->suggests[$filter->getQueryName()]['completion_' . $filter->getQueryName()] = $filter->initCompletion();
    }
  }

  protected function addSuggest(XtcSearchFilterTypePluginBase $filter){
    if($filter->hasSuggest() && !empty($filter->initSuggest())) {
      $this->suggests[$filter->getQueryName()]['suggest_' . $filter->getQueryName()] = $filter->initSuggest();
    }
  }


}