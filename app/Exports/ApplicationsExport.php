<?php

namespace App\Exports;

use App\Models\Application;
use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ApplicationsExport implements FromCollection, WithMapping, WithHeadings
{
    protected $applications;

    /**
     * Constructor to accept a collection of applications.
     */
    public function __construct($applications)
    {
        $this->applications = $applications;
    }

    /**
     * Return the collection of applications.
     */
    public function collection()
    {
        return $this->applications;
    }

    public function map($application): array
    {
        // Decode the products JSON data
        $products = json_decode($application->startup->products, true);
        $directors = json_decode($application->startup->directors, true);
        $remarks = json_decode($application->remark, true);

        // Initialize arrays to store formatted product, director, and remark data
        $productDetails = [];
        $directorDetails = [];
        $remarksDetails = [];

        // Process products
        foreach ($products as $product) {
            $sectors = json_decode($product['sectors'], true);
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

        // Process directors
        foreach ($directors as $director) {
            $directorDetails[] = "Name: " . $director['name'] . "\n" .
                                 "Gender: " . $director['gender'] . "\n";
        }

        // Process remarks
        foreach ($remarks as $remark) {
            $user = User::find($remark['user_id']);
            $remarksDetails[] = "User: " . ($user ? $user->name : 'Unknown User') . "\n" .
                                "Type: " . $remark['type'] . "\n" .
                                "Remark: " . $remark['remark'] . "\n";
        }

        // Convert arrays to strings
        $productsFormatted = implode("\n\n", $productDetails);
        $directorFormatted = implode("\n\n", $directorDetails);
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
            $productsFormatted, // Formatted products
            $directorFormatted, // Formatted directors
            $application->investment_raised,
            $application->why_participate,
            $application->willing_to_pay,
            $application->remark_select,
            $application->status,
            $application->paymentstatus,
            $remarksFormatted, // Formatted remarks
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
