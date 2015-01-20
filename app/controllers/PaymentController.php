<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PaymentController
 *
 * @author mkardakov
 */
class PaymentController extends BaseController {

    public function addForm($id = null) {
        $payment = (!is_null($id)) ? Payment::findOrFail($id) : new Payment();
        return View::make('payment/addForm', [
                    'payment' => $payment,
                    'paytypes' => Paytype::all(['id', 'name'])->lists('name', 'id'),
                    'users' => User::all(['username', 'id'])->lists('username', 'id'),
        ]);
    }

    public function show() {
        $rows = Payment::showData();

        return View::make('payment/show', ['rows' => $rows]);
    }

    public function add() {
        $input = Input::all();
        $validator = Payment::validate($input);
        if ($validator->fails()) {
            return Redirect::to('payment/addForm')->withErrors($validator)->withInput();
        }
        Payment::create($input);
        return Redirect::to('payment/addForm')
                        ->with('message', 'Данные добавлены успешно')
                        ->withInput();
    }

    public function update($id) {
        $payment = Payment::findOrFail($id);
        $input = Input::all();
        $validator = Payment::validate($input);
        if ($validator->fails()) {
            return Redirect::to("payment/addForm/{$id}")->withErrors($validator)->withInput();
        }
        $payment->fill($input);
        $payment->save();
        return Redirect::to("payment/addForm/{$id}")
                        ->with('message', 'Данные обновлены успешно')
                        ->withInput();
    }

    public function delete($id) {
        $payment = Payment::findOrFail($id);
        $payment->delete();
        return Redirect::to('payment/show');
    }

}
