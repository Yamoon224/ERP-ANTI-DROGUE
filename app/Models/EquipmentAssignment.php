<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class EquipmentAssignment
 * 
 * @property int $id
 * @property string|null $deleted_at
 * @property int|null $employee_id
 * @property string|null $equipment_name
 * @property int|null $quantity
 * @property Carbon|null $assignment_date
 * @property string|null $notes
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Employee|null $employee
 *
 * @package App\Models
 */
class EquipmentAssignment extends Model
{
	use SoftDeletes;

	protected $casts = [
		'employee_id' => 'int',
		'quantity' => 'int',
		'assignment_date' => 'datetime'
	];

	protected $guarded = [];

	public function employee()
	{
		return $this->belongsTo(Employee::class);
	}
}
