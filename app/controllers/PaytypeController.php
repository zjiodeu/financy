<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PaytypeController
 *
 * @author mkardakov
 */
class PaytypeController extends BaseController {

        public function addForm($id = null) {
            $paytype = (!is_null($id))?Paytype::findOrFail($id) : new Paytype();
            return View::make('paytype/addForm', [
                'paytype' => $paytype,
                    ]);
        }
    
	public function show() {            
            return View::make('paytype/show', ['rows' => Paytype::all()]);
        }
        
        public function add() {
            $input = Input::all();
            $validator = Paytype::validate($input);
            if ($validator->fails()) {
                return Redirect::to('paytype/addForm')->withErrors($validator)->withInput();
            }
            Paytype::create($input);
            return Redirect::to('paytype/addForm')
                    ->with('message', 'Данные добавлены успешно')
                    ->withInput();
        }
        
        public function update($id) {
            $paytype = Paytype::findOrFail($id);
            $input = Input::all();
            $validator = Paytype::validate($input);
            if ($validator->fails()) {
                return Redirect::to("paytype/addForm/{$id}")->withErrors($validator)->withInput();
            }
            $paytype->fill($input);
            $paytype->save();
            return Redirect::to("paytype/addForm/{$id}")
                    ->with('message', 'Данные обновлены успешно')
                    ->withInput();
        }
        
        public function delete($id) {
            $paytype = Paytype::findOrFail($id);
            $paytype->delete();
            return Redirect::to('paytype/show');
        }

}
