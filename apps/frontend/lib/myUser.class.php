<?php

class myUser extends sfBasicSecurityUser
{
//  ================= filter  =================
 public function getFilterFilds($nomcateg, $key)
 {
     $this->getAttribute('product_filter', array());

 }

//  ==================================
    public function addProductToHistory(TiresProduct $product)
    {
        $ids = $this->getAttribute('product_history', array());

        if (!in_array($product->getUuid(), $ids))
        {
            array_unshift($ids, $product->getUuid());

            $this->setAttribute('product_history', array_slice($ids, 0, 3));
        }
    }

    public function getProductHistory()
    {
        $ids = $this->getAttribute('product_history', array());

        if (!empty($ids))
        {
            return Doctrine_Core::getTable('TiresProduct')
                ->createQuery('a')
                ->whereIn('a.uuid', $ids)
                ->execute()
                ;
        }

        return array();
    }
    public function resetJobHistory()
    {
        $this->getAttributeHolder()->remove('product_history');
    }
//  =============== favorite ===================
    public function addProductTofavorite(TiresProduct $product)
    {
        $ids = $this->getAttribute('product_favorite', array());

        if (!in_array($product->getUuid(), $ids))
        {
            array_unshift($ids, $product->getUuid());

            $this->setAttribute('product_favorite', array_slice($ids, 0, 30));
        }
    }

    public function getProductfavorite()
    {
        $ids = $this->getAttribute('product_favorite', array());

        if (!empty($ids))
        {
            return Doctrine_Core::getTable('TiresProduct')
                ->createQuery('a')
                ->whereIn('a.uuid', $ids)
                ->execute()
                ;
        }

        return array();
    }
    public function getProductfavoriteCol()
    {
        $ids = $this->getAttribute('product_favorite', array());

        if (!empty($ids))
        {
            return count($ids);
        }

        return 0;
    }

    public function resetFavorite()
    {
        $this->getAttributeHolder()->remove('product_favorite');
    }

//  =============== cart ===================
    public function addProductTocart(TiresProduct $product)
    {
        $ids = $this->getAttribute('product_cart', array());

        if (!in_array($product->getUuid(), $ids))
        {
            array_unshift($ids, $product->getUuid());

            $this->setAttribute('product_cart', array_slice($ids, 0, 30));
        }
    }

    public function getProductcart()
    {
        $ids = $this->getAttribute('product_cart', array());

        if (!empty($ids))
        {
            return Doctrine_Core::getTable('TiresProduct')
                ->createQuery('a')
                ->whereIn('a.uuid', $ids)
                ->execute()
                ;
        }

        return array();
    }
    public function getProductcartCol()
    {
        $ids = $this->getAttribute('product_cart', array());

        if (!empty($ids))
        {
            return count($ids);
        }

        return 0;
    }

    public function resetcart()
    {
        $this->getAttributeHolder()->remove('product_cart');
    }
//  =============== compare ===================
    public function addProductTocompare(TiresProduct $product)
    {
        $ids = $this->getAttribute('product_compare', array());

        if (!in_array($product->getUuid(), $ids))
        {
            array_unshift($ids, $product->getUuid());

            $this->setAttribute('product_compare', array_slice($ids, 0, 30));
        }
    }

    public function getProductcompare()
    {
        $ids = $this->getAttribute('product_compare', array());

        if (!empty($ids))
        {
            return Doctrine_Core::getTable('TiresProduct')
                ->createQuery('a')
                ->whereIn('a.uuid', $ids)
                ->execute()
                ;
        }

        return array();
    }
    public function getProductcompareCol()
    {
        $ids = $this->getAttribute('product_compare', array());

        if (!empty($ids))
        {
            return count($ids);
        }

        return 0;
    }

    public function resetcompare()
    {
        $this->getAttributeHolder()->remove('product_compare');
    }

    public function getСateg()
    {
        return $this->getAttribute('product.categ', 1, 'admin_module');
    }

}
