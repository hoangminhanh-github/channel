<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Channel;
class ChannelController extends Controller
{
    //GET: companies (SELECT)
    public function index(){
//        $companies = Company::all();
        $channels = Channel::orderBy('ChannelId','desc')->paginate(5);
        return view("channel", compact("channels"));
    }

    //ADD (INSERT): (1) Hiển thị FORM (GET) / (2) Lưu dữ liệu từ FORM vào CSDL
    //GET: companies/create
    
    public function create(){
      return view("create");
  }

  //POST: companies
  public function store(Request $request){
      //Tạo ra đối tượng Company
      //Thiết lập các giá trị từ $request

      Channel::create($request->post());
      return redirect()->route('channels.index')->with('success','Channel has been created successfully.');

  }
  //GET; companies/{Channel}
  public function show(string $id){
      echo "Show Detail of ID";
  }

  //EDIT (UPDATE): (1) Hiển thị FORM (GET) / (2) Lưu dữ liệu từ FORM vào CSDL
  //GET: companies/{company}/edit
  public function edit(string $id){
      $channel = Channel::find($id);
      return view("edit", compact('channel'));
  }

  //PUT: companies/{company}
  public function update(Request $request, string $id){
      $channel = Channel::find($id); //Tìm ra xem thằng nào trong CSDL cần sửa

      $channel->name = $request->name;
      $channel->email = $request->email;
      $channel->address = $request->address;

      $channel->save(); //Tự so sánh với ví dụ ở Tutorial để hiểu thêm các cách làm khác nhau
//        $company->fill($request->post())->save();

      return redirect()->route('channels.index')->with('success','Company Has Been updated successfully');
  }

  //DELETE: companies/{company}
  public function destroy(string $id){
      $channel = Channel::find($id);
      $channel->delete();
      return redirect()->route('channels.index')->with('success','Company has been deleted successfully: '.$id);
  }
    
}
