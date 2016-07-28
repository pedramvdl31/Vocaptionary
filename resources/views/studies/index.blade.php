@extends($layout)
@section('stylesheets')
  <link rel="stylesheet" href="/assets/css/profile/style.css">
@stop
@section('scripts')
  <script src="/assets/js/profile/index.js"></script>
@stop

@section('content')

  <div class="container">
    <header>
      <div class="bio">
            <style type="text/css">        
      </style>
            <div class="ad-image bg" style="background-image: url('/assets/images/games/up.jpg');"></div>;
      <div class="desc">
        <h3>@carlf</h3>
        <p>Carl Fredricksen is the protagonist in Up. He also appeared in Dug's Special Mission as a minor character.</p>
      </div>
      </div>

      <div class="avatarcontainer btn-nxt" navigate-to="profile">
        <img src="http://www.croop.cl/UI/twitter/images/carl.jpg" alt="avatar" class="avatar">
        <div class="hover">
            <div class="icon-twitter"></div>
        </div>
      </div>

    </header>

    <div class="content">
      <div class="data">
        <ul style="padding: 0;">
          <li>
            2,934
            <span>Points</span>
          </li>
          <li>
            1,119
            <span>Reps</span>
          </li>
          <li>
            530
            <span>Cards</span>
          </li>
        </ul>
      </div>

      <!-- <div class="follow"> <div class="icon-twitter"></div> Follow</div> -->
    </div>
      <!--<p>Click on the button below to open the Panel.</p>
      <a  id="open-sidemenu" href="#myPanel" class="ui-btn ui-btn-inline ui-corner-all ui-shadow">Open Panel</a> -->
  </div>

  <style type="text/css">
      .emoticon {
        width: 29px;
        height: 19px;
            display: inline-block;
            vertical-align: top;
        }
    .flag-us {
            background-image: url(/assets/images/flag-icons-border.png);
            background-repeat: no-repeat;
            background-size: 600px;
            background-position: -479px -251px;
        }

        .flag-wrapper {
          position: relative;
        }
        .more-flags{
        width: 44px;
        left: -7px;
        top: 2px;
        /* margin-top: 2px; */
        padding: 4px;
        padding-bottom: 6px;
        z-index: 9999999;
        position: relative;
        background: gainsboro;
        }
        .fbtn{
          height: 33px;
        width: 53px;
        padding: 7px;
        }
        .flag-dropdown {
        text-align: right !important;
        width: 100% !important;
        min-width: 20px !important;
        padding-top: 0;
    }
    .flag-dropdown li{
      width: 40px;
      margin-top: 4px;
    }
    #page-body{
      overflow: visible;
    }
  </style>

  <div id="page-body" class="profile-page pages">

    <div class="flag-wrapper">
      <div class="btn-group">
        <button type="button" class="btn btn-default dropdown-toggle btn-xs fbtn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i tab="1" txt="blaugh" class="ec emoticon flag-us"></i>
        <span class="caret"></span>
        </button>
        <ul class="dropdown-menu flag-dropdown">
          <li class="li1"><i tab="1" txt="blaugh" class="ec emoticon flag-us"></i></li>
          <li class="li1"><i tab="1" txt="blaugh" class="ec emoticon flag-us"></i></li>
          <li class="li1"><i tab="1" txt="blaugh" class="ec emoticon flag-us"></i></li>
        </ul>
      </div>
    </div>

    <button type="button" class="btn btn-default btn-lg raised">
    RANDOM New Card
    </button>
    <button id="to-card-search" href="" class="btn btn-primary btn-lg raised">SEARCH for a Card
    </button>
    <button id="to-review" href="{!!route('game_study')!!}" class="btn btn-info btn-lg raised">Review Deck
    </button>
  </div>

@stop