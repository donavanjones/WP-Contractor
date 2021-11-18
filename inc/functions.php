<?php
//////////////////////////////////////////////
// Dom Parser
// By: Donavan Jones
//////////////////////////////////////////////

/////////////////////////////////////////////////////////////

//////////////////////////////////////////////
//sets the last modified header
//////////////////////////////////////////////
function setLastModified($last_modified=NULL)
{
    $page_modified=getlastmod();

    if(empty($last_modified) || ($last_modified < $page_modified))
    {
        $last_modified=$page_modified;
    }
    $header_modified=filemtime(__FILE__);
    if($header_modified > $last_modified)
    {
        $last_modified=$header_modified;
    }
    header('Last-Modified: ' . date("r",$last_modified));
    return $last_modified;
}
class fbBot
{
	public $html;
	public $dom;
	public $internalErrors;
	public $finder;

	function __construct() {
    $this->html = $this->curPageURL();
		$this->dom = new DomDocument();
		// set error level
		$this->internalErrors = libxml_use_internal_errors(true);
		$this->dom->loadHTMLFile($this->html);
		// Restore error level
		libxml_use_internal_errors($this->internalErrors);
		$this->dom->formatOutput = true;
		$this->finder = new DomXPath($this->dom);
    }
	//////////////////////
	//Get the current page
	//////////////////////
	function curPageURL()
	{
		$pageURL = 'https';
		//if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
		$pageURL .= "://";
		if ($_SERVER["SERVER_PORT"] != "443")
		{
			$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
			} else {
			$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
		}

		$last = $pageURL[strlen($pageURL)-1];

		if($last == "/" || $last == "m")
		{
			return "index.php";
		}else{
			return basename($_SERVER['PHP_SELF']);
		}
	}
	/////////////////////////////////////////////////
	//get the image with a class of facebook-og-image
	////////////////////////////////////////////////
	function get_og_image()
	{
		$classname="facebook-og-image";
		$imgs = $this->finder->query("//*[contains(concat(' ', normalize-space(@class), ' '), ' $classname ')]");
		$contentImage = $this->finder->query("//div[@id='content']//img[contains(@class, '')]");
		$root = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/';
		$customSocialImage = $imgs->item(0);

		foreach($contentImage as $tag)
		{
			$imagepaths[]=urldecode($tag->getAttribute('src'));
		}

		if(!empty($imagepaths[0]) )
		{
			$imageWidth = getimagesize($imagepaths[0]);
			$imageHeight = getimagesize($imagepaths[0]);

      $imageX = $imageWidth[0];
  		$imageY = $imageWidth[1];

		}




		if( $customSocialImage)
		{
			$og_image = $imgs->item(0)->getAttribute('src');
			echo($og_image);
		}elseif( (isset($imagepaths[0])) && ($imageX >= 200) && ($imageY >= 200) )
		{
			echo($imagepaths[0]);
		}else{
			$defaultImage =  $root . "images/facebook/water-testing.jpg";
			$defaultImageNoWhiteSpace = str_replace(' ', '', $defaultImage);
			echo($defaultImageNoWhiteSpace);
		}
	}
	//////////////////////////////////////////////
	//get the h1 with a class of facebook-og-title
	//////////////////////////////////////////////
	function get_og_title()
	{

		$classname="facebook-og-title";
		$customTitle = $this->finder->query("//*[contains(concat(' ', normalize-space(@class), ' '), ' $classname ')]");
		$contentTitle = $this->finder->query("//div[@id='content']//h1");

		// iterate all matched nodes and save them as HTML to a buffer
		//custom title
		$result = '';
		foreach ($customTitle as $tag)
		{
		 $src=urldecode($tag->textContent);
		}

		//content title
		foreach($contentTitle as $tag)
		{
			$contentTitles[]=urldecode($tag->textContent);
		}

		if(!empty($src))
		{
			echo($src);
		}elseif(isset($contentTitles)){
			echo($contentTitles[0]);
		}else{
				//default title
				echo($this->getTitle($this->html));
			}
	}
	////////////////////////////////////////////////////
	//get the contents of the title tag
	////////////////////////////////////////////////////
	function getTitle($url)
	{
		$data = file_get_contents($url);
		$title = preg_match('/<title[^>]*>(.*?)<\/title>/ims', $data, $matches) ? $matches[1] : null;
		return $title;
	}
	////////////////////////////////////////////////////
	//get the paragraph with a class of facebook-og-desc
	////////////////////////////////////////////////////
	function get_og_desc()
	{

		$classname="facebook-og-desc";
		$customDesc = $this->finder->query("//p[contains(@class, 'facebook-og-desc')]");
		$contentDesc = $this->finder->query("//div[@id='content']//p");

		// iterate all matched nodes and save them as HTML to a buffer
		//custom desc
		$result = '';
		foreach ($customDesc as $tag)
		{
			$desc=urldecode($tag->textContent);
		}

		//content desc
		foreach($contentDesc as $tag)
		{
			$contentDescs[]=urldecode($tag->textContent);
		}

		if(!empty($desc))
		{
			echo(substr($desc,0,300)."...");
		}elseif(isset($contentDescs)){
			echo(substr($contentDescs[0],0,300)."...");

		}else{
				//default desc
				$tags = get_meta_tags($this->curPageURL());
				echo($tags['description']);
			}
	}

}
?>
