<?php

namespace App\Models;

use App\Models\Division;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Model
{
    /** @use HasFactory<\Database\Factories\EmployeeFactory> */
    use HasFactory;

    // protected $with = [
    //     'user',
    //     'division'
    // ];

    protected $fillable = [
        'name',
        'employee_code',
        'whatsapp_number',
        'address',
        'pos_code',
        'user_id',
        'division_id'
    ];

    public function division(): BelongsTo
    {
        return $this->belongsTo(Division::class);
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function scopeSearch($query, $search = null)
    {
        if ($search) {
            return  $query->whereHas('user', function ($query) use ($search) {
                $query->where('email', $search);
            })
                ->orWhere('name', 'like', '%' . $search . '%');
        }
    }
    public function scopeFilters($query, array $filters)
    {
        // if ($filters['search']) {
        //     $search = $filters['search'];
        // }
        // dd($filters);

        $query->when($filters['search'] ?? false, function ($query, $search) {

            return $query->where(function ($query) use ($search) {

                $query->whereHas('user', function ($query) use ($search) {
                    $query->where('email', $search);
                })
                    ->orWhere('name', 'like', '%' . $search . '%');
            });
        });

        $query->when($filters['division'] ?? false, function ($query, $id) {
            return  $query->where('division_id', $id);
        });
    }
}
