<?php

namespace App\Http\Controllers;
use App\Album;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function advSearch()
    {
        return view('pages.advSearch');

    }
    public function sort(Request $request)
    {
        $ok = $request->get ( 'ok' ); 
        $po = $request->get ( 'po' ); 
        $ne = $request->get ( 'ne' );
        $gn = $request->get ( 'gn' ); 
        $okk = $request->get ( 'okk' ); 
        $rd = $request->get ( 'rd' ); 
        
        $q = $request->get ( 'q' );
        $album7= Album::where('Gener', $gn)->orderBy('Album_Name') ->get();
        $album8= Album::where('Sort', $po)->orderBy('Album_Name') ->get();
        $album9= Album::where('Sort', $ne)->orderBy('Album_Name') ->get();
        $album6= Album::where('Releas_Date', $rd)->orderBy('Album_Name') ->get();
        $album = Album::where ( 'Album_Name', 'LIKE', '%' . $q . '%' )->orWhere( 'Artist_Name', 'LIKE', '%' . $q . '%' )->get();
        
      
    if (count ( $album ) > 0)
    {

        if($okk)
      {
        return view ( 'pages.advSearch' )->withDetails ($album6)->withQuery ( $rd);
      }
        
      if($po)
      {
        return view ( 'pages.advSearch' )->withDetails ($album8)->withQuery ( $po);
      }
      if($ne)
      {
        return view ( 'pages.advSearch' )->withDetails ($album9)->withQuery ( $ne);

      }
      if($ok)
      {
        return view ( 'pages.advSearch' )->withDetails ($album7)->withQuery ( $gn);
      }
      else
        return view ( 'pages.advSearch' )->withDetails ($album)->withQuery ( $q);

    }
  
    else
    return view ( 'pages.advSearch' )->withMessage ( 'No Details found. Try to search again !' );

       

     
    
    }
    public function search(Request $request)
    {
        $q = $request->get ( 'q' );
        // $ar = $request->get ( 'ar' );
        // $pr = $request->get ( 'pr' );
        // $rd = $request->get ( 'rd' );
        // $gn = $request->get ( 'gn' );
        // $so = $request->get ( 'so' );
        // $po = $request->get ( 'po' );
        $album = Album::where ( 'Album_Name', 'LIKE', '%' . $q . '%' )->orWhere( 'Artist_Name', 'LIKE', '%' . $q . '%' )->get();//->orWhere( 'Artist_Name', 'LIKE', '%' . $ar . '%' )->orWhere( 'Producer', 'LIKE', '%' . $pr . '%'  )->orWhere( 'Releas_Date', 'LIKE', '%' . $rd . '%' )->orWhere( 'Gener', 'LIKE', '%' . $gn . '%' )->orWhere( 'Sort', 'LIKE', '%' . $so . '%'  )->get ();
        // $album2 = Album::Where( 'Artist_Name', 'LIKE', '%' . $ar . '%' )->get ();
        // $album3 = Album::Where( 'Producer', 'LIKE', '%' . $pr . '%'  )->get ();
        // $album4 = Album::Where( 'Releas_Date', 'LIKE', '%' . $rd . '%' )->get ();
        // $album5 = Album::Where( 'Gener', 'LIKE', '%' . $gn . '%' )->get ();
        // $album6 = Album::Where( 'Sort', 'LIKE', '%' . $so . '%'  )->get ();
        
        if (count ( $album ) > 0)
         return view ( 'pages.advSearch' )->withDetails ($album)->withQuery ( $q);
      
        else
          return view ( 'pages.advSearch' )->withMessage ( 'No Details found. Try to search again !' );
    
    
    //    if($q == "" && $ar == "" && $pr == "")
    //    {
           
    //     if (count ( $album6 ) > 0)
    //     return view ( 'pages.advSearch' )->withDetails ($album6)->withQuery ( $so);
      
    //     else
    //     return view ( 'pages.advSearch' )->withMessage ( 'No Details found. Try to search again !' );


    //    }

    //    if($q == "" && $ar == "")
    //    {
    //     if (count ( $album3) > 0)
    //     return view ( 'pages.advSearch' )->withDetails ($album3)->withQuery ( $pr);
      
    //     else
    //     return view ( 'pages.advSearch' )->withMessage ( 'No Details found. Try to search again !' );

    //    }

    //    if($q == "" && $pr == "")
    //    {
    //     if (count ( $album2) > 0)
    //     return view ( 'pages.advSearch' )->withDetails ($album2)->withQuery ( $ar);
      
    //     else
    //     return view ( 'pages.advSearch' )->withMessage ( 'No Details found. Try to search again !' );

    //    }
    //    if($ar == "" && $pr == "")
    //    {
    //     if (count ( $album) > 0)
    //     return view ( 'pages.advSearch' )->withDetails ($album)->withQuery ( $q);
      
    //     else
    //     return view ( 'pages.advSearch' )->withMessage ( 'No Details found. Try to search again !' );
    //    }

    //    if($q == "")
    //    {

    //     if (count ( $album2) > 0)
    //     return view ( 'pages.advSearch' )->withDetails ($album2)->withQuery ( $ar);
      
    //     else
    //     return view ( 'pages.advSearch' )->withMessage ( 'No Details found. Try to search again !' );
    //    }
    //    if($ar == "")
    //    {
           
    //     if (count ( $album) > 0)
    //     return view ( 'pages.advSearch' )->withDetails ($album)->withQuery ( $q);
      
    //     else
    //     return view ( 'pages.advSearch' )->withMessage ( 'No Details found. Try to search again !' );

    //    }
    //    if($pr == "")
    //    {
           
    //     if (count ( $album ) > 0)
    //     return view ( 'pages.advSearch' )->withDetails ($album)->withQuery ( $q);
      
    //     else
    //     return view ( 'pages.advSearch' )->withMessage ( 'No Details found. Try to search again !' );

    //    }
          
        // else
        //     return view ( 'pages.advSearch' )->withMessage ( 'No Details found. Try to search again !' );
    }
}
