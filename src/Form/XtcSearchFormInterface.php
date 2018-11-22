<?php
/**
 * Created by PhpStorm.
 * User: aisrael
 * Date: 31/10/2018
 * Time: 16:48
 */

namespace Drupal\xtcsearch\Form;


use Drupal\Core\Form\FormInterface;

interface XtcSearchFormInterface extends FormInterface
{
  /**
   * @return \Elastica\ResultSet
   */
  function getSearch();

  function getElastica();

  function getForm();

}