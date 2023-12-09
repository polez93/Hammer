<?php

namespace App\Mail;

use App\Models\Venta;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\App;
use PDF;

class FacturaMailable extends Mailable
{
    use Queueable, SerializesModels;

    public $venta;
    /**
     * Create a new message instance.
     */
    public function __construct(Venta $venta)
    {
        $this->venta = $venta;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('trituradosHammer@example.com'),
            subject: 'Factura de Compra Hammer',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.factura',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [
            Attachment::fromData(fn() => $this->ventaPDF(),'factura.pdf')
            ->withMime('application/pdf'),
        ];
    }

    private function ventaPDF()
    {
        // Generar el PDF aquí y devolver el contenido binario

        $data = [
            'venta' => $this->venta,
                ];
        $html = view('venta.show', $data)->render();

        $filename = 'venta_' . $this->venta->cliente->nombre.$this->venta->fecha_salida.'.pdf';

        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($html);
        return $pdf->output();
    }
    
}
