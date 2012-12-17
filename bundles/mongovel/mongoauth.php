<?php namespace Mongovel; use Laravel\Hash as Hash, Laravel\Config as Config,Laravel\Log as Log;

class MongoAuth extends \Laravel\Auth\Drivers\Driver {

	/**
	 * Get the current user of the application.
	 *
	 * If the user is a guest, null should be returned.
	 *
	 * @param  int         $id
	 * @return mixed|null
	 */
	public function retrieve($id)
	{
		//if (filter_var($id, FILTER_VALIDATE_INT) !== false)
		//{
			$user = $this->model()->get(array('_id'=>$id));

			if(is_null($user)){
				return null;
			}else{
				$user['id'] = $user['_id']->__toString();
				unset($user['password']);
				$user = $this->array_to_object($user);
				return $user;
			}

		//}
	}

	/**
	 * Attempt to log a user into the application.
	 *
	 * @param  array  $arguments
	 * @return void
	 */
	public function attempt($arguments = array())
	{
		$username = Config::get('auth.username');

		$user = $this->model()->get(array($username=>$arguments['username']));


		// This driver uses a basic username and password authentication scheme
		// so if the credentials match what is in the database we will just
		// log the user into the application and remember them if asked.
		$password = $arguments['password'];

		if ( ! is_null($user) and Hash::check($password, $user['password']))
		{
			//$user = $this->array_to_object($user);
			
			//Log::info('User '.$username->username.' id : '.$username->_id->toString().' Logged In');
			return $this->login($user['_id'], array_get($arguments, 'remember'));
		}


		return false;
	}

	/**
	 * Change password.
	 *
	 * @return boolean
	 */

	public function changepass($newpass){

		$passwd = Hash::make($newpass);

		$user = $this->user();
		
		if(is_null($user)){
			return false;
		}else{
			return $this->model()->update(array('email'=>$user->email), array('$set'=>array('password'=>$passwd))); 
		}

	}


	/**
	 * Get a fresh model instance.
	 *
	 * @return Eloquent
	 */
	protected function model()
	{
		$model = Config::get('auth.model');

		return new $model;
	}

	protected function array_to_object($array) {

		$obj = json_decode(json_encode($array));

		return $obj;
	} 

}

?>