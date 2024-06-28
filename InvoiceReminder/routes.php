<?php

use Illuminate\Support\Facades\Route;
use App\Models\Invoice;
use App\Models\User;
use Illuminate\Http\Request;
use App\Extensions\Events\InvoiceReminder\InvoiceReminder;


Route::post('/invoicereminder/send-reminder', function(Request $request) {
    $invoice_id = $request->input('invoice_id');
    $invoice = Invoice::find($invoice_id);
    if (!$invoice) {
        return redirect()->route('InvoiceReminder.remind')->with('error', 'Invoice not found');
    }
    $user = User::find($invoice->user_id);
    if (!$user) {
        return redirect()->route('InvoiceReminder.remind')->with('error', 'User not found');
    }
    InvoiceReminder::sendInvoiceReminder($invoice_id);
    return redirect()->route('InvoiceReminder.remind')->with('success', 'Reminder sent successfully');

})->middleware(['permission:ADMINISTRATOR'])->name('InvoiceReminder.send-reminder');

Route::get('/invoicereminder/remind', function() {
    return view('InvoiceReminder::remind');
})->middleware(['permission:ADMINISTRATOR'])->name('InvoiceReminder.remind');