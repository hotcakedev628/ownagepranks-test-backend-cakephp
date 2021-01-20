<?php
namespace App\Controller;

use App\Service\MatterDocketService;
use Cake\Http\Client;
use Cake\Database\Expression\QueryExpression;
use Cake\ORM\Query;
use Cake\ORM\TableRegistry;
use Cake\Routing\Router;

class PrankController extends AppController
{
	public function categories() {
        $this->autoRender = false;

        $limit = $this->request->getQuery('limit');
        $page = $this->request->getQuery('page');

		$this->paginate = [
			'limit' => $limit,
			'maxLimit' => 10
		];

        $categories = TableRegistry::get('app_categories');
        $query = $categories->find();

        $this->paginate($query);

		return $this->response
            ->withType('application/json')
            ->withStringBody(json_encode([
                'success' => true,
                'categories' => $query,
                'paging' => $this->request->params['paging']['app_categories']
            ]));
    }
}