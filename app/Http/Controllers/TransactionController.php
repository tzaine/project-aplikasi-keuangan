<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Routing\Controller;
class TransactionController extends Controller
{
    public function downloadPdf()
    {
       $transactions = Transaction::with('category')
        ->orderBy('category_id')
        ->orderBy('date_transaction')
        ->get();

         $pdf = Pdf::loadView('exports.transactions_pdf', compact('transactions'));

         return $pdf->download('laporan-transaksi.pdf');
    }
}
