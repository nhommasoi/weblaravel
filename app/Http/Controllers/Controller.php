<?php



namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use App\slide;
use App\Product;
use App\ProductType;
use App\Cart;
use App\Customer;
use Session;
use App\Bill;
use App\BillDetail;
use App\User;
use Hash;
use Auth;

// use App\Use;
class Controller extends BaseController
{
    public function getIndexAdmin(){
        return view('admin.layout.index');
    }
   
    public function getAdmin(){
        return view('admin.master');
    }
    public function getLg(){
        return view('admin.login');
    }
    //public function getListDanhMuc(){
    //    $listDM=ProductType::all();
    //    return view('admin.collection.list',compact('listDM'));
    //}
//////////////////////////DANH MUC SAN PHAM/////////////////////////////
    public function getListDanhMuc(){
        $listDM=ProductType::all();
        return view('admin.product.cat_list',compact('listDM'));
    }
    public function addListDanhMuc(Request $r){
        /*
        $this->validate($r, [
            'cat_name'=>'required|unique:type_products,name|min:3|max:100'
        ], [
            'cat_name.required'=>'Bạn chưa nhập tên Loại',
            'cat_name.unique'=>'Tên loại đã tồn tại', 
            'cat_name.min'=>'Tên loại có độ dài từ 3 đến 100 ký tự',
            'cat_name.max'=>'Tên loại có độ dài từ 3 đến 100 ký tự'
        ]);
        */
        $pro = new ProductType;
        $pro->id = $r->id;
        $pro->name = $r->cat_name;
        $pro->description = $r->description;
        $pro->image = 'image';
        $pro->save();
        return redirect()->back()->with('thongbao',"Bạn đã thêm sản phẩm thành công");}
    public function delListDanhMuc($id){
        $cat = ProductType::find($id);
        
        if ($cat->delete()==false) {
           return redirect()->back()->with('thongbao','Loại hàng vẫn còn sản phẩm, không thể xóa!');
            
        }
        else  return redirect()->back()->with('thongbao','Xóa thành công');}

    public function suaDanhMuc($id){
        $DanhMuc=ProductType::all();
        //$dmz=$DanhMuc[$id-1];
        $dmz=ProductType::find($id);
        return view('admin.product.cat_edit',compact('dmz','id'));
    }
    public function suaListDanhMuc(Request $r, $id){
        $cat_edit = ProductType::find($id);
        $cat_edit->name = $r->name;
        $ten=$cat_edit->name;
        $cat_edit->description = $r->description;
        $cat_edit->image = 'image';
        $cat_edit->save();
        
        return redirect('danhmuc')->with('thongbao','Đã sửa loại sản phẩm: '.$ten );
    }
    public function chitietListDanhMuc($id){
    	$listDM_n=ProductType::find($id);
        $list_detail_DM=product::where('id_type','like',$id)->paginate(99,['*'],'pag');;
        return view('admin.product.cat_list_detail',compact('list_detail_DM','id','listDM_n'));
    }
        //-------------DON HANG------------//

    public function getListDonHang(){
        $listDH=bill::all();
        return view('admin.news.cat_list',compact('listDH'));
    }
    public function getChitietDonHang($id){
    	$bill=Bill::find($id);
        $listDH_chitiet=BillDetail::where('id_bill','like',$id)->paginate(99,['*'],'pag');
        $img=array();
        foreach($listDH_chitiet as $k=>$b){
            $img[]=$b->id_product;
        }
        $url_img=array();
        for ($i=0; $i < count($img) ; $i++) { 
            $url_img[]=Product::find($img[$i]);
        }
        $khach_hang=Customer::find($id);
        return view('admin.news.list',compact('listDH_chitiet','id','khach_hang','bill','url_img','img'));
    }
    //-------------DON HANG------------//
///////////////////////////END======DANH MUC SAN PHAM///////////////////////
    public function getListSanpham(){
        
        $listSP=Product::where('unit_price','<>',0)->paginate(7,['*'],'pag');
        return view('admin.product.list',compact('listSP'));
    }
    public function getProductDel($id){
        $cat = Product::find($id);
        $cat->delete();
        return redirect()->back()->with('thongbao','Xóa chuyên mục thành công');
    }
    public function postLoginAdmin(Request $req){
        $this->validate($req,
            [
                'email'=>'required|email',
                'password'=>'required|min:1|max:20'
            ],
            [
                'email.required'=>'Vui lòng nhập lại email',
                'email.email'=>'Email không đúng định dạng',
                'password.required'=>'Vui lòng nhập mật khẩu'
            ]

        );
        $credentials = array('email' =>$req->email ,'password'=> $req->password);
        if(Auth::attempt($credentials)){
            return  view('admin.master');

        }else{
            return redirect()->back()->with(['flag'=>'danger','message'=>'Đăng nhập không thành công']);

        }

    }
    // day la fon

     public function getIndex(){

        $slide =slide::all();
        $new_product =Product::where('new',1)->paginate(4,['*'],'pag');
        $sp_khuyenmai=Product::where('promotion_price','<>',0)->paginate(4,['*'],'pag');

    return view('page.trangchu',compact('slide','new_product','sp_khuyenmai'));
        //return view('page\trangchu',['slide'=>$slide,'new_product'=>$new_product]);
    }
    public function getLoaiSp($type){
        $sp_loai= Product::where('id_type',$type)->paginate(6,['*'],'pag');
        $sp_khac=Product::where('id_type','<>',$type)->paginate(3,['*'],'pag');
        $loaisp=ProductType::all();
        $ten_sp=ProductType::where('id',$type)->first();

        return view('page.loai_sanpham',compact('sp_loai','sp_khac','loaisp','ten_sp'));
    }
    public function getChiTietSp($id){

        $sanpham=Product::where('id',$id)->first();
        $sp_tuongtu=Product::where('id_type',$sanpham->id_type)->paginate(3,['*'],'pag');
        $sp_banchay=Product::where('id_type',$sanpham->id_type)->paginate(4,['*'],'pag');
        $sp_moinhat=Product::where('id_type',$sanpham->id_type)->paginate(4,['*'],'pag');
        return view('page.chitiet_sp',compact('sanpham','sp_tuongtu','sp_banchay','sp_moinhat'));

    }
    public function getGioiThieu(){
        return view('page.gioithieu');
    }
    public function getText(){
          $tt =Product::where('new',1);
        return view('page.text',compact('tt'));
    }
    
     public function getLienHe(){
        return view('page.lienhe');
    }
     public function getTinTuc(){
        $news =News::All();
        return view('page.tintuc',compact('news'));

    }
    public function getSearch(Request $req ){
        $product =Product::where('name','like','%'.$req->sear.'%')
                            ->orWhere('unit_price','like','%'.$req->sear.'%')
                            ->get();
        return view('page.search',compact('product'));

    }
    public function getAllCart(){
        return view('page.all_cart');
    }
    public function getLogin(){
        return view('page.dangnhap');
    }
    public function getSignup(){
        return view('page.dangki');
    }
    public function getAddCart(Request $req, $id){
        $product =Product::find($id);
        $oldCart=Session('cart')?Session::get('cart'):null;
        $cart=new Cart($oldCart);
        $cart->add($product,$id);
        $req->session()->put('cart',$cart);
        return redirect()->back();


    }
    public function getDelCart($id){
        $oldCart=Session::has('cart')?Session::get('cart'):null;
        $cart=new Cart($oldCart);
        $cart->removeItem($id);
        if(count($cart->items)>0){
            Session::put('cart',$cart);
        }else{
            Session::forget('cart');
        }
        // Session::put('cart',$cart);
        return redirect()->back();
    }
    public function getDatHang(){

        return view('page.dathang');
    } 
    public function postDatHang(Request $req){
        $cart=Session::get('cart');
        $customer =new Customer;
        $customer->name=$req->name;
        $customer->gender=$req->gender;
        $customer->email=$req->email;
        $customer->address =$req->adress;
        $customer->phone_number=$req->phone;
        $customer->note=$req->notes;
        $customer->save();


        $bill= new Bill();
        $bill->id_customer=$customer->id;
        $bill->date_order=date('Y-m-d');
        $bill->total=$cart->totalPrice;
        $bill->payment=$req->payment_method;
        $bill->note=$req->notes;
        $bill->save();

        foreach ($cart->items as $key => $value) {
             $bill_detail=new BillDetail();
             $bill_detail->id_bill=$bill->id;
             $bill_detail->id_product=$key;
             $bill_detail->quantity=$value['qty'];
             $bill_detail->unit_price=($value['price']/$value['qty']);
             $bill_detail->save();
        }
        Session::forget('cart');
        return redirect()->back()->with('thongbao','đặt hàng thành công');



    }
    public function postSignup(Request $req) {
        $this->validate($req,
                [

                        'email'=>'required|email|unique:users,email',
                        'password'=>'required|min:2|max:10',
                        'fullname'=>'required',
                        're_password'=>'required|same:password'


                ],
                [
                      'email.required'=>'Vui lòng nhập email',
                      'email.email'=>'Không đúng định dạng email',
                      'email.unique'=>'Email đã có người dùng',
                      'password.required'=>'Vui lòng nhập mật khẩu',
                      're_password.same'=>'Mật khẩu không giống nhau',
                      'password.min'=>'Mật khẩu ít nhất 6 kí tự'      

                ]);

        $user =new User();
        $user->full_name=$req->fullname;
        $user->email=$req->email;
        $user->password=Hash::make($req->password);
        $user->phone=$req->phone;
        $user->address=$req->adress;
        $user->save();
        return redirect()->back()->with('thanhcong','Tạo tài khoản thành công');

    }
    public function postLogin(Request $req){
        $this->validate($req,
            [
                'email'=>'required|email',
                'password'=>'required|min:1|max:20'
            ],
            [
                'email.required'=>'Vui lòng nhập lại email',
                'email.email'=>'Email không đúng định dạng',
                'password.required'=>'Vui lòng nhập mật khẩu'
            ]

        );
        $credentials = array('email' =>$req->email ,'password'=> $req->password);
        if(Auth::attempt($credentials)){
            return redirect()->back()->with(['flag'=>'success','message'=>'Đăng nhập thành công']);

        }else{
            return redirect()->back()->with(['flag'=>'danger','message'=>'Đăng nhập không thành công']);

        }

    }
    public function postDangXuat(){
        Auth::logout();
        return redirect()->route('trang-chu');
    }

    
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
