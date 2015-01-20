<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];
        
        protected $fillable = ['username', 'info', 'role', 'password'];
        
        public static function showData($limit = null) {
            return DB::table('users')
                    ->join('roles', 'users.role', '=', 'roles.id')
                    ->select('users.id', 'users.username', 'users.info', 'roles.role', 'users.created_at')
                    ->orderBy('users.username', 'ASC')->get();           
        }
        
        public static function validate($input, $withPassword = true) {
            $rules = [
                'username' =>['required'],
                'role' => ['required','integer', 'min:1'],
            ];
            if ($withPassword) {
                $rules['password'] = ['required','between:6,16'];
            }
            return Validator::make($input, $rules);
        }

}
