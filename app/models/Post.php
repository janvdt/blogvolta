<?php

class Post extends Eloquent {

	public function user()
	{
		return $this->belongsTo('User','post_author');
	}

	public function createdBy()
	{
		return User::find($this->post_author);
	}

	public function editedBy()
	{
		return User::find($this->edited_by);
	}

}