<?php

namespace Concrete\Package\TallacmansCopyright;
use Package;
use BlockType;

class Controller extends Package {

     protected $pkgHandle = 'tallacmans_copyright';
     protected $appVersionRequired = '5.7.5';
     protected $pkgVersion = '0.9.3';

     public function getPackageDescription() {
          return t("Display your legal copyright with style.");
     }

     public function getPackageName() {
          return t("Tallacmans Copyright");
     }

     public function install() {
         $pkg = parent::install();

          // install block
          BlockType::installBlockType('tallacmans_copyright', $pkg);
     }

}
