<!DOCTYPE html>
<html ng-app="mx" lang="en">
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>MetabolomeXchange</title>

    <link rel="stylesheet" href="bower_components/materialize/dist/css/materialize.min.css">
    <link rel="stylesheet" href="css/style.css">

    <script type="text/javascript">
      var ie = (function(){ var undef, v = 3, div = document.createElement('div'), all = div.getElementsByTagName('i'); while ( div.innerHTML = '<!--[if gt IE ' + (++v) + ']><i></i><![endif]-->', all[0] ); return v > 4 ? v : undef; }());
      if (ie && ie <= 8){ window.location.replace("/static"); }
    </script>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
</head>
<body ng-controller="MxCtrl">

  <a name="top"></a>

  <ul id="dropdown" class="dropdown-content">
  <li><a href="" ng-click="scrollTo('about')">About</a></li>
  <li><a href="" ng-click="scrollTo('about')">Partners</a></li>
  <li><a href="" ng-click="changeView('search')">Search</a></li>
  <li class="divider"></li>
  </ul>  

  <nav class="teal darken-4" role="navigation">
    <div class="nav-wrapper container">
      <a id="logo-container" href="#/" class="left">
        <i class="mdi-action-home"><img class="hide-on-med-and-up" style="margin: 15px 0 -4px 15px; height:30px;" src="/img/metabolomeXchange.png"></i>
      </a>    
      <ul class="right">
        <li><a class="dropdown-button" href="#!" data-activates="dropdown"><i class="mdi-navigation-menu"></i></a></li>
      </ul>    
    </div>
  </nav>

  <div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <div class="row center">
        <div class="hide-on-small-only">
          <br />
        </div>
        <img class="hide-on-small-only" style="max-width:100%; max-height:91px;" src="/img/metabolomeXchange.png" />
        <h5 class="header col s12 light">An international data aggregation and notification service for metabolomics.</h5>
      </div>
      <div class="row center">
          <div class="white teal-text" role="content">
              <form class="col s12">
                <div class="row">
                    <div class="input-field col s2"> </div>                                      
                    <div class="input-field col s8">
                        <i class="mdi-action-search prefix black-text"></i>
                        <input id="icon_prefix" type="text" class="validate" ng-focus="changeView('search');" ng-change="updateResults();" ng-model="query" value="{{query}}" placeholder="What are you looking for?">
                        <label class="black-text" for="icon_prefix">Search</label>
                    </div>  
                    <div class="input-field col s2"> </div>                                      
                </div>
              </form>
          </div>
      </div>      
    </div>
  </div>  

  <div ng-view></div>

  <br/><br/>
  <footer class="page-footer teal darken-2">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <a name="about"></a>
          <h5 class="white-text">About</h5>
          <p class="grey-text text-lighten-4"><a target="_blank" href="http://www.cosmos-fp7.eu/"><img height="40px" class="mx_logo" src="/img/cosmos/fp7.png"></a> This project is funded through European Commission COSMOS Grant EC312941</p>
          <p>
            <a href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fmetabolomexchange.org&t=MetabolomeXchange" target="_blank" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent(document.URL) + '&t=' + encodeURIComponent(document.URL)); return false;"><img src="/img/flat_web_icon_set/black/Facebook.png"></a>
            <a href="https://twitter.com/intent/tweet?source=http%3A%2F%2Fmetabolomexchange.org&text=MetabolomeXchange: http%3A%2F%2Fmetabolomexchange.org" target="_blank" title="Tweet" onclick="window.open('https://twitter.com/intent/tweet?text=' + encodeURIComponent(document.title) + ': ' + encodeURIComponent(document.URL) + ' %23metabolomics' + ' %40metabolomexchan'); return false;"><img src="/img/flat_web_icon_set/black/Twitter.png"></a>
            <a href="https://plus.google.com/share?url=http%3A%2F%2Fmetabolomexchange.org" target="_blank" title="Share on Google+" onclick="window.open('https://plus.google.com/share?url=' + encodeURIComponent(document.URL)); return false;"><img src="/img/flat_web_icon_set/black/Google+.png"></a>
            <a href="http://www.linkedin.com/shareArticle?mini=true&url=http%3A%2F%2Fmetabolomexchange.org&title=MetabolomeXchange,%20an%20international%20initiative%20to%20promote%20and%20facilitate%20sharing%20of%20Metabolomics%20data.&source=http%3A%2F%2Fmetabolomexchange.org" target="_blank" title="Share on LinkedIn" onclick="window.open('http://www.linkedin.com/shareArticle?mini=true&url=' + encodeURIComponent(document.URL) + '&title=' +  encodeURIComponent(document.title)'); return false;"><img src="/img/flat_web_icon_set/black/LinkedIn.png"></a>
            <a href="mailto:?subject=MetabolomeXchange&body=MetabolomeXchange,%20an%20international%20initiative%20to%20promote%20and%20facilitate%20sharing%20of%20Metabolomics%20data.: http%3A%2F%2Fmetabolomexchange.org" target="_blank" title="Email" onclick="window.open('mailto:?subject=' + encodeURIComponent(document.title) + '&body=' +  encodeURIComponent(document.URL)); return false;"><img src="/img/flat_web_icon_set/black/Email.png"></a>
          </p>

        </div>
        <div class="col l3 s12">
          <h5 class="orange-text">Partners</h5>
          <ul>
            <li><a class="white-text" target="_blank" href="#!">Leiden University</a></li>
            <li><a class="white-text" target="_blank" href="#!">EMBL-EBI</a></li>
            <li><a class="white-text" href="/ipb">Leibniz-Institute of Plant Biochemistry</a></li>
          </ul>
          <h5 class="orange-text">Providers</h5>
          <ul>
            <li><a class="white-text" href="#!">EMBL-EBI</a></li>
            <li><a class="white-text" href="/maxplanck">Max Planck Institute - MPIMP</a></li>
            <li><a class="white-text" href="">UC San Diego</a></li>
            <li><a class="white-text" href="/bordeaux">Universite Bordeaux Segalen</a></li>            
          </ul>          
        </div>
        <div class="col l3 s12">
          <h5 class="orange-text">Contributors</h5>          
          <ul>
            <li><a class="white-text" href="/MRC">MRC-HNR</a></li>
            <li><a class="white-text" href="/imperial">Imperial College</a></li>
            <li><a class="white-text" href="/tno">TNO</a></li>
            <li><a class="white-text" href="/vtt">Teknologian Tutkimuskeskus VTT</a></li>
            <li><a class="white-text" href="/barcelona">Universitat De Barcelona</a></li>
            <li><a class="white-text" href="/manchester">The University Of Manchester</a></li>
            <li><a class="white-text" href="/cirmmp">CIRMMP</a></li>
            <li><a class="white-text" href="/birmingham">The University Of Birmingham</a></li>
            <li><a class="white-text" href="/oxford">The University of Oxford</a></li>
          </ul>          
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
      Made with: 
      <a class="orange-text text-lighten-3" target="_blank" href="https://angularjs.org/">AngularJS (client)</a>, 
      <a class="orange-text text-lighten-3" target="_blank" href="http://materializecss.com">Materialize (design/ui)</a>, and 
      <a class="orange-text text-lighten-3" target="_blank" href="http://materializecss.com">PHP/FlightPHP (api/rss)</a>
      </div>
    </div>
  </footer>

    <script src="bower_components/jquery/dist/jquery.min.js"></script>
    <script src="bower_components/materialize/dist/js/materialize.min.js"></script>    
    <script src="bower_components/angular/angular.min.js"></script>
    <script src="bower_components/angular-route/angular-route.min.js"></script>

    <script src="app/app.js"></script> 

    <br /><br /><br /><br />      
    <br /><br /><br /><br />
    <br /><br /><br /><br />
    <br /><br /><br /><br />
    <br /><br /><br /><br />
  </body>
</html>
