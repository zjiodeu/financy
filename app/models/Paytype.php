<?php

class Paytype extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'pay_types';
        
        public $timestamps = false;
        
        public $fillable = ['name', 'cost'];
        

        public static function validate($input) {
            $rules = [
                'name' => ['required','alpha_dash'],
                'cost' => ['required','integer', 'min:1'],
            ];
            return Validator::make($input, $rules);
        }
}