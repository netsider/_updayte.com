<?php
	
	$counter = 1;
	include_once('simple_html_dom.php');
	$target_url = "http://www.amazon.com/b/ref=MoviesHP_H1_Preorders?ie=UTF8&node=7353051011&pf_rd_m=ATVPDKIKX0DER&pf_rd_s=merchandised-search-1&pf_rd_r=0V740W5F4HXYF8B5P3R0&pf_rd_t=101&pf_rd_p=1713805182&pf_rd_i=2625373011";
	$html = new simple_html_dom();
	$html->load_file($target_url);
	foreach($html->find('a') as $link)
	{
	if (strpos($link,'www.amazon.com') !== false) {
	$newurl = $link->href;
	$newpage = file_get_html($newurl);
 	$avail = $newpage->find('span[class=availOrange]');
	$title = $newpage->find('td[class=tmm_bookTitle  noLinkDecoration  ]');
	$ptitle = $newpage->find('span[id=btAsinTitle]');
		if (strpos($avail[0],'released') !== false) 
		{
			if (!isset($title[0]))
			{
			$title[0] = $ptitle[0];
			}
		echo $counter . '. <a href="' . $link->href . '">' . $title[0] . '</a><br/>';
		echo 'Release Date: ' . $avail[0] . "<br />";
		$counter++;
		}
	}
	}
	include "debugger.php";
?>
