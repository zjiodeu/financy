<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserController
 *
 * @author mkardakov
 */
class UserController extends BaseController {

        public function addForm($id = null) {
            $user = (!is_null($id))?User::findOrFail($id) : new User();
            return View::make('user/addForm', [
                'user' => $user,
                'roles' => Role::all(['role', 'id'])->lists('role', 'id'),
                    ]);
        }
    
	public function show() {     
            $rows = User::showData();
            
            return View::make('user/show', ['rows' => $rows]);
        }
        
        public function add() {
            $input = Input::all();
            $validator = User::validate($input);
            if ($validator->fails()) {
                return Redirect::to('user/addForm')->withErrors($validator)->withInput();
            }
            $input['password'] = Hash::make($input['password']);
            User::create($input);
            return Redirect::to('user/addForm')
                    ->with('message', 'Профиль добавлен успешно')
                    ->withInput();
        }
        
        public function update($id) {
            $user = User::findOrFail($id);
            $input = Input::all();
            $validator = User::validate($input, false);
            if ($validator->fails()) {
                return Redirect::to("user/addForm/{$id}")->withErrors($validator)->withInput();
            }
            $user->fill($input);
            $user->save();
            return Redirect::to("user/addForm/{$id}")
                    ->with('message', 'Профиль обновлен успешно')
                    ->withInput();
        }
        
        public function delete($id) {
            $user = User::findOrFail($id);
            $user->delete();
            return Redirect::to('user/show');
        }
        
        public function auth() {
         /*   if (Auth::attempt([
                'username' => Input::get('username'), 
                'password' => Input::get('password')
                    ])) {
                return Redirect::back()->with('success', 1);
            } 
            return Redirect::back()->with('success', 0);*/
        }
        
        public function logout() {
            
        }

}
