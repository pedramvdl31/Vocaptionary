<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Input;
use Validator;
use Redirect;
use Route;
use Response;
use Auth;
use URL;
use Session;
use Laracasts\Flash\Flash;
use View;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Job;
use App\User;
use Config;


class GamesController extends Controller
{
    public function __construct() {
        $this->layout_game = 'layouts.games_coop';
        $this->layout_study = 'layouts.studies';
        $this->layout_react = 'layouts.react';
    }

    public function getPlayIndex() {
        return view('games.index')
        ->with('layout',$this->layout_game);
    }


    public function getPlayCoopIndex() {
        return view('games.index_coop')
        ->with('layout',$this->layout_game);
    }

    public function getStudyIndex() {
        return view('studies.index')
        ->with('layout',$this->layout_study);
    }

    public function getReactPageIndex() {
        return view('react.index')
        ->with('layout',$this->layout_react);
    }



}
