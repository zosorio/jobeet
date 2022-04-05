<?php

/**
 * category actions.
 *
 * @package    jobeet
 * @subpackage category
 * @author     Your name here
 * @version    SVN: $Id$
 */
class categoryActions extends sfActions
{
  /**
   * Executes index action
   *
   * @param sfRequest $request A request object
   */
  public function executeShow(sfWebRequest $request)
  {
      $this->category = $this->getRoute()->getObject();

      $this->pager  = new sfDoctrinePager(
          'JobeetJob',
          sfConfig::get('app_max_jobs_on_homepage')
      );

      $this->pager->setQuery($this->category->getActiveJobsQuery());
      $this->pager->setPage($request->getParameter('page',1));
      $this->pager->init();
  }


}
