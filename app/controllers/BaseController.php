<?php

class BaseController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

	public function getPagination($perPage=1, $rowNum=1, $curPage='', $url=""){
		$pages = ceil($rowNum/$perPage); 
		$html = "<div class=\"pagination\">";	
		$html .= "<ul><li ";
		if($curPage == 1)
			$html .= "class=\"disabled\"";
		$html .= " ><a";
		if($curPage != 1)
			$html .= " href=\"".$url."/".($curPage-1)."\" ";
		$html .= "><i class=\"icon-double-angle-left\"></i></a></li>";

		for($i=1;$i<=$pages;$i++){
			$html .= "<li";
			if($curPage == $i)
				$html .= " class=\"active\" ";
			$html .= "><a href=\"".$url."/".$i."\">".$i."</a></li>";
		}

		$html .= "<li";
		if($curPage == $pages)
			$html .= " class=\"disabled\" ";
		$html .= "><a";
		if($curPage != $pages)
			$html .= " href=\"".$url."/".($curPage+1)."\" ";
		$html .= "><i class=\"icon-double-angle-right\"></i></a></li></ul>";
		$html .= "</div>";	
		return $html;
	}

	public function getNav($path=""){
		$nav = AdminNav::get()->toArray();
		$data = array();
		foreach($nav as $value){
			if(strlen($value["path"])==2){
				$data[$value["path"]]["first"] = $value;
				$data[$value["path"]]["second"] = array();
			}
		}
		foreach($nav as $value){
			if(strlen($value["path"])==4){
				$key = substr($value["path"], 0, 2);
				$data[$key]["second"][$value["path"]] = $value;
			}
		}
		$html = "<ul class=\"nav nav-list\">";
		foreach($data as $key => $value){
			$html .= "<li";
			if($path==$value["first"]["path"]){
				$html .= " class=\"active\" ";
			}
			elseif(substr($path,0,2)==$value["first"]["path"]){
				$html .= " class=\"active open\" ";
			}
			$html .= ">";
			$html .= "<a ";
			if(!empty($value["second"])){
				$html .= "class=\"dropdown-toggle\" ";
			}
			$html .= "href=\"".$value["first"]["url"]."\">";
			$html .= "<i class=\"icon-dashboard\"></i>";
			$html .= "<span>".$value["first"]["name"]."</span>";
			if(!empty($value["second"]))
				$html .= "<b class=\"arrow icon-angle-down\"></b>";
			$html .= "</a>";
			if(!empty($value["second"])){
				$html .= "<ul class=\"submenu\">";
				foreach($value["second"] as $k => $v){
					$html .= "<li";
					if($path==$v["path"]){
						$html .= " class=\"active\" ";
					}
					$html .= ">";
					$html .= "<a href=\"".$v["url"]."\">";
					$html .= $v["name"];
					$html .= "<i class=\"icon-double-angle-right\"></i>";
					$html .= "</a>";
					$html .= "</li>";
				}	
				$html .= "</ul>";
			}
			$html .= "</li>";
		}
		$html .= "</ul>";
		return $html;
	}
}
