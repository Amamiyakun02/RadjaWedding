<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BookingModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class BookingController extends Controller
{
    public function index(Request $request)
    {

        $bookingModel = new BookingModel;
        if ($request->isMethod('post')) {
            $lists = $bookingModel->getDatatables($request);
            $data = [];
            $no = $request->input('start');

            for ($i = 0; $i < 1; $i++) {
                $no++;
                $row = [];
                $row[] = $no;
                $row[] = 'maireza';
                $row[] = '1950-01-01';
                $row[] = 'Pending';
                $row[] = 'Paket Wedding';
                $row[] = 'Rp. 40.000,00';
                $row[] = '<button onClick="editBooking()" class="btn btn-primary"><i class="fas fa-pencil-alt"></i></button>
                          <button onClick="hapusBooking()" class="btn btn-danger"><i class="fas fa-trash"></i></button>';
                $data[] = $row;
            }

            $output = [
                'draw' => $request->input('draw'),
                'recordsTotal' => 1,
                'recordsFiltered' => 1,
                'data' => $data,
            ];

            return Response::json($output);
        }
    }
}
