<?php

namespace App\Extensions\Events\InvoiceReminder;

use App\Classes\Extensions\Gateway;
use App\Helpers\NotificationHelper;
use App\Models\Invoice;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class InvoiceReminder extends Gateway
{
    /**
    * Get the extension metadata
    * 
    * @return array
    */
    public function getMetadata()
    {
        return [
            'display_name' => 'Invoice Reminder',
            'version' => '1.0.0',
            'author' => 'Vaibhav Dhiman',
            'website' => 'https://github.com/VaibhavSys/ATLOS-Paymenter-Extension',
        ];
    }
    
    /**
    * Get all the configuration for the extension
    * 
    * @return array
    */
    public function getConfig()
    {
        return [];
    }
    
    public static function sendInvoiceReminder($invoiceId)
    {
        $invoice = Invoice::find($invoiceId);
        $user = User::find($invoice->user_id);
        NotificationHelper::sendUnpaidInvoiceNotification($invoice, $user);
        Log::info('Invoice reminder sent for invoice ID: ' . $invoiceId);
    }
}
