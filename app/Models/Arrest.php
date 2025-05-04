<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Arrest
 * 
 * @property int $id
 * @property string|null $deleted_at
 * @property string|null $suspect_name
 * @property Carbon|null $arrest_date
 * @property string|null $arrest_location
 * @property string|null $reason
 * @property string|null $arrest_type
 * @property int|null $officer_id
 * @property bool|null $resistance
 * @property string|null $injuries
 * @property bool|null $witness_present
 * @property string|null $witness_name
 * @property string|null $follow_up
 * @property string|null $report_file
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Employee|null $employee
 *
 * @package App\Models
 */
class Arrest extends Model
{
	use SoftDeletes;

	protected $casts = [
		'arrest_date' => 'datetime',
		'officer_id' => 'int',
		'resistance' => 'bool',
		'witness_present' => 'bool'
	];

	protected $guarded = [];

	public function employee()
	{
		return $this->belongsTo(Employee::class, 'officer_id');
	}
}
