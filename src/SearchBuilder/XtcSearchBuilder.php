<?php
/**
 * Created by PhpStorm.
 * User: aisrael
 * Date: 2019-01-07
 * Time: 17:05
 */
namespace Drupal\xtcsearch\SearchBuilder;


use Drupal\xtc\XtendedContent\API\Config;
use Drupal\xtcsearch\Form\Traits\FilterSearchTrait;
use Drupal\xtcsearch\Form\Traits\PaginationTrait;
use Drupal\xtcsearch\Form\Traits\QueryTrait;
use Drupal\xtcsearch\Form\XtcSearchFormBase;

class XtcSearchBuilder
{

  use FilterSearchTrait;
  use QueryTrait;
  use PaginationTrait;

  /**
   * @var array
   */
  protected $definition;

  /**
   * @var \Drupal\xtcsearch\Form\XtcSearchFormBase
   */
  protected $form;

  public function __construct(XtcSearchFormBase $xtcSearchForm) {
    $this->form = $xtcSearchForm;
    $this->definition = Config::loadXtcForm($xtcSearchForm->getSearchId());
    $this->init();
  }

  protected function init(){
    $this->initFilters();
    $this->initElastica();
    $this->initPagination();
    $this->initQuery();
  }

  public function triggerSearch(){
    $this->getCriteria();
    $this->getResultSet();
  }

  public function getDocuments(){
    return $this->resultSet->getDocuments();
  }

}