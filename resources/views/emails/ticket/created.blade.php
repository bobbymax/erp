@component('mail::message')
# New Ticket Alert!!

A staff {{ $ticket->owner->name }} has an issue of {{ $ticket->priority }} priority in need of resolving and has asked for the assistance of an ICT representative.

Please login to view and address this issue.

@component('mail::button', ['url' => 'http://172.30.35.6/dashboard/helpdesk/unresolved/tickets'])
View Ticket
@endcomponent

Best Regards,<br>
{{ config('app.name') }}
@endcomponent
