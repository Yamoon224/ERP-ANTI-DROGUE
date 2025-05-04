<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class IncomingMail
 * 
 * @property int $id
 * @property string|null $deleted_at
 * @property string|null $sender_name
 * @property string|null $subject
 * @property string|null $content
 * @property Carbon|null $reception_date
 * @property string|null $reference_code
 * @property string|null $attached_file
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class IncomingMail extends Model
{
	use SoftDeletes;

	protected $casts = [
		'reception_date' => 'datetime'
	];

	protected $guarded = [];
}
