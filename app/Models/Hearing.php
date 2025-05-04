<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Hearing
 * 
 * @property int $id
 * @property string|null $deleted_at
 * @property string|null $suspect_name
 * @property int|null $officer_id
 * @property int|null $summon_id
 * @property Carbon|null $hearing_date
 * @property string|null $location
 * @property string|null $topic
 * @property string|null $statement
 * @property bool|null $lawyer_present
 * @property string|null $lawyer_name
 * @property int|null $duration_minutes
 * @property string|null $transcript_file
 * @property string|null $result
 * @property string|null $remarks
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Employee|null $employee
 * @property Summon|null $summon
 *
 * @package App\Models
 */
class Hearing extends Model
{
	use SoftDeletes;

	protected $casts = [
		'officer_id' => 'int',
		'summon_id' => 'int',
		'hearing_date' => 'datetime',
		'lawyer_present' => 'bool',
		'duration_minutes' => 'int'
	];

	protected $guarded = [];

	public function employee()
	{
		return $this->belongsTo(Employee::class, 'officer_id');
	}

	public function summon()
	{
		return $this->belongsTo(Summon::class);
	}
}
