<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class AuthController extends Controller
{
    function index(){
        
        return view("auth.login");
    }
     function dashboard(){
        return view("auth.dashboard");
    }
    function logout(){
        Auth::logout();
        return redirect("login");
    }
    function userList(){
       // $users = User::where('role_id','=',2)->get();
        return view("auth.member_list");
    }
    function createAuthor(){
        return view("auth.create_author");
    }
    function editAuthor($id){
        return view("auth.edit_author",compact('id'));
    }
    function profile(){
        return view("auth.profile");
    }
    function createBook(){
        return view("auth.create_book");
    }
    function bookList(){
        return view("auth.book_list");
    }
    function editBook($id){
        return view("auth.edit_book",compact('id'));
    }
    function viewAuthor($id){
        return view("auth.view_author",compact('id'));
    }
}
