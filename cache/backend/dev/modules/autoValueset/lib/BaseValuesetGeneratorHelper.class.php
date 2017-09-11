<?php

/**
 * valueset module configuration.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage valueset
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: helper.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseValuesetGeneratorHelper extends sfModelGeneratorHelper
{
  public function getUrlForAction($action)
  {
    return 'list' == $action ? 'tires_valueset_valueset' : 'tires_valueset_valueset_'.$action;
  }
}
