<?php

class Controller_Sample extends Model_Common {

    public function action_index($key_name = 'sales') {

        $this->context[Model_Const::DATA]['sample'] = Model_Sample::find_all();
        $this->context[Model_Const::DATA]['key_name'] = $key_name;

        $this->template->title = "Samples";
        $this->viewContent('boot/boot', '管理テスト');

        //$this->template->content = View::forge('sample/index', $data);
    }

    public function action_view($id = null) {
        if ($id === null) {
            $this->redirect_page('sample');
        }

        $mongodb = \Mongo_Db::instance();
        $data['sample'] = $mongodb->get_view_datas($mongodb, 'samples', $id);

        $this->template->title = "Sample";
        //$this->template->content = //View::forge('sample/view', $data);
        $this->viewContent('sample/view');
    }

    public function action_create() {
        $this->redirect_page('sample');
        //
        if (Input::method() == 'POST') {
            $val = Model_Sample::validate('create');
            if ($val->run()) {
                $sample = Model_Sample::forge(array(
                            'id' => Input::post('id'),
                            'platform' => Input::post('platform'),
                            'site' => Input::post('site'),
                            'sales' => Input::post('sales'),
                            'member' => Input::post('member'),
                            'active' => Input::post('active'),
                        ));
                if ($sample and $sample->save()) {
                    Session::set_flash('success', 'Added sample #' . $sample->id . '.');
                    Response::redirect('sample');
                } else {
                    Session::set_flash('error', 'Could not save sample.');
                }
            } else {
                Session::set_flash('error', $val->error());
            }
        }

        $this->template->title = "Samples";
        $this->context = null;
        $this->viewContent('sample/create');
//		$this->template->content = View::forge('sample/create');
    }

    public function action_edit($id = null) {
        $this->redirect_page();
        //
        is_null($id) and Response::redirect('Sample');
        $sample = Model_Sample::find_one_by_id($id);
        if (Input::method() == 'POST') {
            $val = Model_Sample::validate('edit');

            if ($val->run()) {
                $sample->id = Input::post('id');
                $sample->platform = Input::post('platform');
                $sample->site = Input::post('site');
                $sample->sales = Input::post('sales');
                $sample->member = Input::post('member');
                $sample->active = Input::post('active');

                if ($sample->save()) {
                    Session::set_flash('success', 'Updated sample #' . $id);
                    Response::redirect('sample');
                } else {
                    Session::set_flash('error', 'Nothing updated.');
                }
            } else {
                Session::set_flash('error', $val->error());
            }
        }

        $this->template->set_global('sample', $sample, false);
        $this->template->title = "Samples";
        $this->context = null;
        $this->viewContent('sample/edit');
//		$this->template->content = View::forge('sample/edit');
    }

    public function action_delete($id = null) {
        $this->redirect_page('sample');
        //
        if ($sample = Model_Sample::find_one_by_id($id)) {
            $sample->delete();

            Session::set_flash('success', 'Deleted sample #' . $id);
        } else {
            Session::set_flash('error', 'Could not delete sample #' . $id);
        }

        Response::redirect('sample');
    }

}