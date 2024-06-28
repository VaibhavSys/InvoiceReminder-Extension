#!/bin/bash
curl -o tmp-index.blade.php.patch https://raw.githubusercontent.com/VaibhavSys/InvoiceReminder-Extension/master/index.blade.php.patch
patch themes/default/views/admin/invoices/index.blade.php < tmp-index.blade.php.patch
rm tmp-index.blade.php.patch