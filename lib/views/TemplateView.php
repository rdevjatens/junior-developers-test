<?php

/*This class is used to show page title, logo text and so on...*/

class TemplateView extends TemplateModel {

  public function showName() {
    echo $this->setPageName();
  }

  public function showPageContent() {
    include $this->setPageContent();
  }
}
