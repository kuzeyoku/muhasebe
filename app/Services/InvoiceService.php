<?php

namespace App\Services;

use App\Models\Invoice;

class InvoiceService extends BaseService
{
    public function __construct(Invoice $model)
    {
        parent::__construct($model);
    }

    public function pdfParser(array $request)
    {
        $parser = new \Smalot\PdfParser\Parser();
        $pdf = $parser->parseFile($request["file"]->getPathname());
        $text = $pdf->getText();
        $invoice_number = $this->extractInvoiceNumber($text);
        $invoice_amount = $this->extractInvoiceAmount($text);
        $invoice_date = $this->extractInvoiceDate($text);
        return [
            'invoice_number' => $invoice_number,
            'invoice_amount' => $invoice_amount,
            'invoice_date' => $invoice_date
        ];
    }

    private function extractInvoiceNumber($text)
    {
        // Implement your logic to extract the invoice number from the text
        preg_match('/Fatura No:\s*(\S+)/', $text, $matches);
        return $matches[1] ?? null;
    }

    private function extractInvoiceAmount($text)
    {
        // Implement your logic to extract the invoice amount from the text
        preg_match('/Ödenecek Tutar\s*([\d.,]+)\s*TL/', $text, $matches);
        if (isset($matches[1])) {
            $matches[1] = str_replace([',', '.'], '', $matches[1]);
            return (int)$matches[1];
        }
        return null;
    }

    private function extractInvoiceDate($text)
    {
        preg_match('/Fatura Tarihi:\s*(\d{2}-\d{2}-\d{4})/', $text, $matches);
        if (isset($matches[1])) {
            return \Carbon\Carbon::createFromFormat('d-m-Y', $matches[1])->toDateString();
        }
        return null;
    }
}
