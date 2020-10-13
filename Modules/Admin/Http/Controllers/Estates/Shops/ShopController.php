<?php

namespace Modules\Admin\Http\Controllers\Estates\Shops;

use App\Repositories\Estate\Shop\ShopRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Admin\Http\Controllers\Estates\EstateController;
use Modules\Admin\Http\Requests\StoreShop;
use Modules\Admin\Http\Requests\UpdateShop;
use App\EstateOrder;
use App\MaintenanceOrder;
class ShopController extends EstateController
{

    protected $shop;

    public function __construct(ShopRepositoryInterface $shop)
    {
        $this->shop = $shop;
    }

    public function index()
    {
        bread_crumb('Estates | Shops');
        return view('admin::estates.shops.index', ['shops' => $this->shop->all()]);
    }

    public function show($id)
    {
        bread_crumb('Estates | ' . $this->shop->getById($id)->shop_number);
        return view('admin::estates.shops.show', ['shop' => $this->shop->getById($id)]);
    }

    public function create()
    {
        bread_crumb('Estates | New');
        return view('admin::estates.shops.create');
    }

    public function store(StoreShop $request)
    {
        $request->validated();
        if(! $request->hasFile('images')){
            return back()->with('images_not_found');
        }
        $this->shop->create($request->except(['_token']));
        session()->flash('success');
        return redirect()->route('Admin::shops.index');
    }

    public function edit($id)
    {
        return view('admin::estates.shops.edit', ['shop' => $this->shop->getById($id)]);
    }

    public function update($id, UpdateShop $request)
    {
        $request->validated();
        if($request->hasFile('images')){
            $this->shop->update($id, $request->except(['_token']));
        }elseif(! $request->hasFile('images')){
            $this->shop->update($id, $request->except(['_token', 'images']));
        }
        session()->flash('success');
        return redirect(route('Admin::shops.index'));
    }

    public function destroy($id)
    {
          $orderst=EstateOrder::where("estate_id",$id)->first();
        $orderMain=MaintenanceOrder::where("estate_id",$id)->first();
        // dd($orderMain,$orderst);
        if($orderst == null && $orderMain == null){
             $this->shop->trashing($id);
             return redirect()->back()->with('success', 'تم الحذف بالنجاح'); 
        }elseif($orderMain != null && $orderst != null){
             return redirect()->back()->with('errors', 'لم يتم الحذف هناك حجز صيانه و حجز عقار ');
        }elseif($orderMain != null){
                return redirect()->back()->with('errors', 'لم يتم الحذف هناك طلب صيانه');
        }elseif($orderst == null){
                return redirect()->back()->with('errors', 'لم يتم الحذف هناك حجز ');
        }elseif($orderMain == null){
                return redirect()->back()->with('errors', 'لم يتم الحذف هناك طلب صيانه');
        }
        else{
             return redirect()->back()->with('errors', 'لم يتم الحذف هناك حجز '); 
        }
       
    }
}