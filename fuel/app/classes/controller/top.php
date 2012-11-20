<?php
//時間があったら作るtopページ用のcontroller
class Controller_Top extends Model_Common {
    public function action_index() {
        $this->template->title = Model_Const::TITLE;
        $this->viewContent('top/index');
    }
}
?>
