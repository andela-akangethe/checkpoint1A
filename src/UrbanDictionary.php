<?php 
namespace Alex;

/**
* author: Alex Kangethe
* This is an OOP PHP CRUD class
*/


class UrbanDictionary
{

	public function retrieve($key)
	{
		if (isset(Datastore::$data[$key])) {
			return Datastore::$data[$key];
		} else {
			throw new Exception("No such key exists");	
		}
	}

	public function update($key, $change)
	{
		if (isset(Datastore::$data[$key])) {
			Datastore::$data[$key] = $change;
			return Datastore::$data;
		} else {
			throw new Exception("Sorry that slang does not exist");	
		}
	}

	public function add($key, $add)
	{
		if (isset(Datastore::$data[$key])) {
			throw new Exception("That slang already exists");	
		} else {
			Datastore::$data[$key] = $add;
			return Datastore::$data;
		}
	}

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