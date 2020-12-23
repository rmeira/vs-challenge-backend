<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema()
 */
class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'brand',
        'value',
        'stock',
    ];

    /**
     * List Model Relations
     *
     * @var array
     */
    protected $relations = [
        //
    ];

    /**
     * @OA\Property(
     *     format="int64",
     *     description="ID",
     *     title="ID",
     * )
     * @var integer
     */
    private $id;

    /**
     * @OA\Property(
     *     description="name",
     *     title="name",
     *     required=true
     * )
     *
     * @var string
     */
    private $name;

    /**
     * @OA\Property(
     *     description="brand",
     *     title="brand",
     *     required=true
     * )
     *
     * @var string
     */
    private $brand;

    /**
     * @OA\Property(
     *     description="value",
     *     title="value",
     *     required=true
     * )
     *
     * @var float
     */
    private $value;

    /**
     * @OA\Property(
     *     description="stock",
     *     title="stock",
     *     required=true
     * )
     *
     * @var integer
     */
    private $stock;

    /**
     * @OA\Property(
     *     format="datetime",
     *     description="Created At",
     *     title="Created At",
     * )
     *
     * @var \Datetime
     */
    private $created_at;

    /**
     * @OA\Property(
     *     format="datetime",
     *     description="Update At",
     *     title="Update At",
     * )
     *
     * @var \Datetime
     */
    private $updated_at;

    /**
     * Scope for search on name or brand
     *
     * @param Builder $query
     * @param string $string
     * @return Builder
     */
    public function scopeNameOrBrand(Builder $query, $string): Builder
    {
        return $query->where('name', 'like', "%{$string}%")->orWhere('brand', 'like', "%{$string}%");
    }
}
