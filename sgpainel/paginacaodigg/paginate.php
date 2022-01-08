<?php
/*

// Title: Simple paginte funtion
// Author: kreoton @ http://www.kreoton.net
// Version: 1.0

Usage:

//include paginate funtion
include('paginate.php');

//get total pages number
$total = $db['result']['total_pages'];

//get curent page
$page = $_GET['p'];

//formate pagination layout

$format_pg = array (
	'start_tag'	=> '<ul>',					//pagination start tag
	'close_tag'	=> '</ul>',					//pagination end tag
	'a_open'	=> '<li>',					//a start tag
	'a_close'	=> '</li>',					//a end tag
	'a_curent'	=> ' style="color:red"',	//curent a tag style you can assign and class. NOTE: space should be added first!!!
	'url_q'		=> '?p=%d',					//if you using url rewrite and our url looks like index-22.html so simple url query write 'index-%d.html'
	'lang_next'	=> 'NEXT',					//for multilangage sites
	'lang_previous'	=> 'PREVIOUS',			//for multilangage sites
	'a_space'	=> '...',					//space between a tags in this case there is ...
	);

//finaly print pagination

echo paginate($page, $total, $format_pg);

*/

function paginate ($curent_page, $total_pages, $paginate_format = array())
{

	$format = array(
		'start_tag'	=> ($paginate_format['start_tag'] != '')?$paginate_format['start_tag']:'',
		'close_tag'	=> ($paginate_format['close_tag'] != '')?$paginate_format['close_tag']:'',
		'a_open'	=> ($paginate_format['a_open'] != '')?$paginate_format['a_open']:'',
		'a_curent'	=> ($paginate_format['a_curent'] != '')?$paginate_format['a_curent']:'',
		'a_close'	=> ($paginate_format['a_close'] != '')?$paginate_format['a_close']:'',
		'url_q'		=> ($paginate_format['url_q'] != '')?$paginate_format['url_q']:'?p=%d',
		'lang_next'	=> ($paginate_format['lang_next'] != '')?$paginate_format['lang_next']:'Next',
		'lang_previous'	=> ($paginate_format['lang_previous'] != '')?$paginate_format['lang_previous']:'Previous',
		'a_space'	=> ($paginate_format['a_space'] != '')?$paginate_format['a_space']:'...',
		);

	$paginate = $format['start_tag'].'';

	if ($total_pages > 0)
	{
		//print previos buttton
		if ($curent_page > 1)
		{
			$paginate .= $format['a_open'].'<a href="'.sprintf($paginate_format['url_q'], ($curent_page-1)).'">'.$format['lang_previous'].'</a>'.$format['a_close'];
		}

		if ($total_pages > 12)
		{
			//digg style
			if ($curent_page < 9)
			{
				for ($i=1; $i<=10; $i++)
				{
					$paginate .= $format['a_open'].'<a href="'.sprintf($paginate_format['url_q'], $i).'"'.(($i==$curent_page)?$paginate_format['a_curent']:'').'>'.$i.'</a>'.$format['a_close'];
				}
				$paginate .= $format['a_space'];
				$paginate .= $format['a_open'].'<a href="'.sprintf($paginate_format['url_q'], ($total_pages-1)).'">'.($total_pages-1).'</a>'.$format['a_close'];
				$paginate .= $format['a_open'].'<a href="'.sprintf($paginate_format['url_q'], $total_pages).'">'.$total_pages.'</a>'.$format['a_close'];
			}
			else
			{
				$paginate .= $format['a_open'].'<a href="'.sprintf($paginate_format['url_q'], 1).'">1</a>'.$format['a_close'];
				$paginate .= $format['a_open'].'<a href="'.sprintf($paginate_format['url_q'], 2).'">2</a>'.$format['a_close'];
				$paginate .= $format['a_space'];

				if ($curent_page > ($total_pages-9))
				{
					for ($i=($total_pages-9); $i<=$total_pages; $i++)
					{
						$paginate .= $format['a_open'].'<a href="'.sprintf($paginate_format['url_q'], $i).'"'.(($i==$curent_page)?$paginate_format['a_curent']:'').'>'.$i.'</a>'.$format['a_close'];
					}
				}
				else
				{
					for ($i=($curent_page-5); $i<=$curent_page+5; $i++)
					{
						$paginate .= $format['a_open'].'<a href="'.sprintf($paginate_format['url_q'], $i).'"'.(($i==$curent_page)?$paginate_format['a_curent']:'').'>'.$i.'</a>'.$format['a_close'];
					}
					$paginate .= $format['a_space'];
					$paginate .= $format['a_open'].'<a href="'.sprintf($paginate_format['url_q'], ($total_pages-1)).'">'.($total_pages-1).'</a>'.$format['a_close'];
					$paginate .= $format['a_open'].'<a href="'.sprintf($paginate_format['url_q'], $total_pages).'">'.$total_pages.'</a>'.$format['a_close'];
				}
			}
		}
		else
		{
			for ($i=1; $i<=$total_pages; $i++)
			{
				$paginate .= $format['a_open'].'<a href="'.sprintf($paginate_format['url_q'], $i).'"'.(($i==$curent_page)?$paginate_format['a_curent']:'').'>'.$i.'</a>'.$format['a_close'];
			}
		}
		//print next buttton
		if ($curent_page < $total_pages )
		{
			$paginate .= $format['a_open'].'<a href="'.sprintf($paginate_format['url_q'], ($curent_page+1)).'">'.$format['lang_next'].'</a>'.$format['a_close'];
		}
	}

	return $paginate.$format['close_tag'];
}

// array da paginação ou css do mesmo

$format_pg = array (
	'start_tag'	=> '<div class="pages"><span class="nextprev">',   //Tag inicial de paginação
	'close_tag'	=> '</span</div>',					//Tag final da paginação
	'a_open'	=> '',					//a Tag inicial
	'a_close'	=> '',					//a Tag final
	'a_curent'	=> ' style="color:red; background:#FFEE00"',	//Tag da página atual. NOTA: carcter de espaço deve estar no inicio !!!
	'url_q'		=> '?p=%d',					// Link
	'lang_next'	=> '>>',					//Para multiidiomas
	'lang_previous'	=> '<<',			//Para sites multidiomas
	'a_space'	=> '<span>...</span>',					//Espaço  ... entre as paginas
	
	);


?>