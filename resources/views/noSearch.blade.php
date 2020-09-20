@extends('layouts.app')
@section('content')  
    <div class="text-center">
        
    </div>
    <div class="search-lawyer">
        <div class="search-lawyer-jumbotron">
            <div class="jumbotron text-center">
                <p class="search-lawyer-heading"> Missing data matching your search terms! </p>
                <a href="/search" class="btn bg-color"> <span class="fa fa-undo"></span> Return Back to Search page</a>


            </div>
        </div>
    </div>
    <div style="margin-bottom:730px;">
        <div class="search-user">
        <div class="search-legalmeet">
            <div class="row text-center">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <h2 class="h1 mt-0 pt-1 pl-5">Tips for effective seraching on Legal<span class="text-color">Meet</span></h2>
                </div>
            </div>
            <div class="row" style="padding-left:350px;" >
                <div class="col-xs-12 col-sm-12 col-md-9">
                    <ol class="ordered-list">
                        <li>
                            <h3 class="h2"> <span class="ordering">1</span> Use Specific Keywords</h3>
                            <p class="pl-5"> Keywords are the terms that you use to find content. Making your keywords as specific as possible will help your search engine to track down the information that you want.
                                <br>
                                Say, for example, that you want to find a lawyer called Philip. If you type only "p" in the search engine, the results will include many pages about other types of lawyers, whereas typing Philip  will return a more concise range of lawyers.
                                <br>
                               Another example would be if you want to search for lawyers in a specific county, Say, for example, that you want to find a lawyers in Vihiga County. If you type only "V" in the search engine, the results will include many pages with other counties, whereas typing Vihiga  will return only lawyers in that county.

                            </p>

                        </li>
                        <li>
                            <h3 class="h2 pl-1"><span class="ordering">2</span>Remove Unhelpful Words</h3>
                            <p class="pl-5"> Adding Unhelpful words may cause you to obatin wrong results or obtain no results at all.</p>
                        </li>
                        <li>
                            <h3 class="h2 pl-1"><span class="ordering">3</span>Simplify your search terms</h3>
                            <p class="pl-5">strip out unnecessary stop words and avoid suffixes.</p>
                        </li>
                        
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection