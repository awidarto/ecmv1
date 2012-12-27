<?php namespace Mongovel;

class Model {

	/**
	 * Database instance | config
	 *
	 * @var \Mongor\MangoDB|null|string
	 */
	protected $_db = 'default';

	/**
	 * Active collection
	 *
	 * @var string
	 */
	protected $_collection = '';

	public function __construct($db = NULL)
	{
		if ($db !== NULL)
		{
			$this->_db = $db;
		}

		if (is_string($this->_db))
		{
			$this->_db = MongoDB::instance($this->_db);
		}

	}

	/**
	 * Insert a document
	 *
	 * @param  array $insert
	 * @param  bool  $options
	 * @return MongoDB Object
	 */
	public function insert(array $insert, $options =  array())
	{
		return $this->_db->insert($this->_collection, $insert, $options);
	}

	/**
	 * Get a single document
	 *
	 * @param  array $get
	 * @param  array $fields
	 * @return Mongodb Object
	 */
	public function get(array $get, array $fields = array())
	{
		return $this->_db->find_one($this->_collection, $get, $fields);
	}

	/**
	 * Update a document
	 *
	 * @param  array $criteria
	 * @param  array $update
	 * @param  array $array
	 * @return null
	 */
	public function update(array $criteria, array $update, array $options = array())
	{
		return $this->_db->update($this->_collection, $criteria, $update, $options);
	}

	/**
	 * Find documents
	 *
	 * @param  array $query
	 * @param  array $fields
	 * @return MongoDB Object
	 */
	public function find($query = array(), $fields = array(),$sorts = array(), $limit = array())
	{
		$find =  $this->_db->find($this->_collection, $query, $fields, $sorts, $limit);

		if($find->count()==0)
		{
			return array();
		}

		return iterator_to_array($find);
	}

	public function count($query = array())
	{
		$count =  $this->_db->count($this->_collection,$query);
		return $count;
	}

	/**
	 * Delete a document
	 *
	 * @param  array $criteria
	 * @return null
	 */
	public function delete(array$criteria)
	{
		return $this->_db->remove($this->_collection, $criteria, false);
	}

	/**
	 * Set an index for collection
	 *
	 * @param  $keys
	 * @return void
	 */
	public function set_index($keys)
	{
		return $this->_db->ensure_index($this->_collection, $keys);
	}

}