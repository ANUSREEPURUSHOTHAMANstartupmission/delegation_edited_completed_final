<?php

namespace App\Exports;

use App\Models\Application;
use App\Models\Events;
use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ApplicationExport implements FromCollection,WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public $applications;
    public $event;

    public function __construct(Events $event, $applications = null)
    {
        $this->event = $event;
        $this->applications = $applications;
    }

    public function collection()
    {
        // If specific applications are provided, return them. Otherwise, get all applications for the event.
        return $this->applications ?? Application::where('event_id', $this->event->id)->get();
    }

    public function map($application): array
    {
        // Decode the products JSON data
        $products = json_decode($application->startup->products, true);
        $directors = json_decode($application->startup->directors, true);
        $remarks = json_decode($application->remark, true);



        // Initialize an empty array to store formatted product data
        $productDetails = [];
        $directorDetails = [];
        $remarksDetails = [];



        // Loop through each product and extract the relevant details
        foreach ($products as $product) {
            $sectors = json_decode($product['sectors'], true); // Decode sectors JSON
            $sectorDetails = [];
            foreach ($sectors as $sector) {
                $sectorDetails[] = "Sector: " . $sector['sector'] . ", Industry: " . $sector['industry'];
            }

            $productDetails[] = "Name: " . $product['name'] . "\n" .
                                "Pitch: " . $product['pitch'] . "\n" .
                                "Brief: " . $product['brief'] . "\n" .
                                "Type: " . ($product['type'] ?? 'N/A') . "\n" .
                                implode("\n", $sectorDetails) . "\n" .
                                "Technologies: " . implode(", ", json_decode($product['technologies'], true));
        }

        foreach ($directors as $director) {
           
            $directorDetails[] = "Name: " . $director['name'] . "\n" .
                                "Gender: " . $director['gender'] . "\n" ;
                             }
        foreach ($remarks as $remark) {
            $user = User::find($remark['user_id']);
            $remarksDetails[] = "User: " . ($user ? $user->name : 'Unknown User') . "\n" .
                            "Type: " . $remark['type'] . "\n" .
                            "Remark: " . $remark['remark'] . "\n";
        }

        // Convert the product details array into a single string
        $directorFormatted = implode("\n\n", $directorDetails);
        $productsFormatted = implode("\n\n", $productDetails);
        $remarksFormatted = implode("\n\n", $remarksDetails);


        return [
            $application->event->name,
            $application->event->startdate,
            $application->event->enddate,
            $application->event->fee,
            $application->event->venue,
            $application->event->lastdate,
            $application->startup->name,
            $application->startup->email,
            $application->startup->website,
            $application->startup->contact_num,
            $application->startup->location,
            $application->startup->unique_id,
            $application->startup->founding_year,
            $application->startup_stage,
            $application->business_sector,
            $application->revenue_generated_current,
            $application->revenue_generated_previous,
            $productsFormatted, // Add the formatted products string
            $directorFormatted, // Add the formatted products string
            $application->investment_raised,
            $application->why_participate,
            $application->willing_to_pay,
            $application->remark_select,
            $application->status,
            $application->paymentstatus,
            $remarksFormatted,
          
        ];
    }

    public function headings(): array
    {
        return [
            'Event Name',
            'Start Date',
            'End Date',
            'Fee',
            'Venue',
            'Last Date',
            'Startup Name',
            'Email',
            'Website',
            'Contact Number',
            'Location',
            'Unique Id',
            'Founding Year',
            'Startup Stage',
            'Business Sector',
            'Revenue Generated Current FY',
            'Revenue Generated Previous FY',
            'Products',
            'Directors',
            'Investment Raised',
            'Why do you want to participate in this delegation?',
            'I accept the terms and is willing to pay the registration fee',
            'Remark',
            'Application Status',
            'Payment Status',
            'Remarks'
        ];
    }
}
