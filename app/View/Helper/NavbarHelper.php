<?php

class NavbarHelper extends AppHelper {

	private $list = array();
	private $params = array();
	public $name = "default";
	public $view = null;
	public $settings = null;
	public $itemTag = "li";
	public $itemSetTag = "ul";

	public function __construct(View $View, $settings = array(), $name = "default") {
		$this->view = $View;
		$this->settings = $settings;
		$this->name = $name;
		parent::__construct($View, $settings);
	}

	public function prepend($title, $params = false, $attributes = null, $children = null) {
		array_unshift($this->list, compact("title", "params", "attributes", "children"));
		return $this;
	}

	public function append($title, $params = false, $attributes = null, $children = null) {
		$this->list[] = compact("title", "params", "attributes", "children");
		return $this;
	}
	
	public function prependHeader($title, $attributes = null) {
		$params = false;
		$children = false;
		$attributes["class"] = "nav-header";
		array_unshift($this->list, compact("title", "params", "attributes", "children"));
		return $this;
	}
	
	public function appendHeader($title, $attributes = null) {
		$params = false;
		$children = false;
		$attributes["class"] = "nav-header";
		$this->list[] = compact("title", "params", "attributes", "children");
		return $this;
	}

	public function create($params = array(), $name = "default") {
		return new NavbarHelper($this->view, $this->settings, $name);
	}

	public function addParam($name, $value){
		$this->params[$name] = $value;
		return $this;
	}

	public function getNestedList() {
		$list = array();
		foreach ($this->list as $li) {
			$liParams = array("class" => array());
			if($li["params"] !== false){
				$content = $this->view->Html->link($li['title'], $li["params"], $li["attributes"]);
				if ($this->url() == Router::url($li["params"])) {
					$liParams["class"][] = "active";
				}
			}else{
				$content = $this->view->Html->tag("span", $li["title"], $li["attributes"]);
			}
			
			if ($li["children"] && $li["children"] instanceof NavbarHelper) {
				$content .= (string) $li["children"];
			}
			


			$list[] = $this->view->Html->tag($this->itemTag, $content, $liParams);
		}
		return $list;
	}

	public function __toString() {
		$lis = $this->getNestedList();
		$params = array_merge(array("class" => array('nav')),$this->params);
		$ul = $this->view->Html->tag("ul", join("\n", $lis), $params);
		return $ul;
	}

}