<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Appointment
 * 
 * @property int $id
 * @property string|null $deleted_at
 * @property int|null $employee_id
 * @property string|null $appointment_type
 * @property string|null $subject
 * @property Carbon|null $appointment_date
 * @property string|null $location
 * @property string|null $notes
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Employee|null $employee
 *
 * @package App\Models
 */
class Appointment extends Model
{
	use SoftDeletes;

	protected $casts = [
		'employee_id' => 'int',
		'appointment_date' => 'datetime'
	];

	protected $guarded = [];

	public function employee()
	{
		return $this->belongsTo(Employee::class);
	}
}
