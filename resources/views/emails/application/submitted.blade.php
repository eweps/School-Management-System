<x-mail::message>
# Application Submitted

Hi {{ $application->name }},

Thank you for submitting your application. We’ve received it and will review it shortly.

If we need anything else, we’ll contact you at {{ $application->email }}.

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
