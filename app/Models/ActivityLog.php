<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;

class ActivityLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'user_name',
        'action',
        'action_type',
        'description',
        'subject_type',
        'subject_id',
        'properties',
        'ip_address',
        'user_agent',
    ];

    protected $casts = [
        'properties' => 'array',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Helper cepat untuk mencatat aktivitas sistem / admin.
     */
    public static function record(
        string $action,
        string $description,
        ?string $actionType = null,
        mixed $subject = null,
        ?array $properties = null,
        ?User $user = null
    ): self {
        $actor = $user ?? Auth::user();

        if (! $actionType) {
            $prefix = explode('.', $action)[0] ?? 'system';
            $actionType = match ($prefix) {
                'auth'                                                  => 'auth',
                'consultation'                                          => 'consultation',
                'service', 'audience', 'competency', 'testimonial'      => 'master_data',
                default                                                 => 'system',
            };
        }

        $subjectType = null;
        $subjectId = null;

        if ($subject instanceof Model) {
            $subjectType = get_class($subject);
            $subjectId = $subject->getKey();
        }

        try {
            $ip = request()?->ip();
            $ua = request()?->userAgent();
        } catch (\Throwable) {
            $ip = null;
            $ua = null;
        }

        return self::create([
            'user_id'      => $actor?->id,
            'user_name'    => $actor?->name ?? ($actor ? 'User #' . $actor->id : 'Publik / Sistem'),
            'action'       => $action,
            'action_type'  => $actionType,
            'description'  => $description,
            'subject_type' => $subjectType,
            'subject_id'   => $subjectId,
            'properties'   => $properties,
            'ip_address'   => $ip,
            'user_agent'   => $ua ? mb_substr($ua, 0, 500) : null,
        ]);
    }

    public function getActionTypeLabelAttribute(): string
    {
        return match ($this->action_type) {
            'auth'        => 'Autentikasi',
            'consultation'=> 'Konsultasi (Leads)',
            'master_data' => 'Data Website',
            'system'      => 'Sistem',
            default       => ucfirst($this->action_type),
        };
    }

    public function getActionBadgeClassAttribute(): string
    {
        return match ($this->action_type) {
            'auth'        => 'bg-blue-50 text-blue-700 ring-1 ring-blue-600/20',
            'consultation'=> 'bg-emerald-50 text-emerald-700 ring-1 ring-emerald-600/20',
            'master_data' => 'bg-purple-50 text-purple-700 ring-1 ring-purple-600/20',
            'system'      => 'bg-slate-100 text-slate-700 ring-1 ring-slate-300',
            default       => 'bg-slate-50 text-slate-700 ring-1 ring-slate-200',
        };
    }
}
