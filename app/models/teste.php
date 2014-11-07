<?php
use Doctrine\Common\Collections\ArrayCollection;

/** @Entity **/
class Product
{
	
	/**
	 * @Id
	 * @Column(type="integer", name="id")
	 * @GeneratedValue(strategy="AUTO")
	 */
	public $id;
	
    // ...
    /**
     * @OneToMany(targetEntity="Feature", mappedBy="product")
     **/
    public $features;
    // ...
}

/** @Entity **/
class Feature
{
	
	/**
	 * @Id
	 * @Column(type="integer", name="id")
	 * @GeneratedValue(strategy="AUTO")
	 */
	public $id;
    // ...
    /**
     * @ManyToOne(targetEntity="Product", inversedBy="features")
     * @JoinColumn(name="product_id", referencedColumnName="id")
     **/
    public $product;
    // ...
}

?>