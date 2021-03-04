<?php
class Parser
{
	public $link;
	
	public function __construct($link)
	{
		$this->link=@file_get_contents($link);
		
		if(!$this->link)
		{
			echo "Не получается открыть файл загрузки!";
			exit;
		}
	}
	
	
	public function getAllItems($start_tag, $end_tag)
	{
		preg_match_all("/($start_tag)(.*)($end_tag)/Ums", $this->link, $items, PREG_SET_ORDER);
		$i = 1;
		foreach ( $items as $item) 
			{
				$i++;
				$positions[] = $item[2]; 
				if($i>10){break;}
			}
			
			if(@count($positions)==0)
			{
				echo "Файл не содержит позиций!";
				exit;
			}
			
			
			return $positions;
	}
	
	
	
}