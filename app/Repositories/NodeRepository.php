<?php
declare(strict_types=1);
namespace App\Repositories;

use App\Node;

class NodeRepository
{
	/**
	 * Node model
	 * @var Node
	 */
	private $model;

	/**
	 * Constructor.
	 * 
	 * @param Node $model 
	 */
	public function __construct(Node $model)
	{
		$this->model = $model;
	}

	/**
	 * Create new node instance.
	 * 
	 * @return Node 
	 */
	public function newInstance(): Node
	{
		return $this->model->newInstance();
	}

	/**
	 * Save node state.
	 * @param  Node   $node 
	 * @return bool       
	 */
	public function save(Node $node): bool
	{
		return $node->save();
	}
}