<?php

namespace App\Http\Controllers;

use App\Payment;
use Illuminate\Http\Request;
use App\Sale;
use App\Client;
use App\Http\Requests\Payment\StoreRequest;
use App\Http\Requests\Payment\UpdateRequest;
use App\Resolvers\PaymentPlatformResolver;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $paymentPlatformResolver;
    public function __construct(PaymentPlatformResolver $paymentPlatformResolver)
    {
        // $this->middleware('auth');
        $this->middleware('client_auth');
        $this->paymentPlatformResolver = $paymentPlatformResolver;
    
    }
    public function index()
    {
        $payments= Payment::get();
        return view ('admin.payment.index', compact('payments'));
        
    }

    public function create(Sale $sale)
    {
        $venta=$sale->id;
        $ventas=DB::select("SELECT s.id as id,
         s.user_id as user,s.client_id as client, s.sale_date as sale_date, s.total as total from sales s 
         where s.id = '$venta' group by s.id , s.user_id, s.sale_date, s.client_id, s.total  limit 1");

        return view ('admin.payment.create', compact('sale','ventas'));
    }

    public function store(StoreRequest $request)
    {
        
        $payment = Payment::create($request->all()+[
            
            
            
            'payment_date'=>Carbon::now('America/Mexico_City'),
           
        ]);

       
        return redirect()->route('clients.index');
       
    }

    public function show(Payment $payment)
    {
       
        return view ('admin.payment.show', compact('payment'));
    }

    public function edit(Payment $payment)
    {
       // $clients=Client::get();
        //return view ('admin.payment.show', compact('payment'));
    }

    public function update(UpdateRequest $request, Payment $payment)
    {
        //$payment->update($request->all());
        //return redirect()->route('payments.index');
    }

    public function destroy(Payment $payment)
    {
       // $payment->delete();
        //return redirect()->route('payments.index');

    }

    public function pdf(Payment $payment)
    {
    
        $pdf = PDF::loadView('admin.payment.pdf', compact('payment'));
        return $pdf->download('Reporte_de_pago_'.$payment->id.'.pdf');
    }

    public function print(Payment $payment){
        try {
            $subtotal = 0 ;
            $saleDetails = $payment->saleDetails;
            foreach ($saleDetails as $saleDetail) {
                $subtotal += $saleDetail->quantity*$saleDetail->price-$saleDetail->quantity* $saleDetail->price*$saleDetail->discount/100;
            }  

            $printer_name = "TM20";
            $connector = new WindowsPrintConnector($printer_name);
            $printer = new Printer($connector);

            $printer->text("€ 9,95\n");

            $printer->cut();
            $printer->close();


            return redirect()->back();

        } catch (\Throwable $th) {
            return redirect()->back();
        }
    }

    
    public function change_status(Payment $payment)
    {
        if ($payment->status == 'VALID') {
            $payment->update(['status'=>'CANCELED']);
            return redirect()->back();
        } else {
            $payment->update(['status'=>'VALID']);
            return redirect()->back();
        } 
    }

    public function pay(Request $request){
       
        $request->validate([
            'payment_platform'=>['required']
        ]);
        
        $paymentPlatform = $this->paymentPlatformResolver
        ->resolveService($request->payment_platform);
        session()->put('paymentPlatformId', $request->payment_platform);

    // if ($request->user()->hasActiveSubscription()) {
    //     $request->value = round($request->value * 0.9, 2);
    // }

    return $paymentPlatform->handlePayment($request);
    }   
    
    public function approval(){
        if (session()->has('paymentPlatformId')){
            $paymentPlatform=$this->paymentPlatformResolver->resolveService(session()->get('paymentPlatformId'));

            return $paymentPlatform->handleApproval();
        }
         return redirect()->route('web.checkout')->whithErrors('We cannot retrieve your payment platform. Try again, please.')
         ;
        
    }

    public function cancelled(){
        return redirect()->route('web.cart')->whithErrors('You cancelled the payment');
    }

}
