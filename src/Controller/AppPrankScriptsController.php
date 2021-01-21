<?php
namespace App\Controller;

use Cake\Database\Expression\QueryExpression;
use Cake\ORM\Query;
use Cake\ORM\TableRegistry;
use Cake\Routing\Router;

class AppPrankScriptsController extends AppController
{
    public function ideas($slug)
    {
        $this->autoRender = false;

        $q = $this->request->getQuery('q');
        $limit = $this->request->getQuery('limit');
        $page = $this->request->getQuery('page');

        $this->paginate = [
          'limit' => $limit,
          'maxLimit' => 10
        ];

        $ideas = $this->AppPrankScripts->find();

        if (!empty($q) && isset($q)) {
            $ideas->where(['title LIKE' => '%' . $q . '%']);
		}

        $this->paginate($ideas);

        return $this->response
            ->withType('application/json')
            ->withStringBody(json_encode([
                'success' => true,
                'ideas' => $ideas,
                'paging' => $this->request->params['paging']['AppPrankScripts']
            ]));
    }
}
