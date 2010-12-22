<?php

namespace Application\Models;

/**
 * @Entity(repositoryClass="Application\Repositories\SectionsRepository")
 * @Table(name="sections")
 */
class Section
{
	/**
	 * @Id @Column(type="integer")
	 * @GeneratedValue
	 */
	private $id;
	
	/** @Column(length=100) */
	private $title;
	
	/** @Column(type="text") */
	private $body;
	
	public function getId() { return $this -> id; }
	public function setId($id) { $this -> id = $id; }
	
	public function getTitle() { return $this -> title; }
	public function setTitle($title) { $this -> title = $title; }
	
	public function getBody() { return $this -> body; }
	public function setBody($body) { $this -> body = $body; }
}