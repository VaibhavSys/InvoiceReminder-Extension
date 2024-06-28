<x-admin-layout>
    <x-slot name="title">
        {{ __('Invoice Reminder') }}
    </x-slot>

    <div class="flex flex-row justify-between w-full mb-2">
        <div class="text-2xl leading-5 mt-1 font-bold dark:text-darkmodetext">
            {{ __('Enter Invoice ID') }}
        </div>
    </div>

    <form action="{{ route('InvoiceReminder.send-reminder') }}" method="POST">
        @csrf
        <div class="w-1/2">
            <x-input id="invoice_id" type="number" name="invoice_id" label="{{__('Invoice ID')}}" min="0" step="1" />
        </div>
        <div class="mt-4">
            <button class="button button-primary text-sm" type="submit">
                <i class="ri-alarm-warning-line"></i> {{ __('Remind') }}
            </button>
        </div>
    </form>
</x-admin-layout>