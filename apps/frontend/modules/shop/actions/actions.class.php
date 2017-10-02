<?php

/**
 * product actions.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage product
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: actions.class.php 31002 2010-09-27 12:04:07Z Kris.Wallsmith $
 */
class shopActions extends sfActions
{
  public function preExecute()
  {
    $this->configuration = new productGeneratorConfiguration();

    if (!$this->getUser()->hasCredential($this->configuration->getCredentials($this->getActionName())))
    {
      $this->forward(sfConfig::get('sf_secure_module'), sfConfig::get('sf_secure_action'));
    }

    $this->dispatcher->notify(new sfEvent($this, 'admin.pre_execute', array('configuration' => $this->configuration)));

    $this->helper = new productGeneratorHelper();

    parent::preExecute();
  }

    public function executeSearch(sfWebRequest $request)
    {
        if ($request->hasParameter('_reset')) {
            $this->setSearchQuery('');
//            echo  $reset;
            return $this->forward('shop', 'index');   /*if query ==='' worker*/
        }


        if ((!$query = $request->getParameter('query')) or ($request->hasParameter('_reset'))) {
            return $this->forward('shop', 'index');   /*if query ==='' worker*/
        }
        $this->tiresproduct = Doctrine::getTable('TiresProduct')->getForLuceneQuery($query . '*');

        if ($request->isXmlHttpRequest()) {
            if ('*' == $query || !$this->tiresproduct) {
                return $this->renderText('No results.' . count($this->tiresproduct) . "!");
            } else {

                $this->setSearchQuery($query);
                return $this->renderPartial(
                    'shop/table', array('tiresproducts' => $this->tiresproduct, 'sort' => $this->getSort()));
//                return $this ->tiresproduct;

            }
        }
    }


    public function executeAddtofavorite(sfWebRequest $request)
    {
        $this->tiresproduct = Doctrine_Core::getTable('TiresProduct')->find(array($request->getParameter('uuid')));
        $this->getUser()->addProductTofavorite($this->tiresproduct);
        $this->redirect('@tires_product');
    }

    public function executeAddtoCart(sfWebRequest $request)
    {
        $this->tiresproduct = Doctrine_Core::getTable('TiresProduct')->find(array($request->getParameter('uuid')));
        $this->getUser()->addProductToCart($this->tiresproduct);
        $this->redirect('@tires_product');
    }

    public function executeAddtoCompare(sfWebRequest $request)
    {
        $this->tiresproduct = Doctrine_Core::getTable('TiresProduct')->find(array($request->getParameter('uuid')));
        $this->getUser()->addProductTocompare($this->tiresproduct);
        $this->redirect('@tires_product');
    }

    public function executeIndex(sfWebRequest $request)
  {
    // sorting
    if ($request->getParameter('sort') && $this->isValidSortColumn($request->getParameter('sort')))
    {
      $this->setSort(array($request->getParameter('sort'), $request->getParameter('sort_type')));
    }

    // pager
    if ($request->getParameter('page'))
    {
      $this->setPage($request->getParameter('page'));
    }
      // category
      if ($request->getParameter('categ')) {
          $this->setCateg($request->getParameter('categ'));
      }

    $this->pager = $this->getPager();
    $this->sort = $this->getSort();
    $this->tirescategory = $this->getCateg();
    $this->maxprice=$this->getUser()->getAttribute('product.filters.priceto');

      if ($this->maxprice==null)
      {
        $this->maxprice = Doctrine::getTable('TiresProduct')->getMaxPrice($this->tirescategory);
         $this->getUser()->SetAttribute('product.filters.priceto',  $this->maxprice, 'admin_module');
      }

  }

  public function executeFilter(sfWebRequest $request)
  {
    $this->setPage(1);

    if ($request->hasParameter('_reset'))
    {
      $this->setFilters($this->configuration->getFilterDefaults());

      $this->redirect('@tires_product');
    }

    $this->filters = $this->configuration->getFilterForm($this->getFilters());

    $this->filters->bind($request->getParameter($this->filters->getName()));
    if ($this->filters->isValid())
    {
      $this->setFilters($this->filters->getValues());

      $this->redirect('@tires_product');
    }

    $this->pager = $this->getPager();
    $this->sort = $this->getSort();
    $this->tirescategory = $this->getCateg();
    $this->setTemplate('index');
  }
    public function executeShow(sfWebRequest $request)
    {
        $this->tiresproduct = Doctrine_Core::getTable('TiresProduct')->find(array($request->getParameter('uuid')));
        $this->forward404Unless($this->tiresproduct);
        $this->getUser()->addProductToHistory($this->tiresproduct);
        $this->tirescategory = $this->getCateg();
//        $this->filter = new TiresProductFormFilter();

    }

    public function executeStart(sfWebRequest $request)
    {
        $this->setFilters($this->configuration->getFilterDefaults());
        $this->tirescategories = Doctrine_Core::getTable('TiresCategory')
            ->createQuery('a')
            ->addWhere('active = ?', 1)
            ->execute();

        foreach ($this->tirescategories as $i => $tirescategories) {


            $this->setItemsPerPage($tirescategories->getUuid(), $tirescategories->getpage_products_count());
        }


    }


  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $notice = $form->getObject()->isNew() ? 'The item was created successfully.' : 'The item was updated successfully.';

      try {
        $tiresproduct = $form->save();
      } catch (Doctrine_Validator_Exception $e) {

        $errorStack = $form->getObject()->getErrorStack();

        $message = get_class($form->getObject()) . ' has ' . count($errorStack) . " field" . (count($errorStack) > 1 ?  's' : null) . " with validation errors: ";
        foreach ($errorStack as $field => $errors) {
            $message .= "$field (" . implode(", ", $errors) . "), ";
        }
        $message = trim($message, ', ');

        $this->getUser()->setFlash('error', $message);
        return sfView::SUCCESS;
      }

      $this->dispatcher->notify(new sfEvent($this, 'admin.save_object', array('object' => $tiresproduct)));

      if ($request->hasParameter('_save_and_add'))
      {
        $this->getUser()->setFlash('notice', $notice.' You can add another one below.');

        $this->redirect('@tires_product_new');
      }
      else
      {
        $this->getUser()->setFlash('notice', $notice);

        $this->redirect(array('sf_route' => 'tires_product_edit', 'sf_subject' => $tiresproduct));
      }
    }
    else
    {
      $this->getUser()->setFlash('error', 'The item has not been saved due to some errors.', false);
    }
  }

  protected function getFilters()
  {
    return $this->getUser()->getAttribute('product.filters', $this->configuration->getFilterDefaults(), 'admin_module');
  }

  protected function setFilters(array $filters)
  {
    return $this->getUser()->setAttribute('product.filters', $filters, 'admin_module');
  }

  protected function getPager()
  {
//    $pager = $this->configuration->getPager('TiresProduct');
      $items_x_page = $this->GetItemsPerPage($category = $this->getCateg());  //10; //  sfConfig::get('app_max_items_x_page');
      $pager = new sfDoctrinePager('TiresProduct', $items_x_page);

      $pager->setQuery($this->buildQuery());
    $pager->setPage($this->getPage());
    $pager->init();

    return $pager;
  }

  protected function setPage($page)
  {
    $this->getUser()->setAttribute('product.page', $page, 'admin_module');
  }

  protected function getPage()
  {
    return $this->getUser()->getAttribute('product.page', 1, 'admin_module');
  }

  protected function buildQuery()
  {
    $tableMethod = $this->configuration->getTableMethod();
    if (null === $this->filters)
    {
      $this->filters = $this->configuration->getFilterForm($this->getFilters());
    }

    $this->filters->setTableMethod($tableMethod);

    $query = $this->filters->buildQuery($this->getFilters());

    $this->addSortQuery($query);
    $this->addOnlyCategoryQuery($query);
    $this->addOnlyActiveQuery($query);
    $event = $this->dispatcher->filter(new sfEvent($this, 'admin.build_query'), $query);
    $query = $event->getReturnValue();

    return $query;
  }
    protected function addOnlyActiveQuery($query)
    {
        $query->addwhere('active = ?', true);
        return $query;

    }

  protected function addSortQuery($query)
  {
    if (array(null, null) == ($sort = $this->getSort()))
    {
      return;
    }

    if (!in_array(strtolower($sort[1]), array('asc', 'desc')))
    {
      $sort[1] = 'asc';
    }

    $query->addOrderBy($sort[0] . ' ' . $sort[1]);
  }

  protected function getSort()
  {
    if (null !== $sort = $this->getUser()->getAttribute('product.sort', null, 'admin_module'))
    {
      return $sort;
    }

    $this->setSort($this->configuration->getDefaultSort());

    return $this->getUser()->getAttribute('product.sort', null, 'admin_module');
  }

  protected function setSort(array $sort)
  {
    if (null !== $sort[0] && null === $sort[1])
    {
      $sort[1] = 'asc';
    }

    $this->getUser()->setAttribute('product.sort', $sort, 'admin_module');
  }
    protected function addOnlyCategoryQuery($query)
    {

        if (null == ($category = $this->getCateg())) {
            return;
        }

        $query->addWhere('uuid_category = ?', $category);
        return $query;

    }


  protected function isValidSortColumn($column)
  {
    return Doctrine_Core::getTable('TiresProduct')->hasColumn($column);
  }
    protected function setCateg($categ)
    {
        $this->getUser()->setAttribute('product.categ', $categ, 'admin_module');
    }

    protected function getCateg()
    {
        return $this->getUser()->getAttribute('product.categ', 1, 'admin_module');
    }
    protected function setItemsPerPage($categ, $perpage)
    {
        $this->getUser()->setAttribute('product.categ' . $categ, $perpage, 'admin_module');
    }

    protected function GetItemsPerPage($categ)
    {
        if (0 == $this->getUser()->getAttribute('product.categ' . $categ, 0, 'admin_module')) {
            $this->setAllItemsPerPage();
        }

        return $this->getUser()->getAttribute('product.categ' . $categ, 20, 'admin_module');
    }

    protected function setAllItemsPerPage()
    {
        $tirescategory = Doctrine_Core::getTable('TiresCategory');
        foreach ($tirescategory as $i => $tirescategory) {

            $this->getUser()->setAttribute('product.categ' . $i->getUidd(), $i->getpage_products_count(), 'admin_module');
        }

    }



}
