<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Employee
 * 
 * @property int $id
 * @property string|null $deleted_at
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string|null $email
 * @property string|null $phone
 * @property string|null $grade
 * @property string|null $role
 * @property string $employee_type
 * @property string|null $status
 * @property Carbon|null $hire_date
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Appointment[] $appointments
 * @property Collection|Arrest[] $arrests
 * @property Collection|EquipmentAssignment[] $equipment_assignments
 * @property Collection|Hearing[] $hearings
 * @property Collection|User[] $users
 *
 * @package App\Models
 */
class Employee extends Model
{
	use SoftDeletes;

	protected $casts = [
		'hire_date' => 'datetime'
	];

	protected $guarded = [];

	public function appointments()
	{
		return $this->hasMany(Appointment::class);
	}

	public function arrests()
	{
		return $this->hasMany(Arrest::class, 'officer_id');
	}

	public function equipment_assignments()
	{
		return $this->hasMany(EquipmentAssignment::class);
	}

	public function hearings()
	{
		return $this->hasMany(Hearing::class, 'officer_id');
	}

	public function users()
	{
		return $this->hasMany(User::class);
	}
}
