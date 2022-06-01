<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Orchid\Attachment\Attachable;
use Orchid\Filters\Filterable;
use Orchid\Metrics\Chartable;
use Orchid\Screen\AsSource;

/**
 * @property integer $id
 * @property string $client_name
 * @property string $client_phone
 * @property string $reason
 * @property string $format
 * @property integer $guest_count
 * @property string $status
 * @property Carbon $event_date
 * @property string $city
 * @property string $street
 * @property string $building
 * @property string $payment_type
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Order extends Model
{
    use HasFactory,AsSource, Attachable, Filterable, Chartable;

    public const STATUS_NEW = 'new';
    public const STATUS_PAID = 'paid';
    public const STATUS_SEND = 'send';
    public const STATUS_CANCELED = 'canceled';

    protected $casts = [
        'event_date' => 'datetime:Y-m-d'
    ];

    protected $fillable = [
        'user_id',
        'client_name',
        'client_phone',
        'reason',
        'format',
        'guest_count',
        'status',
        'event_date',
        'city',
        'street',
        'building',
        'payment_type',
    ];

    /**
     * @var array
     */
    protected $allowedFilters = [
        'user_id',
        'client_name',
        'client_phone',
        'reason',
        'format',
        'guest_count',
        'status',
        'event_date',
        'city',
        'street',
        'building',
        'payment_type',
    ];

    /**
     * @var array
     */
    protected $allowedSorts = [
        'user_id',
        'client_name',
        'client_phone',
        'reason',
        'format',
        'guest_count',
        'status',
        'event_date',
        'city',
        'street',
        'building',
        'payment_type',
    ];

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class)->withPivot('count');
    }

    public static function getStatusList()
    {
        return [
            'new'      => 'Новый',
            'paid'     => 'Оплачен',
            'send'     => 'Отправлен',
            'canceled' => 'Отменен',
        ];
    }

    protected function getStatusNameAttribute(): string
    {
        return self::getStatusList()[$this->status];
    }

    public function getTotalPriceAttribute(): int
    {
        $total = 0;
        foreach ($this->products as $product) {
            $total+= $product->price_per_unit * $product->pivot->count;
        }
        return $total;
    }
}
