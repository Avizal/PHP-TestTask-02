<?php

class Controller {
    protected $registry;

	public function __construct($registry) {
		$this->registry = $registry;
	}

    public function start() {
        $db = $this->registry->get('db');

        $query = $db->query("SELECT * FROM categories");

        $result = $this->getSubCategory('0', $query);

        print_r($result);
    }

    protected function getSubCategory($parent_id, $categories) {
        $response = array();
        
        foreach($categories as $category) {
            if ($category['parent_id'] == $parent_id) {
                $response[$category['categories_id']] = $this->getSubCategory($category['categories_id'], $categories);
            }
        }

        if (empty($response)) {
            return $parent_id;
        } else {
            return $response;
        }
    }
}