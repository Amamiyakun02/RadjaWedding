<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookingModel extends Model
{
    use HasFactory;
    protected $table = 'bookings';
    protected $fillable = [
        'UserID',
        'tanggal_pemesanan',
        'tanggal_layanan',
        'total_harga',
        'status',
        'BundleID',
    ];

    public function user()
    {
        return $this->belongsTo(UserModel::class, 'UserID');
    }

    public function detailBookings()
    {
        return $this->hasMany(DetailBookingModel::class, 'BookingID');
    }

    public function bundlePenyewaan()
    {
        return $this->belongsTo(BundlePenyewaanModel::class, 'BundleID');
    }
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
