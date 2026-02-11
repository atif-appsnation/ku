<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Models\File;
use Carbon\Carbon;
use Illuminate\Support\Str;
use TCPDF;

class HomeController extends Controller
{
    //
    public function index($id){
// dd(url('/'));

        $file = File::findOrFail($id);
        $filename=$file->filename;
        // $url=str_replace("/public","",url('storage/app/uploads'));
        
        $url=url('/generate-pdf/'.$id);
        // dd($url);
        // dd($url.'/'.$filename);
        // QR code with text
        
        $data['qrcode'] = QrCode::size(200)->generate($url);
        
        // $data['qrcode'] = QrCode::size(200)->generate($url.'/'.$filename);




        // $data['qrcode']=QrCode::color(224, 224, 224)->backgroundColor(102, 0, 204)->generate('https://futurealiti.com/');
        // Store QR code for download
        // QrCode::generate('Welcome to Makitweb', public_path('images/qrcode.svg') );


        return view('index',['data'=>$data,
        'file'=>$file
    ]);
    }
    
    public function showForm()
    {
        return view('upload');
    }
    public function upload(Request $request)
    {
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            // Get the original file name

            $filename = now()->timestamp. Str::random(32) .'.'.$file->getClientOriginalExtension();
            // dd($filename);
            // Move the file to the storage directory
            $file_created = new File();
            // $file_created=File::create([
                $file_created->filename=$filename;
                $file_created->name=$request->name;
                $file_created->cell=$request->cell;
                $file_created->CNIC=$request->cnic;

                $file_created->enrollment=$request->enrollment;
                $file_created->email=$request->email;
                $file_created->fee_voucher=$request->fee;
                $file_created->validity_qr=$request->validity_qr;

                $file_created->created_at=Carbon::now();
                $file_created->updated_at=Carbon::now();
                $file_created->save();

            // ]);

            $file->storeAs('uploads', $filename);

            // return 'File uploaded successfully.';
            return redirect('/index/'.$file_created->id);
        }

        return 'No file uploaded.';
    }

    public function viewfiles()
    {
        $data=File::all();
        return view('viewfiles',compact('data'));
    }
    public function login()
    {
        return view('login');
    }
    // public function checkUser(Request $request)
    // {
    //     if($request->email=="admin@email.com" && $request->password=="admin123")
    //     {
    //         $request->session()->flash('message', 'Welcome Admin!');
    //         return redirect("/upload");
    //         // return "yes";
    //     }
    //     else{
    //         return redirect('login');
    //         // return 'no';
    //     }
    // }
    public function generatePasswordProtectedPDF($id)
    {
        // $pdf = new TCPDF();
        // $pdf->SetProtection(['print'], 'your_password_here', 'your_owner_password_here');

        // // Add content to the PDF
        // $pdf->AddPage();
        // $pdf->SetFont('helvetica', '', 12);
        // $pdf->Cell(0, 10, 'This is a password-protected PDF.', 0, 1);

        // // Output the PDF to the browser
        // $pdf->Output('password_protected.pdf', 'D');
        //////////////////////////////////////////////////
        $file = File::findOrFail($id);
        $filename=$file->filename;
        $password=$file->CNIC;
        $pdf = new TCPDF();
        $pdf->SetProtection([], $password, $password);

        $pdf->AddPage();

        
        $url=str_replace("/public","",url('storage/app/uploads'));
       
        // Define the path to the image you want to add
        $imagePath = $url.'/'.$filename;

        // Set the image dimensions and position
        $x = 10;
        $y = 10;
        $width = 210;
        $height = 297; // Auto-adjust the height to maintain the aspect ratio

        // Add the image to the PDF
        $pdf->Image($imagePath, $x, $y, $width, $height);

        // Output the PDF to the browser
        $pdf->Output('document.pdf', 'D');
    }

}
