<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
class CompanyController extends Controller
{
    //GET: companies (SELECT)
    public function index(){
//        $companies = Company::all();
        $companies = Company::orderBy('id','desc')->paginate(5);
        return view("index", compact("companies"));
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

        Company::create($request->post());
        return redirect()->route('companies.index')->with('success','Company has been created successfully.');

    }
    //GET; companies/{company}
    public function show(string $id){
        echo "Show Detail of ID";
    }

    //EDIT (UPDATE): (1) Hiển thị FORM (GET) / (2) Lưu dữ liệu từ FORM vào CSDL
    //GET: companies/{company}/edit
    public function edit(string $id){
        $company = Company::find($id);
        return view("edit", compact('company'));
    }

    //PUT: companies/{company}
    public function update(Request $request, string $id){
        $company = Company::find($id); //Tìm ra xem thằng nào trong CSDL cần sửa

        $company->name = $request->name;
        $company->email = $request->email;
        $company->address = $request->address;

        $company->save(); //Tự so sánh với ví dụ ở Tutorial để hiểu thêm các cách làm khác nhau
//        $company->fill($request->post())->save();

        return redirect()->route('companies.index')->with('success','Company Has Been updated successfully');
    }

    //DELETE: companies/{company}
    public function destroy(string $id){
        $company = Company::find($id);
        $company->delete();
        return redirect()->route('companies.index')->with('success','Company has been deleted successfully: '.$id);
    }
}
