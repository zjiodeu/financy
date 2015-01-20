<?php

class Payment extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'payments';
        
        protected $fillable = ['type', 'amount', 'receiver_id', 'date', 'payer_id'];
        
        public $timestamps = false;
        
        public static function showData($limit = null) {
            return DB::table('payments')
                    ->join('pay_types', 'payments.type', '=', 'pay_types.id')
                    ->join('users as pu', 'payments.payer_id', '=', 'pu.id')
                    ->join('users as ru', 'payments.receiver_id', '=', 'ru.id')
                    ->select('payments.id','payments.amount', 'payments.date', 'pay_types.name', 'pu.username as payername', 'ru.username as receivername')
                    ->orderBy('payments.date', 'DESC')->get();
                               /* $queries = DB::getQueryLog();
                    $last_query = end($queries);
                    var_dump($last_query);
                    exit();*/
        }
        
        public static function validate($input) {
            $rules = [
                'type' => ['required','integer', 'min:1'],
                'amount' => ['required','numeric','min:1'],
                'receiver_id' => ['required','integer', 'min:1'],
                'date' => 'required|date',
                'payer_id' => ['required','integer', 'min:1'],
            ];
            return Validator::make($input, $rules);
        }

}