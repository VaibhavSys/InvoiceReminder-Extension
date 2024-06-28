#!/bin/bash
curl -o tmp-index.blade.php.patch https://github.com/VaibhavSys/InvoiceReminder-Extension/raw/master/index.blade.php.patch
patch themes/default/views/admin/invoices/index.blade.php < index.blade.php.patch
rm tmp-index.blade.php.patch