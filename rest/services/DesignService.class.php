<?php
require_once __DIR__.'/BaseService.class.php';
require_once __DIR__.'/../dao/DesignDao.class.php';

class DesignService extends BaseService{

  public function __construct(){
    parent::__construct(new DesignDao());
  }

  public function get_designs_by_note_id($note_id){
    return $this->dao->get_designs_by_note_id($note_id);
  }
}
?>
