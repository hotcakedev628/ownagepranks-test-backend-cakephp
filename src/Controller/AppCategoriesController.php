<?php
namespace App\Controller;

use Cake\Database\Expression\QueryExpression;
use Cake\ORM\Query;
use Cake\ORM\TableRegistry;
use Cake\Routing\Router;

class AppCategoriesController extends AppController
{
	public function categories() {
        $this->autoRender = false;

        $limit = $this->request->getQuery('limit');
        $page = $this->request->getQuery('page');

		$this->paginate = [
			'limit' => $limit,
			'maxLimit' => 10
		];

        $categories = $this->AppCategories->find('all');

        $this->paginate($categories); 

		return $this->response
            ->withType('application/json')
            ->withStringBody(json_encode([
                'success' => true,
                'categories' => $categories,
                'paging' => $this->request->params['paging']['AppCategories']
            ]));
    }
}
