<?php

namespace App\Http\Controllers;

use App\Models\Invoices;
use App\Models\invoices_details;
use App\Models\invoices_attachments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use File;

class InvoicesDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(invoices_details $invoices_details)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $invoiceInf = invoices::where('id',$id)->first();

        $invoiceStU = invoices_details::where('id_Invoice',$id)->get();

        $attachments  = invoices_attachments::where('invoice_id',$id)->get();

        return view('invoices.InvoicesDetails' , compact('invoiceInf','invoiceStU','attachments'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, invoices_details $invoices_details)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(Request $request)
    // {
    //     $invoices = invoice_attachments::findOrFail($request->id_file);
    //     $invoices->delete();
    //     Storage::disk('public_uploads')->delete($request->invoice_number.'/'.$request->file_name);
    //     session()->flash('delete', 'تم حذف المرفق بنجاح');
    //     return back();
    // }
                   // مش راضيين يشتغلوا
    /*
    public function open_file($invoice_number,$file_name)

    {
        $files = Storage::disk('public_uploads')->getDriver()->getAdapter()->applyPathPrefix($invoice_number.'/'.$file_name);
        return response()->file($files);
    }
    public function open_file($invoice_number, $file_name)
    {
        $filePath = $invoice_number . '/' . $file_name;
    
        if (!Storage::disk('public_uploads')->exists($filePath)) {
            abort(404); // Handle file not found scenario
        }
    
        $file = Storage::disk('public_uploads')->get($filePath);
        return response()->file($file);

    }
    */
    /*
    public function get_file($invoice_number,$file_name)

    {
        $contents= Storage::disk('public_uploads')->getDriver()->getAdapter()->applyPathPrefix($invoice_number.'/'.$file_name);
        return response()->download( $contents);
    }
    */
    
}
