<?php

/**
 * lib/model/doctrine/TiresProductTable.class.php:2
 * TiresProductTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class TiresProductTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object TiresProductTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('TiresProduct');
    }

    public function getForLuceneQuery($query)
    {
        $hits = self::getLuceneIndex()->find($query);

        $pks = array();
        foreach ($hits as $hit)
        {
            $pks[] = $hit->pk;
        }

        if (empty($pks))
        {
            return array();
        }

        $q = $this->createQuery('j')
            ->whereIn('j.uuid', $pks);
//            ->limit(20);

        $q = $this->addActiveProductsQuery($q);

        return $q->execute();
    }

    static public function getLuceneIndex()
    {
        ProjectConfiguration::registerZend();

        if (file_exists($index = self::getLuceneIndexFile()))
        {
            return Zend_Search_Lucene::open($index);
        }
        else
        {
            return Zend_Search_Lucene::create($index);
        }
    }

    static public function getLuceneIndexFile()
    {
        return sfConfig::get('sf_data_dir').'/tires.'.sfConfig::get('sf_environment').'.index';
    }

    public function retrieveActiveProduct(Doctrine_Query $q)
    {
        return $this->addActiveProductsQuery($q)->fetchOne();
    }

    public function getActiveProducts(Doctrine_Query $q = null)
    {
        return $this->addActiveProductsQuery($q)->execute();
    }

    public function countActiveProducts(Doctrine_Query $q = null)
    {
        return $this->addActiveProductsQuery($q)->count();
    }
    public function getMaxPrice($ProductsCategory)
    {

        if (is_null($ProductsCategory)) { return 0; }
        $q = Doctrine_Query::create()
            ->from('TiresProduct t');
        $q->andWhere('t.active = ?', 1);
        $q->addSelect('max(t.price)');
        $q->andWhere('t.uuid_category = ?', $ProductsCategory);
//
//        SELECT MAX(t.price+1) AS t__0 FROM Tires_product t WHERE (t.active = ? AND t.uuid_category = ?)
        $q->execute();
        $this->maxvalue = $q->fetchOne();
        return $this->maxvalue['max'];

    }

    public function addActiveProductsQuery(Doctrine_Query $q = null)
    {
        if (is_null($q))
        {
            $q = Doctrine_Query::create()
                ->from('TiresProduct j');
        }

        $alias = $q->getRootAlias();
        $q->andWhere($alias . '.active = ?', 1);
        return $q;
    }
    static public function applyPricedFilter($query, $value,$position)
    {
      if ( empty($value['text'])) return $query;
        $alias = $query->getRootAlias();
        switch ($position)
          {
            case '1':
                $query->addWhere('price > ?', (int)$value['text']);
                break;
            case '2':
                $query->addWhere('price < ?', (int)$value['text']);
                break;
        }
        return $query;
    }

}
