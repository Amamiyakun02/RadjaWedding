<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BundlePenyewaanModel extends Model
{
    use HasFactory;

    protected $column_order = ['id']; // Kolom yang bisa diurutkan
    protected $column_search     = [
        'nama',
        'deskripsi'
    ];
    protected $order = ['id' => 'desc']; // Default order
    protected $request;
    protected $db;
    protected $dt;


    protected $table = 'bundle_penyewaan';

    protected $fillable = [
        'nama',
        'deskripsi',
        'total_harga',
    ];

    public function booking(): BelongsTo
    {
        return $this->belongsTo(BookingModel::class);
    }

    // Relationship with penyewaan table
    public function penyewaan(): HasMany
    {
        return $this->hasMany(PenyewaanModel::class);
    }

    // Relationship with bundle_barang table
    public function bundleBarang(): HasMany
    {
        return $this->hasMany(BundleBarangModel::class);
    }

    // Relationship with bundle_layanan table
    public function bundleLayanan(): HasMany
    {
        return $this->hasMany(BundleLayananModel::class);
    }

//    public function penyewaan()
//    {
//        return $this->hasMany(PenyewaanModel::class, 'BundleID');
//    }
//
//    public function bundleBarang()
//    {
//        return $this->hasMany(BundleBarangModel::class, 'bundle_id');
//    }

    public function __construct(array $attributes = [], Request $request = null)
    {
        parent::__construct($attributes);

        // Inisialisasi request dan koneksi database
        $this->request = $request ?: request(); // Gunakan request() jika $request null
        $this->db = DB::connection();
        $this->dt = $this->db->table($this->table);
    }

    private function getDatatablesQuery(Request $request)
    {
        $query = $this->newQuery();

        $searchValue = $request->input('search.value');
        if ($searchValue) {
            $query->where(function ($q) use ($searchValue) {
                foreach ($this->column_search as $i => $item) {
                    if ($i === 0) {
                        $q->where($item, 'like', "%{$searchValue}%");
                    } else {
                        $q->orWhere($item, 'like', "%{$searchValue}%");
                    }
                }
            });
        }

        if ($request->input('order')) {
            $orderColumn = $this->column_order[$request->input('order.0.column')];
            $orderDir = $request->input('order.0.dir');
            $query->orderBy($orderColumn, $orderDir);
        } else {
            $order = $this->order;
            $query->orderBy(key($order), $order[key($order)]);
        }

        return $query;
    }

    public function getDatatables(Request $request)
    {
        $query = $this->getDatatablesQuery($request);

        // Periksa apakah parameter length ada dan tidak sama dengan -1
        if ($request->input('length') != -1) {
            $query->limit($request->input('length'));
        }

        // Periksa apakah parameter start ada
        if ($request->input('start')) {
            $query->offset($request->input('start'));
        }

        return $query->get();
    }

    public function countFiltered(Request $request)
    {
        $query = $this->getDatatablesQuery($request);
        return $query->count();
    }

    public function countAll()
    {
        return $this->count();
    }

}
