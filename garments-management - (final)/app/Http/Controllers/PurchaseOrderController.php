<?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use App\Models\PurchaseOrder;
    use Illuminate\Routing\Controller;

    class PurchaseOrderController extends Controller
    {
        /**
         * Display a listing of the purchase orders.
         */
        public function index()
        {
            // সব Purchase Orders নিয়ে আসছি, Supplier এবং Items কে eager load করছি
            $orders = PurchaseOrder::with(['supplier', 'items.material'])->get();

            // Blade view এ পাঠাচ্ছি
            return view('purchase_orders.index', compact('orders'));
        }

    }
