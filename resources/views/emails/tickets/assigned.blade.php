@component('mail::message')
# Ticket has been assigned to {{ $ticket->assigns->last()->name }}

You have been assigned a ticket, please visit {{ $ticket->owner->name }}'s office at {{ $ticket->owner->location->name }} room {{ $ticket->owner->room_no }} to resolve this issue.

The priority of the issue has been marked as {{ ucfirst($ticket->priority) }}

@component('mail::button', ['url' => 'http://172.30.35.6/dashboard/helpdesk/tasks'])
View Task Details
@endcomponent

Best Regards,<br>
{{ config('app.name') }}
@endcomponent
