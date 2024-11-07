<?php

namespace App\Exports;

use App\Models\Application;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class AttendeedetailsExport implements FromCollection, WithHeadings, WithMapping
{
    protected $event;
    protected $applications;

    public function __construct($event, $applications = null)
    {
        $this->event = $event;
        $this->applications = $applications ?: Application::where('event_id', $this->event->id)->where('paymentstatus','Payment Completed')->get();
    }

    public function collection()
    {
        return $this->applications;
    }

    public function map($application): array
    {
        $companyName = $application->startup->name;
        $companydetails = $application->companydetails;
        $productdetails = $application->productdetails;

        $companylogo = explode('/', $application->companylogo);
        $company_logo= end($companylogo);

        



        $attendees = $application->attendeedetails ?? [];

        $rows = [];
        
        foreach ($attendees as $attendee) {
            $passportcopy = explode('/', $attendee->passportcopy);
            $passport_copy= end($passportcopy);
            $rows[] = [
                'Company' => $companyName,
                'Company Details' => $companydetails,
                'Product Details' => $productdetails,
                'Company Logo'=>route('storage.upload',$company_logo),
                'Attendee Name' => $attendee['name'] ?? '',
                'Passport Number' => $attendee['passportnum'] ?? '',
                'Passport Copy'=>route('storage.upload',$passport_copy),
                'Mobile Number' => $attendee['mobilenum'] ?? '',
                'Email' => $attendee['email'] ?? '',
                'Visa Status' => $attendee['valid_visa'] ? 'Yes' : 'No',
            ];
        }

        return $rows;
    }

    public function headings(): array
    {
        return [
            'Company',
            'Company Details',
            'Product Details',
            'Company Logo',
            'Attendee Name',
            'Passport Number',
            'Passport Copy',
            'Mobile Number',
            'Email',
            'Visa Status',
        ];
    }
}
