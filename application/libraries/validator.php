<?php

class Validator extends Laravel\Validator {

    public function validate_awesome($attribute, $value, $parameters)
    {
        return $value == 'awesome';
    }

	/**
	 * Validate the uniqueness of an attribute value on a given database table.
	 *
	 * If a database column is not specified, the attribute will be used.
	 *
	 * @param  string  $attribute
	 * @param  mixed   $value
	 * @param  array   $parameters
	 * @return bool
	 */

    public function validate_unique($attribute, $value, $parameters)
    {

		// We allow the table column to be specified just in case the column does
		// not have the same name as the attribute. It must be within the second
		// parameter position, right after the database table name.
		if (isset($parameters[1]))
		{
			$attribute = $parameters[1];
		}

		$model = new $parameters[0]();

		$query = $model->count(array($attribute => $value));

		//print $query;

		//$query = $this->db()->table($parameters[0])->where($attribute, '=', $value);

		// We also allow an ID to be specified that will not be included in the
		// uniqueness check. This makes updating columns easier since it is
		// fine for the given ID to exist in the table.
		if (isset($parameters[2]))
		{
			$id = (isset($parameters[3])) ? $parameters[3] : 'id';

			$query->where($id, '<>', $parameters[2]);
		}

		return ($query > 0)?false:true;
    }

	/**
	 * Validate the existence of an attribute value in a database table.
	 *
	 * @param  string  $attribute
	 * @param  mixed   $value
	 * @param  array   $parameters
	 * @return bool
	 */
	public function validate_exists($attribute, $value, $parameters)
	{
		if (isset($parameters[1])) $attribute = $parameters[1];

		// Grab the number of elements we are looking for. If the given value is
		// in array, we'll count all of the values in the array, otherwise we
		// can just make sure the count is greater or equal to one.
		$count = (is_array($value)) ? count($value) : 1;

		$model = new $parameters[0]();

		//$query = $this->db()->table($parameters[0]);

		// If the given value is an array, we will check for the existence of
		// all the values in the database, otherwise we'll check for the
		// presence of the single given value in the database.
		if (is_array($value))
		{
			//$query = $query->where_in($attribute, $value);
			$query = $model->find(array($attribute=>array('$in'=>$value)));
		}
		else
		{
			//$query = $query->where($attribute, '=', $value);
			$query = $model->find(array($attribute=>$value));
		}

		//print_r($query);

		return (count($query) > 0)?false:true;
	}

	/**
	 * Validate that an attribute is the same as another attribute.
	 *
	 * @param  string  $attribute
	 * @param  mixed   $value
	 * @param  array   $parameters
	 * @return bool
	 */
	protected function validate_same($attribute, $value, $parameters)
	{
		$other = $parameters[0];
		
		return (isset($this->attributes[$other]) and $value == $this->attributes[$other])?true:false;

	}


}

?>