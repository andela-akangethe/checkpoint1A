<?php 
namespace Alex;

/**
* This is an OOP PHP CRUD class in which you can create,
* read, delete and update entries in the dictionary.
*
* @author Alex Kangethe
*/


class UrbanDictionary
{
	/**
	* To retrieve an entry if present and throw an exception if not
	* present
	*/

	public function retrieve($key)
	{
		if (isset(Datastore::$data[$key])) {
			return Datastore::$data[$key];
		} else {
			throw new Exception("No such key exists");	
		}
	}

	/**
	* To update an entry if present and throw an exception if not
	* present
	*/

	public function update($key, $change)
	{
		if (isset(Datastore::$data[$key])) {
			Datastore::$data[$key] = $change;
			return Datastore::$data;
		} else {
			throw new Exception("Sorry that slang does not exist");	
		}
	}

	/**
	* To add an entry if present and throw an exception if already
	* present
	*/

	public function add($key, $add)
	{
		if (isset(Datastore::$data[$key])) {
			throw new Exception("That slang already exists");	
		} else {
			Datastore::$data[$key] = $add;
			return Datastore::$data;
		}
	}

	/**
	* To delete an entry if present and throw an exception if not
	* present
	*/

	public function delete($key) 
	{
		if (isset(Datastore::$data[$key])) {
			unset(Datastore::$data[$key]);
			return Datastore::$data;
		} else {
			throw new Exception("The said key is not available\n");
		}
	}
}