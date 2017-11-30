<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shelf;
use App\Book;
use App\Loan;
use DB;
use Log;
use Session;

class BookController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'book_name' => 'required',
            'author' => 'required',
            'shelf' => 'required',
        ]);

        $shelf_id = DB::table('shelves')->where('name', $request->get('shelf'))->first()->id;
        error_log($shelf_id);
        Book::create([
            'book_name' => $request->get('book_name'),
            'author' => $request->get('author'),
            'shelf_id' => $shelf_id,
        ]);
        Session::flash('flash_message', 'Book added successfully!');
    }

    public function getBooks(Request $request) {
        if(Session::has('name')) {
            $shelfId = session('shelfId');
            $books = DB::table('books')->where('shelf_id', $shelfId)->get();
            $array = array();
            foreach($books as $book) {
                array_push($array, $book);
            }
            return response()->json($array);
        }
    }

    public function getShelves() {
        if(Session::has('name')) {
            $shelves = DB::table('shelves')->get();
            $array = array();
            foreach($shelves as $shelf) {
                array_push($array, $shelf);
            }
            return response()->json($array);
        }
    }

    public function setShelf(Request $request) {
        session([
            'shelfId' => $request->get('shelfId'),
        ]);
    }

    public function borrowBook(Request $request) {
        $bookId = $request->get('id');
        DB::statement("UPDATE books SET availability = 0 WHERE id = " . $bookId);

        Loan::create([
            'user_id' => session('id'),
            'book_id' => $bookId,
            'due_date' => date('Y-m-d H:i:s', strtotime("+7 day")),
            'returned_date' => null,
        ]);
    }
}
