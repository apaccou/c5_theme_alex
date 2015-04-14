<?php
	defined('C5_EXECUTE') or die("Access Denied.");
/**
 * The controller for the Actualite block.
 *
 * @package Blocks
 * @subpackage Actualite
 * @author Alexandre PACCOU <a.paccou@coteo.com>
 * @copyright  Copyright (c) 2014 Coteo. (http://www.coteo.com)
 * @license    http://www.coteo.com/
 *
 */
	class ActualiteBlockController extends BlockController {

		protected $btTable = 'btActualite';
		protected $btInterfaceWidth = "600";
		protected $btInterfaceHeight = "400";
		protected $btCacheBlockRecord = true;
		protected $btCacheBlockOutput = true;
		protected $btCacheBlockOutputOnPost = true;
		protected $btCacheBlockOutputForRegisteredUsers = true;
		protected $btCacheBlockOutputLifetime = CACHE_LIFETIME;
		//protected $btWrapperClass = 'ccm-ui';

		public function getBlockTypeDescription() {
			return t("Bloc pour les actualités.");
		}

		public function getBlockTypeName() {
			return t("Actualite");
		}

		//déclaration des variables public
		//supprimer ces deux tests uniquement pour exemple $content et $source
		//public $content = "";
		//public $source = "";
		//public $navArray = array();
		//public $cParentIDArray = array();

		public function __construct($obj = null) {
			$c = Page::getCurrentPage();
			if (is_object($c)) {
			   $this->cID = $c->getCollectionID();
			   $this->cParentID = $c->getCollectionParentID();
			}

			parent::__construct($obj);
		}

		public function view(){
			//$this->set('content', $this->content);
			//$this->set('source', $this->source);
		}

		function getFileID() {return $this->fID;}
		function getFileObject() {
			return File::getByID($this->fID);
		}
		function getAltText() {return $this->altText;}
		function getExternalLink() {return $this->externalLink;}
		function getInternalLinkCID() {return $this->internalLinkCID;}
		function getLinkURL() {
			if (!empty($this->externalLink)) {
				return $this->externalLink;
			} else if (!empty($this->internalLinkCID)) {
				$linkToC = Page::getByID($this->internalLinkCID);
				return (empty($linkToC) || $linkToC->error) ? '' : Loader::helper('navigation')->getLinkToCollection($linkToC);
			} else {
				return '';
			}
		}

		public function save($args) {
			//$args['content'] = isset($data['content']) ? $data['content'] : '';
			//$args['source'] = isset($data['source']) ? $data['source'] : '';
			//$args['displayPagesIncludeSelf'] = $args['displayPagesIncludeSelf'] ? 1 : 0;
			//$args['displayPagesCID'] = $args['displayPagesCID'] ? $args['displayPagesCID'] : 0;

			parent::save($args);
		}

/*
		function getContent() {

			$con = array();
			foreach($this as $key => $value) {
				$con[$key] = $value;
			}
			return $con;
		}

		public function getChildPages($c) {


			$db = Loader::db();
			$r = $db->query("select cID from Pages where cParentID = ? order by cDisplayOrder asc", array($c->getCollectionID()));
			$pages = array();
			while ($row = $r->fetchRow()) {
				$pages[] = Page::getByID($row['cID'], 'ACTIVE');
			}
			return $pages;
		}

		function getParentParentID() {
			// this has to be the stupidest name of a function I've ever created. sigh
			$cParentID = Page::getCollectionParentIDFromChildID($this->cParentID);
			return ($cParentID) ? $cParentID : 0;
		}

*/

	}
