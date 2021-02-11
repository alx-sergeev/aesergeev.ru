<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

/**
 * @global CMain $APPLICATION
 */

global $APPLICATION;

//delayed function must return a string
if(empty($arResult))
	return "";

$strReturn = '';
$strReturn .= '<section class="w3l-blog-breadcrum"><div class="breadcrum-bg py-sm-5 py-4"><div class="container py-lg-3">';
$strReturn .= '<h2>' . $APPLICATION->GetTitle() . '</h2>';
$strReturn .= '<p>';

$itemSize = count($arResult);
for($index = 0; $index < $itemSize; $index++)
{
	$title = htmlspecialcharsex($arResult[$index]["TITLE"]);
	$arrow = ($index > 0? '<i class="fa fa-angle-right"></i>' : '');

	if($arResult[$index]["LINK"] <> "" && $index != $itemSize-1)
	{
		$strReturn .= '<a href="'.$arResult[$index]["LINK"].'">' . $title . '</a>' . '&nbsp; - &nbsp;';
	}
	else
	{
		$strReturn .= $title;
	}
}

$strReturn .= '</p></div></div></section>';

return $strReturn;