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
 * Class Summon
 * 
 * @property int $id
 * @property string|null $deleted_at
 * @property string|null $person_name
 * @property string|null $person_contact
 * @property string|null $fingerprint_hash
 * @property string|null $photo_profile
 * @property string|null $photo_left_angle
 * @property string|null $photo_right_angle
 * @property string|null $reason
 * @property Carbon|null $scheduled_date
 * @property string|null $status
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Hearing[] $hearings
 *
 * @package App\Models
 */
class Summon extends Model
{
	use SoftDeletes;

	protected $casts = [
		'scheduled_date' => 'datetime'
	];

	protected $guarded = [];

	public function hearings()
	{
		return $this->hasMany(Hearing::class);
	}
}
