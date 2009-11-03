<?php

class M_Users extends Model
{
    function M_Users()
    {
        parent::Model();    
    }
    
    function create($data)
    {
		$this->db->insert('users', $data);
    }
    
    function update($id)
    {
    	/* Update a User */
    }
    
    function get($id)
    {
    	/* Read a users deatils */
    }
    
    function delete($id)
    {
    	/* Delete user data. */
    }
}
