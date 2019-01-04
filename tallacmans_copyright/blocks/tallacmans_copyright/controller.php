<?php
namespace Concrete\Package\TallacmansCopyright\Block\TallacmansCopyright;


use Concrete\Core\Block\BlockController;
use Core;

class Controller extends BlockController
{
    public $helpers = array('form');
    public $btFieldsRequired = array();
    protected $btExportFileColumns = array();
    protected $btExportPageColumns = array();
    protected $btTable = 'btTallacmansCopyright';
    protected $btInterfaceWidth = 400;
    protected $btInterfaceHeight = 250;
    // protected $btIgnorePageThemeGridFrameworkContainer = false;
    // protected $btCacheBlockRecord = true;
    // protected $btCacheBlockOutput = true;
    // protected $btCacheBlockOutputOnPost = true;
    // protected $btCacheBlockOutputForRegisteredUsers = true;
    // protected $btCacheBlockOutputLifetime = 0;
    protected $btDefaultSet = 'form';
    // protected $pkg = false;

    public function getBlockTypeDescription()
    {
        return t("A customizable copyright notice for your site.");
    }

    public function getBlockTypeName()
    {
        return t("Tallacmans Copyright");
    }

    public function getSearchableContent()
    {
        $content = array();
        $content[] = $this->copyrightStart;
        $content[] = $this->copyrightHolder;
        return implode(" ", $content);
    }

    public function add()
    {
        $this->addEdit();
    }

    public function edit()
    {
        $this->addEdit();
    }

    protected function addEdit()
    {
        $this->set('btFieldsRequired', $this->btFieldsRequired);
        $this->set('identifier_getString', Core::make('helper/validation/identifier')->getString(18));
    }

    public function save($args)
    {
        $args['copyrightStart'] = trim($args['copyrightStart']) != "" ? number_format(floatval(str_replace(',', '.', $args['copyrightStart'])), 0, ".", "") : "";
        parent::save($args);
    }

    public function validate($args)
    {
        $thisYear = date("Y");
        $e = Core::make("helper/validation/error");
        if (trim($args['copyrightStart']) != "") {
            $args['copyrightStart'] = str_replace(',', '.', $args['copyrightStart']);

        if (!ctype_digit($args['copyrightStart'])) {
                $e->add(t("The %s field has to be an integer (float number disallowed).", t("Year copyright started")));
            }
        if($args["copyrightStart"] < 1900){
        		$e->add(t('Year must be at least 1900.'));
        	}
        if($args["copyrightStart"] > $thisYear){
                $e->add(t('Start year can\'t be in the future.'));
            }
        if(strlen($args['copyrightHolder']) >= 70){
            	$e->add(t('Copyright holder text must be shorter that 70 characters.'));
            }
        }
        return $e;
    }

    public function composer()
    {
        $this->edit();
    }
}
