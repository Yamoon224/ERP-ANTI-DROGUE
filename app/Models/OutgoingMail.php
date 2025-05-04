<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class OutgoingMail
 * 
 * @property int $id
 * @property string|null $deleted_at
 * @property string|null $receiver_name
 * @property string|null $subject
 * @property string|null $content
 * @property Carbon|null $send_date
 * @property string|null $reference_code
 * @property string|null $attached_file
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class OutgoingMail extends Model
{
	use SoftDeletes;
	protected $table = 'outgoing_mails';

	protected $casts = [
		'send_date' => 'datetime'
	];

	protected $guarded = [];
}
